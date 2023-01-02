<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motor;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class MotorController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'is_admin']);
    }

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
        $motors = Motor::all();


        if ($request->validated()) {
            $image = $request->file('gambar')->store('assets/car', 'public');
            $slug = Str::slug($request->nama_motor, '-');
            Motor::create($request->except('image') + [
                'image' => $image, 'slug' => $slug
            ]);
        }
        Alert::success('Yay!', 'Data motor berhasil dibuat');
        return redirect()->route('motor.');
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
