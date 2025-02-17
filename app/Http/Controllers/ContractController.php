<?php

namespace App\Http\Controllers;

use App\Models\ModelContract;
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
        $contract = Contract::with("model_contract")->findOrFail($id);
        $model_content = $contract->model_contract->content;
        $variables = [
            'TENANT_LASTNAME' => $contract->tenant->lastname,
            'TENANT_FIRSTNAME' => $contract->tenant->firstname,
            'TENANT_PHONE' => $contract->tenant->phone,
            'TENANT_EMAIL' => $contract->tenant->email,
            'OWNER_NAME' => $contract->user->name,
            'OWNER_EMAIL' => $contract->user->email,
            'BOX_NAME' => $contract->box->name,
            'BOX_ADDRESS' => $contract->box->address . " " . $contract->box->code . " " .  $contract->box->city,
            'BOX_PRICE' => $contract->monthly_price,
            'START_DATE' => \Carbon\Carbon::parse($contract->start_date)->translatedFormat('j F Y'),
            'END_DATE' => \Carbon\Carbon::parse($contract->end_date)->translatedFormat('j F Y'),
            'CONTRACT_DATE' => now(),
            'CONTRACT_LOCATION' => 'Angers'
        ];

        $parsed_model_content = preg_replace_callback('/%(\w+)%/', function($matches) use ($variables) {
            return $variables[$matches[1]] ?? $matches[0];
        }, $model_content);

        $parsed_model_content = json_decode($parsed_model_content, true);

        return view('contract.show', [
            "contract" => $contract,
            "content" => $parsed_model_content
        ]);
    }

    public function create()
    {
        return view('contract.create', [
            "boxes" => Box::where("owner_id", Auth::user()->id)->get(),
            "tenants" => Tenant::where("owner_id", Auth::user()->id)->get(),
            "models_contracts" => ModelContract::where("user_id", Auth::user()->id)->get()
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
        $contract->model_contract_id = $request->get('model_contract_id');
        $contract->user_id = Auth::user()->id;
        $contract->save();

        return redirect()->route('contract.index');
    }

    public function edit($id)
    {
        return view("contract.edit", [
            "contract" => Contract::with("tenant", "box")->findOrFail($id),
            "boxes" => Box::where("owner_id", Auth::user()->id)->get(),
            "tenants" => Tenant::where("owner_id", Auth::user()->id)->get(),
            "models_contracts" => ModelContract::where("user_id", Auth::user()->id)->get()
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
        $contract->model_contract_id = $request->get('model_contract_id');
        $contract->save();

        return redirect()->route('contract.index');
    }

    public function destroy($id)
    {
        Contract::destroy($id);
        return redirect()->route("contract.index");
    }
}

