<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Contract;
use App\Models\Bill;

class PaymentController extends Controller
{
    public function index()
    {
        $bills = Bill::whereHas('contract', function ($query) {
            $query->where('user_id', Auth::id());
        })->get();
        return view('payment.index', [
            "bills" => $bills
        ]);
    }

    public function update(Request $request, $bill_id)
    {
        $bill = Bill::findOrFail($bill_id);
        $bill->payment_date = $request->get('payment_date');
        $bill->save();

        return redirect()->route('payment.index');
    }
}