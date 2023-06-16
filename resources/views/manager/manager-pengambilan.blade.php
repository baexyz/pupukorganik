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
                  <th scope="col">Status</th>
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


@endsection