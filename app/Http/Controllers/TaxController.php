<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Bill;
use Barryvdh\DomPDF\Facade\Pdf;

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

    public function export_pdf(Request $request)
    {
        $sum_bills = $request->input('sum_bills');
        $html = view('tax.pdf', compact('sum_bills'))->render();
        $pdf = Pdf::loadHTML($html);
        return $pdf->download('impots.pdf');
    }
}
