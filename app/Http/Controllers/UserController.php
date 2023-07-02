<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function riwayatPemesanan(Request $request)
    {
        //Mendapatkan Nama User untuk ditampilkan di Home
        $user = $request->user();
        $keranjang = $user->keranjang()->orderBy('updated_at', 'desc')->get();
        $pemesanan = array();
        if (count($keranjang) > 0) {
            //loop through each keranjang
            foreach ($keranjang as $keranjang) {
                if ($keranjang->isCheckout == false) continue;
                $keranjang_checkout = $keranjang->checkout()->first();
                if ($keranjang_checkout->status_pembayaran != 'PAID') continue;
                $produk = DB::select("
                SELECT p.id_produk, p.nama_produk, p.harga_produk, t.kuantitas
                FROM produk AS p
                JOIN (
                    SELECT jt.id_produk, jt.kuantitas
                    FROM keranjang,
                    JSON_TABLE(keranjang.produk, '$[*]' COLUMNS (
                        id_produk INT PATH '$.id_produk',
                        kuantitas INT PATH '$.kuantitas'
                    )) AS jt
                    WHERE keranjang.id_keranjang = :idKeranjang
                ) AS t ON p.id_produk = t.id_produk
                ", ['idKeranjang' => $keranjang->id_keranjang]);

                $pemesanan[] = (object) [
                    'produk' => $produk,
                    'total' => $keranjang->harga_total_keranjang,
                    'id_keranjang' => $keranjang->id_keranjang,
                ];
            }
            
        }
        return view('pelanggan.pelanggan-riwayat-pemesanan', [
            'user' => $user,
            'pemesanan' => $pemesanan,
        ]);
    }
}
