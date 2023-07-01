<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Produk;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class KeranjangController extends Controller
{
    public function index(Request $request)
    {
        //Mendapatkan Nama User untuk ditampilkan di Home
        $user = $request->user();
        $keranjang = $user->keranjang()->where('isCheckout', 0)->get();
        $produk = array();
        $total_harga = 0;
        if (count($keranjang) == 1) {
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
            ", ['idKeranjang' => $keranjang[0]->id_keranjang]);
            $total_harga = $keranjang[0]->harga_total_keranjang;
        }
        
        return view('pelanggan.pelanggan-keranjang', [
            'user' => $user,
            'keranjang' => $produk,
            'total_harga' => $total_harga
        ]);
    }

    public function delete(Request $request, $id)
    {
        $user = $request->user();
        if ($user->can('Pelanggan')) {
            $keranjang = $user->keranjang()->where('isCheckout', 0)->get();
            if (count($keranjang) == 0) {
                return redirect('/keranjang');
            }
            $keranjang = $keranjang[0];
            $harga_produk = Produk::find($id)->harga_produk;
            $produk = $keranjang->produk;
            $produk = json_decode($produk);
            $produkBaru = array();
            foreach ($produk as $p) {
                if ($p->id_produk != $id) {
                    array_push($produkBaru, $p);
                } else {
                    $keranjang->harga_total_keranjang -= $harga_produk * $p->kuantitas;
                }
            }
            $keranjang->produk = json_encode($produkBaru);
            $keranjang->save();
            return redirect('/keranjang');
        }
        abort(403);
    }

    public function edit(Request $request) {
        $user = $request->user();
        if ($user->can('Pelanggan')) {
            $keranjang = $user->keranjang()->where('isCheckout', 0)->get();
            if (count($keranjang) == 0) {
                return redirect('/keranjang');
            }
            $keranjang = $keranjang[0];
            $produk = $keranjang->produk;
            $produk = json_decode($produk);
            $produkBaru = array();

            //verify request
            $data = $request->validate([
                'kuantitas' => 'required|numeric',
                'id_produk' => 'required|numeric'
            ]);

            $harga_produk = Produk::find($data['id_produk'])->harga_produk;

            foreach ($produk as $p) {
                if ($p->id_produk == $data['id_produk']) {
                    $total_harga_old = $p->kuantitas * $harga_produk;
                    if ($data['kuantitas'] == 0) {
                        $keranjang->harga_total_keranjang -= $total_harga_old;
                        continue;
                    }
                    $total_harga_new = $data['kuantitas'] * $harga_produk;
                    $keranjang->harga_total_keranjang += $total_harga_new - $total_harga_old;
                    $p->kuantitas = $data['kuantitas'];
                }
                array_push($produkBaru, $p);
            }
            $keranjang->produk = json_encode($produkBaru);
            $keranjang->save();
            return redirect('/keranjang');
        }
        abort(403);
    }

}

