<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdukController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {       
    return view('landpage.landingpage');
});

Route::middleware('auth:web,pegawai')->group(function () {
    // Route::get('/index', function () {       
    //     return view('layouts.index');
    // });
    Route::get('/index', [HomeController::class, 'index']);
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/produk', [ProdukController::class, 'index']);
});

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/tabel', function () {       
    return view('layouts.tabel');
});


Route::get('/tabel1', function () {       
    return view('layouts.tabel1');
});

Route::get('/tabel2', function () {       
    return view('layouts.tabel2');
});

Route::get('/tabel3', function () {       
    return view('layouts.tabel3');
});

Route::get('/tabel4', function () {       
    return view('layouts.tabel4');
});