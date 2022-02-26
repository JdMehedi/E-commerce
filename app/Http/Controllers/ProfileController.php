<?php

namespace App\Http\Controllers;



use App\ContactInfoModel;
use App\NomineeInfoModel;
use App\ProfileModel;
use App\User;
use App\PhotoModel;
use App\ProfessionalInfoModel;
//use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;


class ProfileController extends Controller
{

    public $user;
    public $extra_title;
    public function __construct()
    {
        $this->extra_title = "- Profile";
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }

    public function changePassword(){

        if(empty(Auth::user()->id)) {
            return redirect('/');
        }
        $userId=Auth::user()->id;
        $data['extra_title'] = $this->extra_title;
        $data1['cPassword']= DB::table('users')
            ->where('users.id','=',$userId)
            ->first();
        return view('profiles.passwordChange',$data1, $data);
    }
    public function savePassword(Request $request){

        if (Hash::check($request->current_password, auth()->user()->password)==false)
            return Redirect()->back()->with('error_message','Unsuccessful,Current password do not match');

        $validator = \Validator::make($request->all(), [
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
            ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $trueornot=User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        if($trueornot==true){
            return Redirect()->back()->with('success_message','You sucessfully change your password');
        }else {
            return Redirect()->back()->with('error_message','Unsuccessful,Please try again');
        }

    }



    public function displayProfile(Request $request){
        if(empty(Auth::user()->id)) {
            return redirect('/');
        }
        $data['extra_title'] = $this->extra_title;
        $data['particularPro']= DB::table('users')
            ->where('users.id',Auth::user()->id,'=')
            ->first();
        return view('profiles.profile',$data);
    }

    public function profileUpdate(Request$request){
        if (is_null($this->user)) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $validator = \Validator::make($request->all(), [
            'fname' => 'required',
            'nick_name' => 'required',
            'email' => 'required|email',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $user_id = Auth::user()->id;
        $data = User::find($user_id);
        if(!empty($data)){
            $profile_image=$data->profile_image;
            if(!empty($request->file('profile_image'))){
                if(!empty($profile_image)){
                    unlink('public/uploads/personalPhotos/'.$profile_image);
                }
                $data->profile_image= $this->uploadimage($request->file('profile_image'),'public/uploads/personalPhotos/','','','');
            }
            $data->fname=$request->fname;
            $data->lname=$request->lname;
            $data->email=$request->email;
            $data->nick_name=$request->nick_name;
            $data->phone= $request->phone;
            $data->mobile = $request->mobile;
            $data->address = $request->address;
            if($data->save()==true) {
                return redirect('profileDisplay')->with('success_message','Successfully Profile Updated');
            }
        }

        return redirect('profileDisplay')->with('error_message','Unsuccessful,Please Try Again later');

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
