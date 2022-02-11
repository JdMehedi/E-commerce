<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class WelcomeController extends Controller
{

    public function displayWelcome(){
        return view('welcome');
    }

    public function downloadFile($id){


        $file= storage_path()."/app/public/". decrypt($id);

//        return Response::make(file_get_contents($file), 200, [
//            'Content-Type' => 'application/pdf',
//            'Content-Disposition' => 'inline; filename="'.'dd'.'"'
//        ]);

        return Response::download($file);
    }
}
