@extends('layouts.dashboard')

@section('title', 'Daftar Surat Jalan')

@section('page-title', 'Daftar Surat Jalan')

@section('container')


<div class="row">
  <div class="col-12">
      
    <div class="card">
      <div class="card-body">
          <h5 class="card-title m-b-0">Daftar Surat Jalan</h5>
      </div>
      <table class="table">
            <thead>
              <tr>
                <th scope="col">ID Pemesanan</th>
                <th scope="col">No. Surat Jalan</th>
                <th scope="col">Nama Penerima</th>
                <th scope="col">No Telepon</th>
                <th scope="col">Waktu Penerimaan</th>
                <th scope="col">Bukti Fisik</th>
              </tr>
            </thead>
  
            {{-- Valuenya masih contoh --}}
  
            <tbody>
              <tr>
                  <td>AB349</td>
                  <td>DN321947971391</td>
                  <td>Anton Wicaksono</td>
                  <td>08123456789</td>
                  <td>24/02/2023 (13:21:49)</td>
                  <td>
                    {{-- HAPUS PEGAWAI --}}
                    <button type="button" class="btn btn-info">Unduh</button>
                  </td>
                </tr>
            </tbody>
      </table>
  </div> 

  </div>
</div>


@endsection