<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KeranjangController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PengambilanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SuratjalanController;
use App\Http\Controllers\UserController;

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
    Route::get('produk/delete/{id}', [ProdukController::class, 'delete']);
    Route::get('produk/edit/{id}', [ProdukController::class, 'edit']);
    Route::post('produk/edit/{id}', [ProdukController::class, 'edit']);
    Route::get('produk/tambah', [ProdukController::class, 'tambah']);
    Route::post('produk/tambah', [ProdukController::class, 'tambah']);
    Route::post('/produk/pesan', [ProdukController::class, 'tambahKeranjang']);
    Route::get('/produk', [ProdukController::class, 'index']);
    Route::get('pegawai/delete/{id}', [PegawaiController::class, 'delete']);
    Route::get('pegawai/edit/{id}', [PegawaiController::class, 'edit']);
    Route::post('pegawai/edit/{id}', [PegawaiController::class, 'edit']);
    Route::get('pegawai/tambah', [PegawaiController::class, 'tambah']);
    Route::post('pegawai/tambah', [PegawaiController::class, 'tambah']);
    Route::get('/pegawai', [PegawaiController::class, 'index']);
    Route::get('keranjang/delete/{id}', [KeranjangController::class, 'delete']);
    Route::post('keranjang/edit', [KeranjangController::class, 'edit']);
    Route::get('/keranjang' , [KeranjangController::class, 'index']);
    Route::get('/checkout' , [CheckoutController::class, 'index']);
    Route::post('/checkout' , [CheckoutController::class, 'checkout']);
    Route::get('/bayar' , [PembayaranController::class, 'index']);
    Route::get('/riwayat-pemesanan', [UserController::class, 'riwayatPemesanan']);
    Route::get('/pengambilan', [PengambilanController::class, 'index']);
    Route::get('/daftar-pengambilan', [SuratjalanController::class, 'index']);
    Route::post('/form-surat', [SuratjalanController::class, 'formSurat']);
    Route::post('/input-surat', [SuratjalanController::class, 'inputSurat']);
    Route::get('/daftar-surat', [SuratjalanController::class, 'daftarSurat']);
    Route::get('/pelanggan', [UserController::class, 'daftarPelanggan']);
    Route::get('/pemesanan', [KeranjangController::class, 'indexManager']);
    Route::get('/riwayat-penjualan', [KeranjangController::class, 'riwayatPenjualan']);
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