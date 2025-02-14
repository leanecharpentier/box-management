<?php

namespace App\Http\Controllers;

use App\Models\ModelContract;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Box;

class ModelContractController extends Controller
{
    public function index()
    {
         return view('model_contract.index', [
            "models_contracts" => ModelContract::where("user_id", Auth::user()->id)->get()
        ]);
    }

    public function show($id)
    {
        $model_contract = ModelContract::findOrFail($id);
        return view('model_contract.show', compact('model_contract'));
    }

    public function create()
    {
        return view('model_contract.create');
    }

    public function store(Request $request)
    {
        $model_contract = new ModelContract();
        $model_contract->name = $request->get('name');
        $model_contract->content = $request->get(key: 'content');
        $model_contract->user_id = Auth::id();
        $model_contract->save();

        return redirect()->route('model_contract.index');
    }


    public function edit($id)
    {
        return view("model_contract.edit", [
            "model_contract" => ModelContract::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $model_contract = ModelContract::findOrFail($id);
        $model_contract->name = $request->get('name');
        $model_contract->content = $request->get(key: 'content');
        $model_contract->save();

        return redirect()->route("model_contract.show", $id);
    }

    public function destroy($id)
    {
        ModelContract::destroy($id);
        return redirect()->route("model_contract.index");
    }
}
