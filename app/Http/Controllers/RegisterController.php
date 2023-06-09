<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'nama_user' => 'required|max:255',
            'perusahaan_user' => 'required|max:255',
            'email_user' => ['required', 'email', 'max:255', 'unique:user'],
            'notelp_user' => 'required',
            'alamat_user' => 'required|max:255',
            'password_user' => 'required',
        ]);

        $validatedData['password_user'] = Hash::make($validatedData['password_user']);

        User::create($validatedData);

        return redirect('/login')->with('success', 'Registrasi Berhasil! Silahkan Login');
    }
}
