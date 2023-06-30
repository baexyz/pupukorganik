<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        //Mendapatkan Nama User untuk ditampilkan di Home
        $user = $request->user();
        $keranjang = $user->keranjang()->get();
        if (count($keranjang) > 0) {
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

            return view('pelanggan.pelanggan-checkout', [
                'user' => $user,
                'produk' => $produk,
                'id_keranjang' => $keranjang[0]->id_keranjang
            ]);
        }
        abort(403);
    }

    public function checkout(Request $request) {
        //Mendapatkan Nama User untuk ditampilkan di Home
        $user = $request->user();        
        //validate request data
        $data = $request->validate([
            'id_keranjang' => 'required',
        ]);

        //check if user have that id_keranjang
        $keranjang = $user->keranjang()->where('id_keranjang', $data['id_keranjang'])->get();
        if (count($keranjang) > 0) {
            Pembayaran::create([
                'id_pemesanan' => $data['id_keranjang'],
                'status_pembayaran' => false
            ]);
            $keranjang[0]->isCheckout = true;
            $keranjang[0]->save();

            return redirect('/bayar');
        }
    }
}
