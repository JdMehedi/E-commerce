<?php

namespace App\Http\Controllers;

use App\User;
use App\UserContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ConsigneeController extends Controller
{
    public $user;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }

    public function index(){
        if (is_null($this->user) ||  !$this->user->can('consignee.index')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        
        $data['lists'] = DB::table('users')
            ->leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')->where('role_id',1)
            ->get();
        return view ('admin.consignee.index',$data);
    }

    public function create(User $user){
        if (is_null($this->user) ||  !$this->user->can('consignee.create')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        return view ('admin.consignee.create')->with('data',$user);
    }

    public function store(Request $request){
        if (is_null($this->user) ||  !$this->user->can('consignee.store')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $request->validate([
            'shipper' => 'required|max:255',
            'nickName' => 'required|max:100',
        ]);
        $data = new User();
        $data->fname=$request->shipper;
        $data->nick_name=$request->nickName;
        $data->password=bcrypt(123456);
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
        if (is_null($this->user) ||  !$this->user->can('consignee.edit')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $data['user']= User::where("slug",$slug)->first();
        return view('admin.consignee.create',$data);
    }

    public function update(Request $request){
        if (is_null($this->user) ||  !$this->user->can('consignee.update')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $data = User::where("id",$request->id)->first();
        $data->update([
            $data->fname=$request->shipper,
            $data->nick_name=$request->nickName,
        ]);

        return redirect()->route('consignee.index')->with('success_message','Successfully shipper updated');
    }

    public function show($slug){
        if (is_null($this->user) ||  !$this->user->can('consignee.show')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $data['value']= User::where("slug",$slug)->first();
        $data['lists']= UserContact::where('user_id',$data['value']->id)->get();
        $data['slug']=$slug;
        return view ('admin.consignee.contact.index',$data);
    }
    public function destroy($slug){
        if (is_null($this->user) ||  !$this->user->can('consignee.destroy')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $data= User::where("slug",$slug)->first();
        $data->delete();
        return redirect()->back();
    }

}
