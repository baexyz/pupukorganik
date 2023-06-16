@extends('layouts.dashboard')

@section('container')

<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title m-b-0">Daftar Pengambilan</h5>
        </div>
        <table class="table">
            
              <thead>
                <tr>
                  <th scope="col">ID Pemesanan</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Pesanan</th>
                  <th scope="col">Kuantitas</th>
                  <th scope="col">Total Harga</th>
                  <th scope="col">Waktu Pembayaran</th>
                  <th scope="col">Waktu Pengambilan</th>
                </tr>
              </thead>

            
                {{-- Valuenya masih contoh --}}


              <tbody>
                <tr>
                  <th scope="row">AB3123</th>
                  <td> Rusdi </td>
                  <td>Pupuk organik Kemasan 5Kg</td>
                  <td>10</td>
                  <td>450000</td>
                  <td> 10/04/2023 03:45:23 </td>
                  <td> 14/04/2023 13:45:23 </td>
                </tr>
              </tbody>
              
        </table>
    </div>
  </div>
</div>

@endsection