@extends('layouts.dashboard')


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

                    <tr>
                      <td>Foto Produk 1</td>
                      <td>Pupuk Lumba-Lumba Kemasan 5Kg</td>
                      <td>5.00 Kg</td>
                      <td>25000</td>

                      {{-- BUTTON PESAN UNTUK MENAMBAHKAN PRODUK KE DALAM KERANJANG --}}
                      <td> 
                        <button type="button" class="btn btn-success btn-lg">Pesan</button>  
                      </td>
                    </tr>

                    <tr>
                      <td>Foto Produk 2</td>
                      <td>Pupuk Lumba-Lumba Kemasan 10Kg</td>
                      <td>10.00 Kg</td>
                      <td>45000</td>

                      {{-- BUTTON PESAN UNTUK MENAMBAHKAN PRODUK KE DALAM KERANJANG --}}
                      <td> 
                        <button type="button" class="btn btn-success btn-lg">Pesan</button>  
                      </td>
                    </tr>

                    <tr>
                        <td>Foto Produk 3</td>
                        <td>Gunung Argopuro Kemasan 25Kg</td>
                        <td>25.00 Kg</td>
                        <td>105000</td>
  
                        {{-- BUTTON PESAN UNTUK MENAMBAHKAN PRODUK KE DALAM KERANJANG --}}
                        <td> 
                          <button type="button" class="btn btn-success btn-lg">Pesan</button>  
                        </td>
                      </tr>
                  </tbody>
            </table>
        </div>
        
    </div>
</div>

@endsection