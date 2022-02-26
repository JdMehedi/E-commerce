<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FreightController extends Controller
{
    public $user;
    public $extra_title;
    public function __construct()
    {
        $this->extra_title = "- Freight";
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }

    public function listFreight(){
        if (is_null($this->user) ||  !$this->user->can('freight.list')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $data['extra_title'] = $this->extra_title;
        return view('freight.list', $data);
    }
}
