<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Box;
use App\Models\Tenant;
use App\Models\Contract;

class ContractController extends Controller
{
    public function index()
    {
        return view('contract.index', [
            "contracts" => Contract::where("user_id", Auth::user()->id)->get()
        ]);
    }

    public function show($id)
    {
        return view('contract.show', [
            "contract" => Contract::findOrFail($id)
        ]);
    }

    public function create()
    {
        return view('contract.create', [
            "boxes" => Box::where("owner_id", Auth::user()->id)->get(),
            "tenants" => Tenant::where("owner_id", Auth::user()->id)->get()
        ]);
    }

    public function store(Request $request)
    {
        $contract = new Contract();
        $contract->start_date = $request->get('start_date');
        $contract->end_date = $request->get('end_date');
        $contract->monthly_price = $request->get('monthly_price');
        $contract->box_id = $request->get('box_id');
        $contract->tenant_id = $request->get('tenant_id');
        $contract->user_id = Auth::user()->id;
        $contract->save();

        return redirect()->route('contract.index');
    }

    public function edit($id)
    {
        return view("contract.edit", [
            "contract" => Contract::with("tenant", "box")->findOrFail($id),
            "boxes" => Box::where("owner_id", Auth::user()->id)->get(),
            "tenants" => Tenant::where("owner_id", Auth::user()->id)->get()
        ]);
    }

    public function update(Request $request, $id)
    {
        $contract = Contract::findOrFail($id);
        $contract->start_date = $request->get('start_date');
        $contract->end_date = $request->get('end_date');
        $contract->monthly_price = $request->get('monthly_price');
        $contract->box_id = $request->get('box_id');
        $contract->tenant_id = $request->get('tenant_id');
        $contract->save();

        return redirect()->route('contract.index');
    }

    public function destroy($id)
    {
        Contract::destroy($id);
        return redirect()->route("contract.index");
    }
}

