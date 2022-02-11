<?php

namespace App\Http\Controllers;

use App\ProfileModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function loginStudent(Request $request)
    {
         //dcdd($request->all());



        if (isset($request->student_id) && !empty($request->student_id))
            $data = DB::table('profile_models')
                ->where('profile_models.student_id', $request->student_id, '=')
                ->first();


        if($data==null)
            return Redirect()->back()->with('error_message', 'Unsuccessful,Please valid login id and password again');



//        dd(Hash::check($request->password, $data->cnumber));

     $true=(($request->student_id== $data->student_id) && ($request->password== $data->guarnumber));

        if ($true==true)
            return Redirect('/register')->with('success_message', 'Sucessfully Match, Please complete your Registeration');
        else
            return Redirect()->back()->with('error_message', 'Unsuccessful,Please valid login id and password again');

    }
    public function registerStudent(Request $request)
    {
        // dd($request->pstudent_id);


            return view('student');

    }


}
