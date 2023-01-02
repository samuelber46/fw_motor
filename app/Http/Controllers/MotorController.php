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
        $image = $request->file('image')->store('assets/motor', 'public');
        $motor = [
            'image' => $image,
            'nama_motor' => $request->nama_motor,
            'stok' => $request->stok,
            'warna' => $request->warna,
            'silinder' => $request->silinder,
            'transmisi' => $request->transmisi,
            'details' => $request->details,
            'harga' => $request->harga,
        ];
        $process = Motor::create($motor);
        if (!$process) {
            Alert::error('Oops...', 'Ada yang salah!');
            return redirect()->route('motor.create');
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
        return redirect()->route('motor.');
    }

    public function destroy($id)
    {
        // destroy motor with image
        $motor = Motor::findOrFail($id);
        $image_path = public_path('storage/' . $motor->image);
        if (file_exists($image_path)) {
            unlink('storage/' . $motor->image);
        }
        $motor->delete();
        Alert::success('Yay!', 'Data motor berhasil dihapus');
        return redirect()->route('motor.');
    }
}
