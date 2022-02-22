<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShipmentSummaryController extends Controller
{
    public function listShipmentSummary(){
        return view('shipment.shipmentSummaryList');
    }
}
