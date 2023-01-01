<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MotorController extends Controller
{
    public function index()
    {
        return view('motor.index');
    }

    public function create()
    {
        return view('motor.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('motor.index');
    }

    public function edit($id)
    {
        return view('motor.edit');
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('motor.index');
    }

    public function destroy($id)
    {
        return redirect()->route('motor.index');
    }
}
