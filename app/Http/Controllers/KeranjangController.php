<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Produk;
use Carbon\Carbon;
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

    public function indexManager(Request $request) {
        //Mendapatkan Nama User untuk ditampilkan di Home
        $user = $request->user();
        if ($user->can("Manager")) {
            $pemesanan = Keranjang::where('isCheckout', 1)->orderBy('created_at', 'desc')->get();
            $data = array();
            if (count($pemesanan) > 0) {
                foreach ($pemesanan as $pemesanan) {
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
                    ", ['idKeranjang' => $pemesanan->id_keranjang]);

                    $waktu_pemesanan = Carbon::parse($pemesanan->created_at);
                    $waktu_pemesanan->setTimezone('Asia/Jakarta');
                    $pemesanan->created_at = $waktu_pemesanan->format('d-m-Y H:i:s');

                    $data[] = (object) [
                        'produk' => $produk,
                        'pelanggan' => $pemesanan->user()->first(),
                        'total_harga' => $pemesanan->harga_total_keranjang,
                        'id_keranjang' => $pemesanan->id_keranjang,
                        'waktu_pemesanan' => $pemesanan->created_at,
                        'status' => $pemesanan->checkout()->first()->status_pembayaran,
                    ];
                }
            }
            return view('manager.manager-order', [
                'user' => $user,
                'pemesanan' => $data,
            ]);
        }
        abort(403);
        
    }

    public function riwayatPenjualan(Request $request)
    {
        //Mendapatkan Nama User untuk ditampilkan di Home
        $user = $request->user();
        if ($user->cannot("Manager")) abort(403);
        $keranjang = Keranjang::orderBy('created_at', 'desc')->get();
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
                    'pelanggan' => $keranjang->user()->first(),
                    'total' => $keranjang->harga_total_keranjang,
                    'id_keranjang' => $keranjang->id_keranjang,
                ];
            }
            
        }
        return view('manager.manager-riwayat-pemesanan', [
            'user' => $user,
            'pemesanan' => $pemesanan,
        ]);
    }

}

