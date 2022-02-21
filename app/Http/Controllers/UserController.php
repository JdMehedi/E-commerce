<?php

namespace App\Http\Controllers;
use App\ProfileModel;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;

class UserController extends Controller
{
    public $user;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }

    public function addUser(){
        if (is_null($this->user) ||  !$this->user->can('adduser')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $data['roles'] = DB::table('roles')->get();
        return view('admin.set.userAddEdit',$data);
    }

    public function listUser(){
        if (is_null($this->user) ||  !$this->user->can('userlist')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $data['users']=User::all();

        return view('admin.set.userList', $data);
    }

    public function saveUser(Request $request){
        if (is_null($this->user) ||  !$this->user->can('user.save')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $validator = \Validator::make($request->all(), [
            'fname' => 'required',
            'lname' => 'required',
            'nick_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'mobile' => 'required',
            'contact' => 'required',
            'fax' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $data = new User();
        if(isset($request->id) &&!empty($request->id)){
            $data = User::find($request->id);
            if($data->email!=$request->email){
                $validator = \Validator::make($request->all(), [
                    'email' => 'required|email|max:30|unique:users,email',
                ]);
                if ($validator->fails()) {
                    return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
                }
            }
            $data->roles()->detach();
            if (!empty($request->roles)) {
                foreach ($request->roles as $role) {
                    $data->assignRole($role);
                }
            }
            $status=$request->status;

            if(!empty($request->file('profile_image'))){
                $profile_image=$data->profile_image;
                if(!empty($profile_image)){
                    unlink('uploads/personalPhotos/'.$profile_image);
                }
                $data->profile_image= $this->uploadimage($request->file('profile_image'),'uploads/personalPhotos/','','','');
            }
        }
        else{
            $validator = \Validator::make($request->all(), [
                'email' => 'required|email|max:30|unique:users,email',
                'password' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            if ($request->roles != null) {
                foreach ($request->roles as $role) {
                    $data->assignRole($role);
                }
            }
            $status=1;
            if(!empty($request->file('profile_image')))
                $data->profile_image= $this->uploadimage($request->file('profile_image'),'uploads/personalPhotos/','','','');
        }
        $data->fname=$request->fname;
        $data->lname=$request->lname;
        $data->email=$request->email;
        if(!empty($request->password))
        $data->password=bcrypt($request->password);
        $data->nick_name=$request->nick_name;
        $data->address = $request->address;
        $data->phone= $request->phone;
        $data->mobile = $request->mobile;
        $data->contact = $request->contact;
        $data->fax = $request->fax;
        $data->DOB = $request->DOB;
        $data->status = $status;
        //dd($data);
        if($data->save()==true) {
            return redirect('users')->with('success_message','Successfully Saved');
        }
        else{
            return redirect('users/add')->with('error_message','Unsuccessful,Please try again');
        }
    }

    public function deleteUser(Request $request){
        if (is_null($this->user) ||  !$this->user->can('user.delete')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $data=User::find($request->id);
        $profile_image=$data->profile_image;
        if(!empty($profile_image)){
            unlink('uploads/personalPhotos/'.$profile_image);
        }
        $data->roles()->detach();
        $data->delete();
        return redirect()->back()->with('success_message','Successfully Deleted');
    }

    public function editUser(Request $request){

        if (is_null($this->user) ||  !$this->user->can('user.edit')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }


        $data['users'] = User::find($request->id);
        $data['roles'] = DB::table('roles')->get();
        return view('admin.set.userAddEdit',$data);
    }




    //image upload function

    function uploadimage($img, $path, $user_file_name = null, $width =null , $height = null)
    {
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        if (isset($user_file_name) && $user_file_name != "" && file_exists($path . $user_file_name)) {
            unlink($path . $user_file_name);
        }
        if (isset($user_file_name) && $user_file_name != "" && file_exists(path_image_thumb() . $user_file_name)) {
            unlink(path_image_thumb() . $user_file_name);
        }
// saving image in target path
        $imgName = uniqid() . '.' . $img->getClientOriginalExtension();
        $imgPath = public_path($path . $imgName);


        $img_main = \Intervention\Image\Facades\Image::make($img);
        $img_main->orientate();
        $img_main->save($path.$imgName);


        if ( file_exists($path. $imgName)) {

            /*   $newNme = public_path(path_image_thumb() . $imgName);

               if (!file_exists(path_image_thumb())) {
                  mkdir(path_image_thumb(), 0777, true);
               }
              $img = \Intervention\Image\Facades\Image::make($imgPath);
              $img->fit(200);
               $img->orientate();
               $img->save(path_image_thumb().$imgName);
   */
            return $imgName;
        }
        return false;
    }
}
