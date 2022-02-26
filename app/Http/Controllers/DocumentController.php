<?php

namespace App\Http\Controllers;

use App\Document;
use App\DocumentType;
use App\NoticeModel;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public $user;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }

    public function listDocument(){
        if (is_null($this->user) ||  !$this->user->can('document.list')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        
        $data['orders'] = Order::get();
        $data['document_types'] = DocumentType::where('status', 1)->get();
        $data['documents']= Document::whereNull('deleted_at')->with('order_info','document_type_info')->get();
        return view('document.list',$data);
    }

    public function listDocumentByOrder(Request $request){
        if (is_null($this->user) ||  !$this->user->can('document.list.order')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $order_id = $request->order_id;
        $data['documents'] = Document::whereNull('deleted_at')
            ->where('order_id', $order_id)
            ->with('order_info','document_type_info')->get();
        $documents = "";
        $documents .= '<table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Order Number</th>
                                    <th>Document Type</th>
                                    <th> File</th>
                                    <th>Created Date</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                        <tbody>';
                        if(!empty($data['documents'])){
                            foreach ($data['documents'] as $document){
                                $documents .= "
                                    <tr>
                                        <td>".$document->id."</td>
                                        <td>".$document->order_info->order_number."</td>
                                        <td>".$document->document_type_info->name."</td>
                                        <td><a href=".route('document.downLoadFile', encrypt($document->file_name))."\"
                            ><i class=\"fa fa-file\"></i> File </a></td>
                                        <td>".\Carbon\Carbon::parse($document->updated_at)->diffForhumans()."</td>
                                        <td><a href=".url('document/delete').'?id='.$document->id."\" class=\"btn btn-xs red\" onclick=\"return confirm('Do You want to confirm the document delete?')\"
                            ><i class=\"fa fa-trash\"  title=\"delete\"></i> Delete </a></td>
                                    </tr>
                                ";
                            }
                        }
            $documents .= '</tbody>
            </table>';

        return response()->json(['documents' => $documents]);
    }


    public function storeDocument(Request $request){
        if (is_null($this->user) ||  !$this->user->can('document.store')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $validator = \Validator::make($request->all(), [
            'order_id' => 'required',
            'doc_type_id' => 'required',
            'file_name' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $data = new Document();
        $data->order_id=$request->order_id;
        $data->doc_type_id=$request->doc_type_id;
        $storagePath = "upload/documents";
        if(!empty($request->file('file_name'))){
            $file_path = $request->file('file_name');
            $path = $file_path->store($storagePath);
            $data->file_name= $path;
        }
        if ($data->save()==true){
            return redirect('document/list')->with('success_message','Sucessfully Document Created');
        }else{
            return redirect('document/list')->with('error_message','Unsuccessful, Please try again later');
        }

    }

    public function deleteDocument(Request $request){
        if (is_null($this->user) ||  !$this->user->can('document.delete')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $data = Document::find($request->id);
        $file_name = $data->file_name;
        if(!empty($file_name)){
            Storage::delete($file_name);
        }
        $data->delete();
        return redirect()->back()->with('success_message','Sucessfully Document Deleted');
    }

    public function documentDownloadFile($id){
        $file= decrypt($id);
        return Storage::download($file);
    }
}
