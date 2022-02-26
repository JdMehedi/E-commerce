<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShipmentSummaryController extends Controller
{
    public $user;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }

    public function listShipmentSummary(){
        if (is_null($this->user) ||  !$this->user->can('shipment.summary.list')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        return view('shipment.shipmentSummaryList');
    }
}
