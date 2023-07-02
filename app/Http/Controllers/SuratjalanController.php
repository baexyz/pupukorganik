<?php

namespace App\Http\Controllers;

use App\Models\Pengambilan;
use App\Models\Suratjalan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuratjalanController extends Controller
{
    public function index(Request $request) {
        //Mendapatkan Nama User untuk ditampilkan di Home
        $user = $request->user();
        if ($user->cannot('Pelanggan')) {
            //sort by created_at
            $pengambilan = Pengambilan::orderBy('created_at', 'desc')->get();
            $data = array();
            if (count($pengambilan) > 0) {
                foreach ($pengambilan as $pengambilan) {
                    $pelanggan = $pengambilan->user()->first();
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
                        'pelanggan' => $pelanggan,
                        'produk' => $produk,
                        'id_pengambilan' => $pengambilan->id_pengambilan,
                        'id_keranjang' => $keranjang->id_keranjang,
                        'waktu_penerimaan' => $waktu_penerimaan,
                        'status' => $pengambilan->status_pengambilan,
                    ];
                }
            }
            return view('pegawai.pegawai-pengambilan', [
                'user' => $user,
                'pengambilan' => $data,
            ]);
        }
        abort(403);
    }

    public function formSurat (Request $request) {
        //Mendapatkan Nama User untuk ditampilkan di Home
        $user = $request->user();
        if ($user->can('Pegawai')) {
            //verify request
            $data = $request->validate([
                'id_pengambilan' => 'required|numeric',
            ]);

            $pengambilan = Pengambilan::find($data['id_pengambilan']);
            //check if pengambilan exist
            if ($pengambilan == null) {
                abort(404);
            }

            $pelanggan = $pengambilan->user()->first();
            return view('pegawai.pegawai-input-suratjalan', [
                'user' => $user,
                'pelanggan' => $pelanggan,
                'id_pengambilan' => $data['id_pengambilan'],

            ]);
        }
    }

    public function inputSurat (Request $request){
        //Mendapatkan Nama User untuk ditampilkan di Home
        $user = $request->user();
        if ($user->can('Pegawai')) {
            //verify request
            $data = $request->validate([
                'id_pengambilan' => 'required|numeric',
                'no_suratjalan' => 'required',
                'nama_penerima_suratjalan' => 'required',
                'notelp_penerima_suratjalan' => 'required',
                'waktu_penerimaan_suratjalan' => 'required',
                'tipe_kendaraan_suratjalan' => 'required',
                'noplat_suratjalan' => 'required',
                'bukti_suratjalan' => 'required|image|mimes:jpeg,png,jpg8',
            ]);

            $carbon = Carbon::parse($data['waktu_penerimaan_suratjalan'], 'Asia/Jakarta');
            $carbon->setTimezone('UTC');
            $data['waktu_penerimaan_suratjalan'] = $carbon->format('Y-m-d H:i:s');

            if($request->file('bukti_suratjalan')) {
                $file = $request->file('bukti_suratjalan');
                $fileName = $file->hashName();
                $file->store('public/img/bukti');
                $data['bukti_suratjalan'] = '/storage/img/bukti/'.$fileName;
            }
            
            $data['id_pegawai'] = $user->id_pegawai;

            Suratjalan::create($data);

            $pengambilan = Pengambilan::find($data['id_pengambilan']);
            $pengambilan->status_pengambilan = true;
            $pengambilan->save();

            return redirect('/daftar-surat');
        }
        abort(403);
    }

    public function daftarSurat(Request $request) {
        //Mendapatkan Nama User untuk ditampilkan di Home
        $user = $request->user();
        if ($user->cannot('Pelanggan')) {
            $suratjalan = Suratjalan::orderBy('created_at', 'desc')->get();

            $suratjalan->map(function ($item) {
                $carbon = Carbon::parse($item->waktu_penerimaan_suratjalan, 'UTC');
                $carbon->setTimezone('Asia/Jakarta');
                $item->waktu_penerimaan_suratjalan = $carbon->format('d/m/Y (H:i:s)');
                return $item;
            });
            
            return view('pegawai.pegawai-suratjalan', [
                'user' => $user,
                'suratjalan' => $suratjalan,
            ]);
        }
        abort(403);
    }
}
