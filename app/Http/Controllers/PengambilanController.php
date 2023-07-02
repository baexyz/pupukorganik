<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengambilanController extends Controller
{
    public function index(Request $request) {
        //Mendapatkan Nama User untuk ditampilkan di Home
        $user = $request->user();
        $pengambilan = $user->pengambilan()->orderBy('updated_at', 'desc')->get();
        $data = array();
        if (count($pengambilan) > 0) {
            foreach ($pengambilan as $pengambilan) {
                $keranjang = $pengambilan->pembayaran()->first()->checkout()->first();
                $produk = DB::select("
                SELECT p.nama_produk, t.kuantitas
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

                $data_suratjalan = $pengambilan->suratjalan()->first();
                if ($data_suratjalan == null) {
                    $waktu_penerimaan = "Belum Diambil";
                } else {
                    $waktu_penerimaan = $data_suratjalan->waktu_penerimaan_suratjalan;
                }

                $data[] = (object) [
                    'produk' => $produk,
                    'id_keranjang' => $keranjang->id_keranjang,
                    'waktu_penerimaan' => $waktu_penerimaan,
                    'status' => $pengambilan->status_pengambilan,
                ];
            }
        }
        // $pengambilan = $user->keranjang()->where('isCheckout', 1)->get()->map(function ($keranjang) {
        //     return $keranjang->pembayaran()->first();
        // })->filter(function ($pengambilan) {
        //     return $pengambilan != null;
        // });
        //get data pengambilan from user keranjang where checkout is 1, and then get the first pembayaran with status_pembayaran is paid 
        // ddd($data);
        return view('pelanggan.pelanggan-pengambilan', [
            'user' => $user,
            'pengambilan' => $data,
        ]);
    }
}
