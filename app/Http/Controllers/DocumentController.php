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

    public function createDocument(){

        if (is_null($this->user) ||  !$this->user->can('document.create')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $data['orders'] = Order::get();
        $data['document_types'] = DocumentType::where('status', 1)->get();
        return view('document.create',$data);
    }

    public function listDocument(){
        if (is_null($this->user) ||  !$this->user->can('document.list')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $data['documents']= Document::whereNull('deleted_at')->with('order_info','document_type_info')->get();
        return view('document.list',$data);
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
            return redirect('document/create')->with('error_message','Unsuccessful, Please try again later');
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
