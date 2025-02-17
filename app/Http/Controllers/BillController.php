<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Contract;
use App\Models\Bill;

class BillController extends Controller
{
    public function index()
    {
        $contracts = Contract::where("user_id", Auth::user()->id)
            ->whereDate('start_date', '<=', Carbon::today())
            ->whereDate('end_date', '>=', Carbon::today())
            ->get();
        return view('bill.index', [
            "contracts" => $contracts
        ]);
    }
    public function store(Request $request)
    {
        $contract = Contract::findOrFail($request->contract_id);
        $bill = new Bill();
        $bill->period_number = ceil(Carbon::parse($contract->start_date)->floatDiffInMonths(Carbon::now()));
        $bill->contract_id = $contract->id;
        $bill->save();
        return redirect()->route('bill.index');
    }

}
