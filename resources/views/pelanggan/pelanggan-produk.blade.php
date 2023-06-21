@extends('layouts.dashboard')

@section('title', 'Produk')

@section('container')
    
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title m-b-0">Silahkan pilih produk yang akan dipesan</h5>
            </div>
            <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Foto Produk</th>
                      <th scope="col">Produk</th>
                      <th scope="col">Berat</th>
                      <th scope="col">Harga</th>
                      <th scope="col">Pesan</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($produk as $item)
                    <tr>
                      <td>Foto Produk {{ $loop->iteration }}</td>
                      <td>{{ $item->nama_produk }}</td>
                      <td>{{ $item->berat_produk }} Kg</td>
                      <td>{{ $item->harga_produk }}</td>

                      {{-- BUTTON PESAN UNTUK MENAMBAHKAN PRODUK KE DALAM KERANJANG --}}
                      <td> 
                        <button type="button" class="btn btn-success btn-lg">Pesan</button>  
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
            </table>
        </div>
        
    </div>
</div>

@endsection