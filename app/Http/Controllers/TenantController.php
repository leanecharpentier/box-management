<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Tenant;

class TenantController extends Controller
{
    public function index()
    {
        return view('tenant.index', [
            "tenants" => Tenant::where("owner_id", Auth::user()->id)->get()
        ]);
    }

    public function show($id)
    {
        return view('tenant.show', [
            "tenant" => Tenant::findOrFail($id)
        ]);
    }

    public function create()
    {
        return view('tenant.create');
    }

    public function store(Request $request)
    {
        $tenant = new Tenant();
        $tenant->firstname = $request->get('firstname');
        $tenant->lastname = $request->get('lastname');
        $tenant->email = $request->get('email');
        $tenant->phone = $request->get('phone');
        $tenant->owner_id = Auth::user()->id;
        $tenant->save();

        return redirect()->route('tenant.index');
    }

    public function edit($id)
    {
        return view("tenant.edit", [
            "tenant" => Tenant::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $tenant = Tenant::findOrFail($id);
        $tenant->firstname = $request->get('firstname');
        $tenant->lastname = $request->get('lastname');
        $tenant->email = $request->get('email');
        $tenant->phone = $request->get('phone');
        $tenant->save();

        return redirect()->route('tenant.index');
    }

    public function destroy($id)
    {
        Tenant::destroy($id);
        return redirect()->route("tenant.index");
    }

    public function export_csv(Request $request)
    {
        $tenants = json_decode($request->input('tenants'));

        $fileName = 'locataires_' . now()->format('Y-m-d_H-i-s') . '.csv';
        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0",
        ];

        $handle = fopen('php://output', 'w');
        fputcsv($handle, ['ID', 'Nom', 'Prénom', 'Email', 'Téléphone']);
        
        foreach ($tenants as $tenant) {
            fputcsv($handle, [
                $tenant->id,
                $tenant->lastname,
                $tenant->firstname,
                $tenant->email,
                $tenant->phone,
            ]);
        }

        return response()->stream(
        function () use ($handle) {
            flush();
            fclose($handle);
        },
        200,
        $headers
    );
    }
}
