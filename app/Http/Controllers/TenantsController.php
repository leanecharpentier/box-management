<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantsController extends Controller
{
    public function create()
    {
        return view('tenant.create');
    }

    public function store(Request $request, $box_id)
    {
        $tenant = new Tenant();
        $tenant->lastname = $request->get('lastName');
        $tenant->firstname = $request->get('firstName');
        $tenant->phone = $request->get('phone');
        $tenant->email = $request->get('email');
        $tenant->box_id = $box_id;
        $tenant->save();

        return redirect()->route('box.show', $box_id);
    }
}
