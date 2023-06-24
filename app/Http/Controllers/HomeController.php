<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){
        //Mendapatkan Nama User untuk ditampilkan di Home
        $user = $request->user();

        if ($user->can('Manager')) {
            return view('manager.manager-home', [
                'user' => $user
            ]);
        } else if ($user->can('Pegawai')) {
            return view('pegawai.pegawai-home', [
                'user' => $user
            ]);
        } else {
            return view('pelanggan.pelanggan-home', [
                'user' => $user
            ]);
        }
    }
}
