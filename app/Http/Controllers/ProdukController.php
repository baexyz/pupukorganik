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
        if ($user->can('Manager')) {
            return view('manager.manager-produk', [
                'user' => $user,
                'produk' => $produk
            ]);
        } else if ($user->can('Pelanggan')) {
            return view('pelanggan.pelanggan-produk', [
                'user' => $user,
                'produk' => $produk
            ]);
        } else {
            abort(403);
        }
    }

    public function delete(Request $request, $id){
        $user = $request->user();
        if ($user->can("Manager")) {
            //Menghapus produk
            $produk = Produk::find($id);
            $produk->delete();
            return redirect('/produk');
        } else {
            abort(403);
        }
    }
}
