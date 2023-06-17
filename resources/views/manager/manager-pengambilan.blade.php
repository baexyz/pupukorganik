@extends('layouts.dashboard')

@section('container')


<div class="row">
  <div class="col-12">
      
    <div class="card">
      <div class="card-body">
          <h5 class="card-title">Daftar Pengambilan</h5>
          <div class="table-responsive">
              <table id="zero_config" class="table table-striped table-bordered">
    
                  <thead>
                      <tr>
                          <th>ID Pemesanan</th>
                          <th>Nama</th>
                          <th>Pesanan</th>
                          <th>Kuantitas</th>
                          <th>Total Harga</th>
                          <th>Status</th>
                      </tr>
                  </thead>
    
                  <tbody>
                      <tr>
                        <th scope="row">AB3123</th>
                        <td> Rusdi </td>
                        <td>Pupuk organik Kemasan 5Kg</td>
                        <td>10</td>
                        <td>450000</td>
                        <td>
                          {{-- JIKA PENGAMBILAN BELUM DIKONFIRMASI --}}
                          <button type="button" class="btn btn-danger btn-lg">Belum Diambil</button>
                          {{-- JIKA PENGAMBILAN SUDAH DIKONFIRMASI --}}
                          <button type="button" class="btn btn-success btn-lg">Sudah Diambil</button>
                        </td>
                      </tr> 
                  </tbody>                                
              </table>
          </div>      
      </div>
    </div>

  </div>
</div>


@endsection