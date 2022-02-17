<?php

namespace App\Http\Controllers;

use App\User;
use App\UserContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ConsigneeController extends Controller
{
    public function index(){
        $data['lists'] = DB::table('users')
            ->leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')->where('role_id',1)
            ->get();
        return view ('admin.consignee.index',$data);
    }

    public function create(User $user){
        return view ('admin.consignee.create')->with('data',$user);
    }

    public function store(Request $request){
        $request->validate([
            'shipper' => 'required|max:255',
            'nickName' => 'required|max:100',
        ]);
        $data = new User();
        $data->fname=$request->shipper;
        $data->nick_name=$request->nickName;
        $data->password=bcrypt(123456);
        $data->slug  = Str::slug($request->nickName);
        $roles = ["1"];
        foreach ($roles as $role) {
            $data->assignRole($role);
        }
        $user = $data->save();

        if(empty($user)){
            return redirect()->back()
                ->withInput()
                ->with("err_message", __('Failed to insert'));
        }
        return redirect()->route("consignee.index")
            ->with("success_message", __("Data inserted successfully"));
    }

    public function edit($slug){
        $data['user']= User::where("slug",$slug)->first();
        return view('admin.consignee.create',$data);
    }

    public function update(Request $request){
        $data = User::where("id",$request->id)->first();
        $data->update([
            $data->fname=$request->shipper,
            $data->nick_name=$request->nickName,
        ]);

        return redirect()->route('consignee.index')->with('success_message','Successfully shipper updated');
    }

    public function show($slug){
        $data['value']= User::where("slug",$slug)->first();

        $data['lists']= UserContact::where('user_id',$data['value']->id)->get();
                $data['slug']=$slug;
        return view ('admin.consignee.contact.index',$data);
    }
    public function destroy($slug){
        $data= User::where("slug",$slug)->first();
        $data->delete();
        return redirect()->back();
    }

}
