<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){
        //Get user info
        $user = $request->user();
        return view('layouts.index', [
            'user' => $user
        ]);
    }
}
