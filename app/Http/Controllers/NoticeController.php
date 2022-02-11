<?php

namespace App\Http\Controllers;

use App\NoticeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NoticeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addNotice(){

        if(empty(Auth::user()->id)) {
            return redirect('/');
        }

        $userId=Auth::user()->id;
        $data1['userTable']= DB::table('users')
            ->where('users.id','=',$userId)
            ->first();


        //dd($data);

        return view('notice.noticeAddEdit',$data1);
    }

    public function listNotice(){

        if(empty(Auth::user()->id)) {
            return redirect('/');
        }

        $userId=Auth::user()->id;
        $data1['userTable']= DB::table('users')
            ->where('users.id','=',$userId)
            ->first();
        $data['nots']= DB::table('notice_models')
            ->select('*')
            ->orderBy('notice_models.id','DESC')
            ->get();



        //dd($data);

        return view('notice.noticeList',$data1,$data);
    }




    public function saveNotice(Request $request){
        $data = new NoticeModel();
//dd($request->all());

        if(isset($request->id) &&!empty($request->id))
            $data = NoticeModel::find($request->id);


        $data->ntitle=$request->ntitle;

        if(!empty($request->file('nfile')))
            $data->nfile= Storage::disk('public')->put('Notice/', $request->file('nfile'));

//dd($data);
        if ($data->save()==true)
            return redirect('notices')->with('success_message','Sucessfully Notice Added');
        else
            return redirect('notices/add')->with('error_message','Unsuccessful,please try again');



    }

    public function deleteNotice(Request $request){
        NoticeModel::find($request->id)->delete();
        return redirect()->back();
    }

    public function editNotice(Request $request){

        if(empty(Auth::user()->id)) {
            return redirect('/');
        }


        $userId=Auth::user()->id;
        $data1['userTable']= DB::table('users')
            ->where('users.id','=',$userId)
            ->first();



        $data['nots'] = NoticeModel::find($request->id);

//dd($data);
        return view('notice.noticeAddEdit',$data,$data1);
    }


}
