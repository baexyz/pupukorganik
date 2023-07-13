<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


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
                    
                    //Menyimpan foto produk
                    if($request->file('foto_produk')) {
                        $file = $request->file('foto_produk');
                        $fileName = $file->hashName();
                        $file->store('public/img/produk');
                        $data['foto_produk'] = '/storage/img/produk/'.$fileName;
                    }
    
                    //Menambahkan produk baru
                    Produk::create($data);
                    return redirect('/produk');

                    //error handling jika upload image gagal
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
                    'foto_produk' => 'image|mimes:jpeg,png,jpg',
                ]);

                if($request->file('foto_produk')) {
                    $file = $request->file('foto_produk');
                    $fileName = $file->hashName();
                    $file->store('public/img/produk');
                    $data['foto_produk'] = '/storage/img/produk/'.$fileName;
                }

                Produk::where('id_produk', $id)
                    ->update($data);

                return redirect('/produk');
            }
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

    public function tambahKeranjang(Request $request){
        $user = $request->user();
        //validate request data
        $data = $request->validate([
            'id_produk' => 'required',
        ]);
        $id = $data['id_produk'];

        if ($user->can("Pelanggan")) {
            $harga_produk = Produk::find($id)->harga_produk;
            $keranjang = $user->keranjang()->where('isCheckout', 0)->get();
            if (count($keranjang) == 0) {
                $data = [
                    'id_user' => $user->id_user,
                    'produk' => json_encode([
                        ['id_produk' => $id, 'kuantitas' => 1],
                    ]),
                    'harga_total_keranjang' => $harga_produk,
                ];
                generateUniqueCode($data);
            } else if (count($keranjang) == 1) {
                $keranjang = $keranjang[0];

                // Check if the id_produk already exists in the row
                $isProdukNotExist = true;
                $produk = json_decode($keranjang->produk);
                foreach ($produk as $item) {
                  if ($item->id_produk == $id) {
                    // Increment the kuantitas
                    $item->kuantitas++;
                    $isProdukNotExist = false;
                    break;
                  }
                }
                
                // If the id_produk does not exist in the row, append it to the array
                if ($isProdukNotExist) {
                  $produk[] = ['id_produk' => $id, 'kuantitas' => 1];
                }
                
                // Update the row
                DB::table('keranjang')
                    ->where('id_keranjang', $keranjang->id_keranjang)
                    ->update([
                        'produk' => json_encode($produk),
                        'harga_total_keranjang' => DB::raw("harga_total_keranjang + $harga_produk"),
                    ]);
            }
            return redirect('/produk');
        }
        abort(403);
    }
}

function generateUniqueCode($data) {
    try {
        $code = "";
        for ($i = 0; $i < 5; $i++) {
            $code .= Str::random(1);
        }
        $code = strtoupper($code);
        $data['id_keranjang'] = $code;
        Keranjang::create($data);
    } catch (\Illuminate\Database\QueryException $e) {
        $error_info = $e->errorInfo;
        if($error_info[1] == 1062) {
            generateUniqueCode($data);
        } else {
            // Only logs when an error other than duplicate happens
            // print_r($e->getMessage());
            ddd($e->getMessage());
        }
    }
}