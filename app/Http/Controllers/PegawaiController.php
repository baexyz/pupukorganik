<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    public function index(Request $request) {
        //Mendapatkan Nama User untuk ditampilkan di Home
        $user = $request->user();

        if ($user->can('Manager')) {
            $pegawai = Pegawai::where('role', 2)->get();
            return view('manager.manager-pegawai', [
                'user' => $user,
                'pegawai' => $pegawai
            ]);
        } 
        abort(403);
    }

    public function tambah(Request $request){
        $user = $request->user();
        if ($user->can("Manager")) {
            if ($request->isMethod('get')) {
                //Menampilkan halaman tambah produk
                return view('manager.manager-form-tambah-pegawai', [
                    'user' => $user
                ]);
            } else if ($request->isMethod('post')) {
                try {
                    $data = $request->validate([
                        'nama_pegawai' => 'required',
                        'notelp_pegawai' => 'required',
                        'email_pegawai' => 'required',
                        'password_pegawai' => 'required',
                    ]);

                    //Enkripsi password_pegawai
                    $data['password_pegawai'] = Hash::make($data['password_pegawai']);
                    $data['role'] = 2;
    
                    //Menambahkan produk baru
                    Pegawai::create($data);
                    return redirect('/pegawai');
                } catch(\Illuminate\Database\QueryException $e){
                    return $e;
                } catch (\Throwable $e) {
                    return $e;              
                }   
            }
        }
        abort(403);
    }

    public function edit(Request $request, $id){
        $user = $request->user();
        if ($user->can("Manager")) {
            if ($request->isMethod('get')) {
                //Menampilkan halaman edit produk beserta valuenya
                $pegawai = Pegawai::find($id);
                if ($pegawai->role == 2) {
                    return view('manager.manager-form-edit-pegawai', [
                        'user' => $user,
                        'pegawai' => $pegawai
                    ]);
                }
                
            } else if ($request->isMethod('post')) {
                $data = $request->validate([
                    'nama_pegawai' => 'required',
                    'notelp_pegawai' => 'required',
                    'email_pegawai' => 'required',
                ]);

                //Check if password is also changed
                if ($request->password_pegawai != null || $request->password_pegawai != "") {
                    $data['password_pegawai'] = Hash::make($request->password_pegawai);
                }

                Pegawai::where('id_pegawai', $id)
                    ->where('role', 2)
                    ->update($data);

                return redirect('/pegawai');
            }
        }

        abort(403);
    }

    public function delete(Request $request, $id){
        $user = $request->user();
        if ($user->can("Manager")) {
            //Menghapus produk
            $pegawai = Pegawai::find($id);
            //only delete with role 2
            if ($pegawai->role == 2) {
                $pegawai->delete();
                return redirect('/pegawai');
            }
        }
        abort(403);
    }
}
