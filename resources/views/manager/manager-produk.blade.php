@extends('layouts.dashboard')

@section('title', 'Produk')

@section('page-title', 'Produk')

@section('user-name', $user->nama_pegawai)

@section('container')


<a class="btn btn-success" style="width:15%; margin-left:85%; margin-bottom:1%;" href="/produk/tambah">+ Tambah Produk</a>
<div class="row"> 
  <div class="col-12">
    
      <div class="card">

          <div class="card-body">
            <h3 class="card-title m-b-0">Daftar Produk</h3>    
          </div>
          
          <table class="table">
  
                <thead>
                  <tr>
                    <th scope="col">Foto</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Berat</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
  
                
               {{-- Valuenya masih contoh --}}
  
                <tbody>
                @foreach ($produk as $item)
                  <tr>
                    <!--<td> <img src="" alt=""> </td> -->
                    <td style="width: 30%">
                      <img src="{{ $item->foto_produk }}" alt="user" style="width: 100%" />
                    </td>
                    <td style="width: 15%">{{ $item->nama_produk }}</td>
                    <td style="width: 10%">{{ $item->berat_produk }} Kg</td>
                    <td style="width: 10%">{{ $item->harga_produk }}</td>
                    <td style="width: 20%">{{ $item->deskripsi_produk }}</td>
                    <td>
                      {{-- EDIT PRODUK --}}
                      <a href="produk/edit/{{ $item->id_produk }}" class="btn btn-warning">Edit</a>
                      {{-- HAPUS PRODUK --}}
                      <a href="produk/delete/{{ $item->id_produk }}" class="btn btn-danger">Hapus</a>
                    </td>
                  </tr>
                @endforeach
                </tbody>
  
          </table>
      </div>

  </div>
</div>



@endsection