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

    public function tambah(Request $request){
        $user = $request->user();
        if ($user->can("Manager")) {
            if ($request->isMethod('get')) {
                //Menampilkan halaman tambah produk
                return view('manager.manager-form-tambah-produk', [
                    'user' => $user
                ]);
            }
            if ($request->isMethod('post')) {
                try {
                    $data = $request->validate([
                        'nama_produk' => 'required',
                        'berat_produk' => 'required',
                        'harga_produk' => 'required',
                        'deskripsi_produk' => 'required',
                        'foto_produk' => 'required|image|mimes:jpeg,png,jpg',
                    ]);
    
                    if($request->file('foto_produk')) {
                        $file = $request->file('foto_produk');
                        $fileName = $file->hashName();
                        $file->store('public/img/produk');
                        $data['foto_produk'] = '/storage/img/produk/'.$fileName;
                    }
    
                    //Menambahkan produk baru
                    Produk::create($data);
                    return redirect('/produk');
                } catch(\Illuminate\Database\QueryException $e){
                    return $e;
                } catch (\Throwable $e) {
                    return $e;              
                }   
                
            }
        } else {
            abort(403);
        }
    }

    public function edit(Request $request, $id){
        $user = $request->user();
        if ($user->can("Manager")) {
            if ($request->isMethod('get')) {
                //Menampilkan halaman edit produk beserta valuenya
                $produk = Produk::find($id);
                return view('manager.manager-form-edit-produk', [
                    'user' => $user,
                    'produk' => $produk
                ]);
            }
            if ($request->isMethod('post')) {
                $data = $request->validate([
                    'nama_produk' => 'required',
                    'berat_produk' => 'required',
                    'harga_produk' => 'required',
                    'deskripsi_produk' => 'required',
                    'foto_produk' => 'required|image|mimes:jpeg,png,jpg',
                ]);

                if($request->file('foto_produk')) {
                    $file = $request->file('foto_produk');
                    $fileName = $file->hashName();
                    $file->store('public/img/produk');
                    $data['foto_produk'] = '/storage/img/produk/'.$fileName;
                }

                Produk::where('id_produk', $id)
                    ->update([
                        'nama_produk' => $data['nama_produk'],
                        'berat_produk' => $data['berat_produk'],
                        'harga_produk' => $data['harga_produk'],
                        'deskripsi_produk' => $data['deskripsi_produk'],
                        'foto_produk' => $data['foto_produk']
                    ]);

                return redirect('/produk');
            }

            //Menampilkan halaman edit produk beserta valuenya
            $produk = Produk::find($id);
            return view('manager.manager-form-tambah-produk', [
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
