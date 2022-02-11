<?php

namespace App\Http\Controllers;

use App\QuestionModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SharingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function displayWelcomeUser(){
          if(empty(Auth::user()->id)) {
              return redirect('/');
          }
              $userId=Auth::user()->id;
        $data1['userTable']= DB::table('users')
            ->where('users.id','=',$userId)
            ->first();
       // $data['sharing'] = QuestionModel::all();



        // ->get();

        return view('welcomeUserAdmin',$data1);
    }







}
