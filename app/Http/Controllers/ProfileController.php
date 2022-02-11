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
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function changePassword(){

        if(empty(Auth::user()->id)) {
            return redirect('/');
        }

        $userId=Auth::user()->id;
        $data1['userTable']= DB::table('users')
            ->where('users.id','=',$userId)
            ->first();


        $data1['cPassword']= DB::table('users')
            ->where('users.id','=',$userId)
            ->first();
        return view('profiles.passwordChange',$data1);
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
    public function editPersonalInfo(){
        if(empty(Auth::user()->id)) {
            return redirect('/');
        }

        $userId=Auth::user()->id;
        $data1['userTable']= DB::table('users')
            ->where('users.id','=',$userId)
            ->first();

        $data['personal'] = User::where('id',Auth::id())->first();
        return view('profiles.personalInfo', $data,$data1);
    }





    public function displayPersonalInfoDetails(){
        if(empty(Auth::user()->id)) {
            return redirect('/');
        }

        $userId=Auth::user()->id;
        $data1['userTable']= DB::table('users')
            ->where('users.id','=',$userId)
            ->first();
        $data1['personalDetails']= DB::table('profile_models')
            ->join('users','users.id','profile_models.userId')
            ->where('users.id','=',$userId)
            ->first();
        return view('profiles.personalInfoDetails',$data1);
    }
    public function savePersonalInfoDetails(Request $request){

        //dd($request);

        $data = new ProfileModel();
        $user_id = Auth::user()->id;
        $data2=DB::table('profile_models')
            ->join('users','users.id','profile_models.userId')
            ->where('users.id',$user_id)
            ->select('profile_models.userId')->get();

        if(!empty(count($data2)))
            $data = ProfileModel::where('userId',Auth::id())->first();





//dd(phpinfo());

        // $contents = pathinfo(storage_path().'/zOEh8zefUuHmOhlLY80UNNneTO5tJmv1ECfrwOpF.png');

        //  dd( $contents['extension']);


        $data->userId=Auth::id();
        $data->name = $request->name;
        $data->did = $request->did;
        $data->dname = $request->dname;
        $data->iname = $request->iname;
        $data->ses = $request->ses;
        $data->phone = $request->phone;
        //  $data->nphoto= $request->nphoto;
        //        $data->photo= Storage::put('/Photos', $request->file('photo'));
        //$data->nphoto=Storage::put('/Nominee Photos', $request->file('nphoto'));

       // dd($request->file('photo')->getSize());
        if($request->file('photo')->getSize()>2054847)
            dd('please choose a photo less than 2M');


        if(!empty($request->file('photo')))
            $data->photo= $this->uploadimage($request->file('photo'),'uploads/personalPhotos/','','','');

       // if(!empty($request->file('photo')))
         //   $data->photo= Storage::disk('public')->put('personalPhotos/', $request->file('photo'));
//dd($data);
        $data->save();
        return redirect('personalInfoDetailsEdit');
    }
    public function editPersonalInfoDetails(){

        if(empty(Auth::user()->id)) {
            return redirect('/');
        }

        $userId=Auth::user()->id;
        $data1['userTable']= DB::table('users')
            ->where('users.id','=',$userId)
            ->first();
        $data['personalDetails'] = ProfileModel::where('userId',Auth::id())->first();

        return view('profiles.personalInfoDetails', $data,$data1);
    }

    public function displayProfile(Request $request){

        if(empty(Auth::user()->id)) {
            return redirect('/');
        }

        $userId=Auth::user()->id;
        $data1['userTable']= DB::table('users')
            ->where('users.id','=',$userId)
            ->first();

        //dd($request->id);

        $data1['particularPro']= DB::table('users')
            ->where('users.id',Auth::user()->id,'=')
            ->first();



        //dd($data1);

        return view('profiles.profile',$data1);
    }

    public function displayParticularProfile(Request $request){

        if(empty(Auth::user()->id)) {
            return redirect('/');
        }

        $userId=Auth::user()->id;
        $data1['userTable']= DB::table('users')
            ->where('users.id','=',$userId)
            ->first();

        //dd($request->id);

        $data1['particularPro']= DB::table('users')
            ->where('users.id',$request->id,'=')
            ->first();



        //dd($data1);

        return view('particular_profile.particularProfile',$data1);
    }
    public function displayParticularProfileW(Request $request){




        //dd($request->id);

        $data1['particularPro']= DB::table('profile_models')
            ->leftjoin('users','users.id','profile_models.userId')
            ->where('users.id',$request->id,'=')
            ->first();

        $data1['qCount']= DB::table('question_models')
            ->leftjoin('users','users.id','question_models.quserId')
            ->where('users.id',$request->id,'=')
            ->count();

        $data1['aCount']= DB::table('answer_models')
            ->leftjoin('users','users.id','answer_models.auserId')
            ->where('users.id',$request->id,'=')
            ->count();

        $data1['rCount']= DB::table('reply_models')
            ->leftjoin('users','users.id','reply_models.ruserId')
            ->where('users.id',$request->id,'=')
            ->count();

        //dd($data1);

        return view('particular_profile.particularProfileW',$data1);
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
