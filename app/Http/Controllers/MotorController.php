<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motor;

class MotorController extends Controller
{
    public function index()
    {
        $motors = Motor::all();
        return view('admin.motors.index', compact('motors'));
    }

    public function create()
    {
        return view('admin.motors.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.motors.index');
    }

    public function edit($id)
    {
        return view('admin.motors.edit');
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('admin.motors.index');
    }

    public function destroy($id)
    {
        return redirect()->route('admin.motors.index');
    }
}
