<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return view('payment.index', [
            "payments" => Box::where("owner_id", Auth::user()->id)->get()
        ]);
    }
}
