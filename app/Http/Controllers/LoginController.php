<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email_user' => 'required|email',
            'password_user' => 'required',
        ]);

        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();
        //     return redirect()->intended('/index');
        // }
        if (Auth::attempt(['email_user' => $credentials['email_user'],'password' => $credentials['password_user']])){
            $request->session()->regenerate();
            return redirect()->intended('/index');
        }

        return back()->with('loginError', 'Login Gagal! Silahkan Cek Email dan Password Anda');
    }
}
