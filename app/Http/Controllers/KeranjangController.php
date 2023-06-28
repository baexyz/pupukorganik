<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Produk;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class KeranjangController extends Controller
{
    public function index(Request $request)
    {
        //Mendapatkan Nama User untuk ditampilkan di Home
        $user = $request->user();
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
        ", ['idKeranjang' => $user->keranjang()->get()[0]->id_keranjang]);

        return view('pelanggan.pelanggan-keranjang', [
            'user' => $user,
            'keranjang' => $produk
        ]);
    }

    public function delete(Request $request, $id)
    {
        $user = $request->user();
        if ($user->can('Pelanggan')) {
            $keranjang = $user->keranjang()->get();
            if (count($keranjang) == 0) {
                return redirect('/keranjang');
            }
            $keranjang = $keranjang[0];
            $produk = $keranjang->produk;
            $produk = json_decode($produk);
            $produkBaru = array();
            foreach ($produk as $p) {
                if ($p->id_produk != $id) {
                    array_push($produkBaru, $p);
                }
            }
            $keranjang->produk = json_encode($produkBaru);
            $keranjang->save();
            return redirect('/keranjang');
        }
        abort(403);
    }
}
