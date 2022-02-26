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
        return view('welcomeUserAdmin');
    }

}
