<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pengambilan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    public function index(Request $request) {
        //Mendapatkan Nama User untuk ditampilkan di Home
        $user = $request->user();
        $keranjang = $user->keranjang()->orderBy('updated_at', 'desc')->get();
        if (count($keranjang) > 0) {
            $pembayaran = array();
            //loop through each keranjang
            foreach ($keranjang as $keranjang) {
                if ($keranjang->isCheckout == false) continue;
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

                $pembayaran[] = (object) [
                    'produk' => $produk,
                    'total' => $keranjang->harga_total_keranjang,
                    'id_keranjang' => $keranjang->id_keranjang,
                    'status_pembayaran' => $keranjang->checkout()->first()->status_pembayaran,
                    'invoice_url' => $keranjang->checkout()->first()->invoice_url,
                ];
            }

            return view('pelanggan.pelanggan-pembayaran', [
                'user' => $user,
                'pembayaran' => $pembayaran,
            ]);
        }
        abort(403);
    }

    public function receiveCallback(Request $request) {
        $data = $request->all();
        $idKeranjang = $data['external_id'];
        $pembayaran = Pembayaran::where('id_pemesanan', $idKeranjang)->first();
        if ($pembayaran) {
            $status = $data['status'];
            if ($status == 'PAID') {
                $timestamp = strtotime($data['paid_at']);
                $formattedDate = date("Y-m-d H:i:s", $timestamp);
                $pembayaran->waktu_pembayaran = $formattedDate;

                Pengambilan::create([
                    'id_pembayaran' => $pembayaran->id_pembayaran,
                    'id_user' => $pembayaran->checkout()->first()->id_user,
                    'status_pengambilan' => 0,
                ]);
            }
            $pembayaran->status_pembayaran = $status;
            $pembayaran->save();
        }
        return response()->json(['success' => true]);
    }

   
}
