<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function listInvoice(){
        return view('invoice.invoiceList');
    }
}
