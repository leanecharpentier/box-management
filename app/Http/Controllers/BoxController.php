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
}
