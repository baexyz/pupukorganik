@extends('layouts.dashboard')

@section('container')


<div class="row">
    <div class="col-12">
        
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Riwayat Pemesanan</h5>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
          
                        <thead>
                            <tr>
                                <th>ID Pemesanan</th>
                                <th>Nama</th>
                                <th>Pesanan</th>
                                <th>Kuantitas</th>
                                <th>Total Harga</th>
                                <th>Waktu Pembayaran</th>
                                <th>Waktu Pengambilan</th>
                            </tr>
                        </thead>
          
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
  
    </div>
  </div>


@endsection