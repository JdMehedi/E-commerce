<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;


    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/adminUser';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
//        $data1 = DB::table('profile_models')
//            ->where('profile_models.student_id', $data['student_id'], '=')
//            ->first();
//
//        if ($data1==null)
//            return Redirect('register')->with('error_message', 'Please given your previous student id and guardian contact number ');
//
//
//        $true=(($data['student_id']== $data1->student_id) && ($data['guarcontact']== $data1->guarnumber));
//        //dd($true);
//        if ($true==false)
//            return Redirect('register')->with('error_message', 'Please given your previous student id and guardian contact number ');
//


        return Validator::make($data, [
            'student_id' => 'exists:profile_models,login_id|required|string|max:25|unique:users',
           'guarcontact' => 'exists:profile_models,guarnumber',
           'cnumber' => 'exists:profile_models,ctactnumber',
            'email' => 'required|string|email|max:255|unique:users',
            'username' => 'required|string|max:10|unique:users',
           // 'student_id' => 'required|string|max:25|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
    }



    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        //dd($data['student_id']);


                return User::create([
//            dd($data->file('photo')),
                    //dd($data['photo']),
                    'student_id' => $data['student_id'],
                    'username' => $data['username'],
                    'email' => $data['email'],
                    'password' => bcrypt($data['password']),
                    'amount' => 0,
                    'userType' => 0,
                    'name' => $data['name'],
                    'roomno' => $data['roomno'],
                    'bedno' => $data['bedno'],
                    'department' => $data['department'],
                    'ses' => $data['ses'],
                    'yearSem' => $data['yearSem'],
                    'fname' => $data['fname'],
                    'mname' => $data['mname'],
                    'address' => $data['address'],
                    'birth_date' => $data['birth_date'],
                    'cnumber' => $data['cnumber'],
                    'guarcontact' => $data['guarcontact'],
                    'blood_group' => $data['blood_group'],
//            $data->photo= $this->uploadimage($request->file('photo'),'uploads/personalPhotos/','','','');
                    'photo' => $this->uploadimage($data['photo'],'uploads/personalPhotos/','','',''),

                    //'photo' => $data['photo'],
                ]);


        //return Redirect('register')->with('error_message', 'Please given your previous student id and guardian contact number ');



    }







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
