<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Bill;

class TaxController extends Controller
{
    public function index()
    {
        $bills = Bill::whereHas('contract', function ($query) {
            $query->where('user_id', Auth::id());
        })
        ->whereYear('created_at', Carbon::now()->year)
        ->with("contract")
        ->get();
        $sum = 0;
        foreach ($bills as $bill) {
            $sum += $bill->contract->monthly_price;
        }
        return view('tax.index', [
            "sum_bills" => $sum
        ]);
    }
}
