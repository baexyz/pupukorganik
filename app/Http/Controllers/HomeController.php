<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){
        
        //Mendapatkan Nama User untuk ditampilkan di Home
        $user = $request->user();
        // return view('layouts.index', [
        //     'user' => $user
        // ]);

        return view('layouts.dashboard', [
            'user' => $user
        ]);
    
    }
}
