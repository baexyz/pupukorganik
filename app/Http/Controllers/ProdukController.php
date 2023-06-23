<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(Request $request){
        //Mendapatkan Nama User untuk ditampilkan di Home
        $user = $request->user();

        //Menampilkan halaman produk beserta valuenya
        $produk = Produk::all();
        return view('pelanggan.pelanggan-produk', [
            'user' => $user,
            'produk' => $produk
        ]);
    }
}
