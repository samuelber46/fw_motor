<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::where('id', auth()->user()->id)->first();
        return view('account.index', compact('user'));
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'password' => 'confirmed',
        ]);
        $user = User::where('id', auth()->user()->id)->first();
        $user->name = $request->name;
        $user->alamat = $request->alamat;
        if(!empty($request->password)){
            $user->password = Hash::make($request->password);
        }
        $user->update();
        Alert::success('Success', 'Data berhasil diubah');
        return redirect('account');
    }
}
