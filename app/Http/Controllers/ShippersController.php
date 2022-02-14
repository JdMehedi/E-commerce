<?php

namespace App\Http\Controllers;

use App\User;
use App\UserContact;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShippersController extends Controller
{
    public function index()
    {

        $data['lists']=User::whereNotNull('slug')->get();
        return view ('admin.shipper.index',$data);
    }


    public function create(User $shipper)
    {
        return view ('admin.shipper.create')->with('data',$shipper);
    }


    public function store(Request $request)
    {
        $request->validate([
            'shipper' => 'required|max:255',
            'nickName' => 'required|max:100',
        ]);
        $data = new User();
        $data->fname=$request->shipper;
        $data->nick_name=$request->nickName;
        $data->password=bcrypt(123456);
        $data->slug  = Str::slug($request->nickName);
        $roles = ["2"];
        foreach ($roles as $role) {
            $data->assignRole($role);
        }
        $shipper = $data->save();

        if(empty($shipper)){
            return redirect()->back()
                ->withInput()
                ->with("err_message", __('Failed to insert'));
        }
        return redirect()->route('shipper.index')
            ->with("success_message", __("Data inserted successfully"));
    }

    public function edit($slug)
    {
        $data['shipper']= User::where("slug",$slug)->first();
        return view('admin.shipper.create',$data);
    }

    public function update(Request $request){
        $data = User::where("id",$request->id)->first();
        $data->update([
            $data->fname=$request->shipper,
        $data->nick_name=$request->nickName,
        ]);

        return redirect()->route('shipper.index')->with('success_message','Successfully shipper updated');
    }

    public function show($slug){
        $data= User::where("slug",$slug)->first();
        $data['lists']= UserContact::where('user_id',$data->id)->get();
        $data['slug']=$slug;
        return view ('admin.shipper.contact.index',$data);
    }
    public function destroy($slug)
    {
        $data= User::where("slug",$slug)->first();
        $data->delete();
        return redirect()->back();
    }
}
