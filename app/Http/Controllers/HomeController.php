<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcomeUserAdmin');
    }



//    public function downloadFile($id){
//
//        $file= storage_path()."/app/public/". decrypt($id);
//
//        return Response::make(file_get_contents($file), 200, [
//            'Content-Type' => 'application/pdf',
//            'Content-Disposition' => 'inline; filename="'.'dd'.'"'
//        ]);
//
//        return Response::download($file);
//    }




//    public function downloadFile($id){
//
//        $file= storage_path()."/app/public/". decrypt($id);
//
//
//
//        return Response::download($file);
//    }








}
