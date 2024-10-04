<?php

namespace App\Http\Controllers;

use App\Models\Box;
use Illuminate\Http\Request;

class BoxController extends Controller
{
    public function index()
    {
        return view('box.index', [
            "box" => Box::all()
        ]);
    }

    public function show($id)
    {
        return view('box.show', [
            "box" => Box::findOrFail($id)
        ]);
    }

    public function create()
    {
        return view('box.create');
    }

    public function store(Request $request)
    {
        $box = new Box();
        $box->name = $request->get('name');
        $box->address = $request->get('address');
        $box->code = $request->get('code');
        $box->city = $request->get('city');
        $box->country = $request->get('country');
        $box->rent = $request->get('rent');
        $box->save();

        return redirect()->route('box.index');
    }

    public function edit($id)
    {
        return view("box.edit", [
            "box" => Box::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $box = Box::findOrFail($id);
        $box->name = $request->get('name');
        $box->address = $request->get('address');
        $box->code = $request->get('code');
        $box->city = $request->get('city');
        $box->country = $request->get('country');
        $box->rent = $request->get('rent');
        $box->save();

        return redirect()->route('box.index');
    }
}
