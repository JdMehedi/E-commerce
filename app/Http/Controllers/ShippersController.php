<?php

namespace App\Http\Controllers;

use App\User;
use App\UserContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ShippersController extends Controller
{
    public $user;
    public $extra_title;
    public function __construct()
    {
        $this->extra_title = "- Shipper";
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }

    public function index()
    {
        if (is_null($this->user) ||  !$this->user->can('shipper.index')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $data['extra_title'] = $this->extra_title;
        $data['lists'] = DB::table('users')
            ->leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')->where('role_id',2)
            ->get();
        return view ('admin.shipper.index',$data);
    }

    public function create(User $shipper)
    {
        if (is_null($this->user) ||  !$this->user->can('shipper.create')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $data['extra_title'] = $this->extra_title;
        return view ('admin.shipper.create')->with('data',$shipper);
    }

    public function store(Request $request)
    {
        if (is_null($this->user) ||  !$this->user->can('shipper.store')) {
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
        if (is_null($this->user) ||  !$this->user->can('shipper.edit')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $data['extra_title'] = $this->extra_title;
        $data['shipper']= User::where("slug",$slug)->first();
        return view('admin.shipper.create',$data);
    }

    public function update(Request $request){
        if (is_null($this->user) ||  !$this->user->can('shipper.update')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $data = User::where("id",$request->id)->first();
        $data->update([
            $data->fname=$request->shipper,
        $data->nick_name=$request->nickName,
        ]);

        return redirect()->route('shipper.index')->with('success_message','Successfully shipper updated');
    }

    public function show($slug){
        if (is_null($this->user) ||  !$this->user->can('shipper.show')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $data['extra_title'] = $this->extra_title;
        $data['value']= User::where("slug",$slug)->first();
        $data['lists']= UserContact::where('user_id',$data['value']->id)->get();
        $data['slug']=$slug;
        return view ('admin.shipper.contact.index',$data);
    }
    public function destroy($slug)
    {
        if (is_null($this->user) ||  !$this->user->can('shipper.destroy')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        
        $data= User::where("slug",$slug)->first();
        $data->delete();
        return redirect()->back();
    }
}
