<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Xendit\Invoice;
use Xendit\Xendit;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        //Mendapatkan Nama User untuk ditampilkan di Home
        $user = $request->user();
        $keranjang = $user->keranjang()->where('isCheckout', 0)->get();
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
            ", ['idKeranjang' => $keranjang[0]->id_keranjang]);

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
            try {
                //Ambil seluruh produk pada keranjang yang akan dibayar
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
                ", ['idKeranjang' => $data['id_keranjang']]);
                
                $produk = array_map(function($item) {
                    return [
                        'name' => $item->nama_produk,
                        'quantity' => $item->kuantitas,
                        'price' => $item->harga_produk,
                    ];
                }, $produk);
    
                // Get the API key from the .env file
                Xendit::setApiKey(env('XENDIT_API_KEY'));
    
                $params = [ 
                    'external_id' => $data['id_keranjang'],
                    'amount' => $keranjang[0]->harga_total_keranjang,
                    'description' => 'Invoice #' . $data['id_keranjang'],
                    'invoice_duration' => 86400,
                    'customer' => [
                        'given_names' => $user->nama_user,
                        'email' => $user->email_user,
                        'mobile_number' => $user->notelp_user,
                        'addresses' => [
                            [
                                'country' => 'Indonesia',
                                'street_line1' => $user->alamat_user,
                            ]
                        ]
                    ],
                    'customer_notification_preference' => [
                        'invoice_created' => [
                            'whatsapp',
                            'sms',
                            'email',
                        ],
                        'invoice_reminder' => [
                            'whatsapp',
                            'sms',
                            'email',
                        ],
                        'invoice_paid' => [
                            'whatsapp',
                            'sms',
                            'email',
                        ],
                        'invoice_expired' => [
                            'whatsapp',
                            'sms',
                            'email',
                        ]
                    ],
                    'currency' => 'IDR',
                    'items' => $produk,
                  ];
                Invoice::create($params);

                Pembayaran::create([
                    'id_pemesanan' => $data['id_keranjang'],
                    'status_pembayaran' => 'PENDING'
                ]);
                $keranjang[0]->isCheckout = true;
                $keranjang[0]->save();
    
                return redirect('/bayar');
            } catch (\Exception $e) {
                // abort(500, $e->getMessage());
                ddd($e);
            }
        }
        abort(403);
    }
}
