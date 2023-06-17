@extends('layouts.dashboard')

@section('container')


<div class="row">
  <div class="col-12">
      
    <div class="col-12">
      <div class="card">
          <div class="card-body">
            <h5 class="card-title m-b-0">Daftar Produk</h5>
          </div>
  
        
          <table class="table">
  
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Berat</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Deskripsi</th>
                  </tr>
                </thead>
  
                
               {{-- Valuenya masih contoh --}}
  
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td> <img src="" alt=""> </td>
                    <td>Pupuk organik Kemasan 5Kg</td>
                    <td>5.00 Kg</td>
                    <td>Rp.45000</td>
                    <td>Deskripsi</td>
                  </tr>
                </tbody>
  
          </table>
      </div>
  </div>

  </div>
</div>



@endsection