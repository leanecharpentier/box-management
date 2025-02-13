<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantsController extends Controller
{
    public function create($box_id)
    {
        return view('tenants.create', ['box_id' => $box_id]);
    }

    public function store(Request $request, $box_id)
    {
        $tenant = new Tenant();
        $tenant->lastname = $request->get('lastname');
        $tenant->firstname = $request->get('firstname');
        $tenant->phone = $request->get('phone');
        $tenant->email = $request->get('email');
        $tenant->box_id = $box_id;
        $tenant->start_date = now();
        $tenant->save();

        return redirect()->route('box.show', ['id' => $box_id]);
    }
}
