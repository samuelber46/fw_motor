<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MotorController extends Controller
{
    public function index()
    {
        return view('admin.motor.index');
    }

    public function create()
    {
        return view('admin.motor.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.motor.index');
    }

    public function edit($id)
    {
        return view('admin.motor.edit');
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('admin.motor.index');
    }

    public function destroy($id)
    {
        return redirect()->route('admin.motor.index');
    }
}
