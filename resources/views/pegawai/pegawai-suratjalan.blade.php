@extends('layouts.dashboard')

@section('title', 'Daftar Surat Jalan')

@section('page-title', 'Daftar Surat Jalan')

@section('container')

<div class="row">
  <div class="col-12">
      
    <div class="card">
      <div class="card-body">
          <h5 class="card-title m-b-0" style="margin-bottom: 3%">Daftar Surat Jalan</h5>
      </div>
      <table class="table">
            <thead>
              <tr>
                <th scope="col">No. Surat Jalan</th>
                <th scope="col">Nama Penerima</th>
                <th scope="col">No Telepon</th>
                <th scope="col">Waktu Penerimaan</th>
                <th scope="col">Tipe Kendaraan</th>
                <th scope="col">No. Plat Kendaraan</th>
                <th scope="col">Bukti Fisik</th>
              </tr>
            </thead>
  
            {{-- Valuenya masih contoh --}}
  
            <tbody>
              @foreach ($suratjalan as $item)
              <tr>
                <td>{{ $item->no_suratjalan }}</td>
                <td>{{ $item->nama_penerima_suratjalan }}</td>
                <td>{{ $item->notelp_penerima_suratjalan }}</td>
                <td>{{ $item->waktu_penerimaan_suratjalan }}</td>
                <td>{{ $item->tipe_kendaraan_suratjalan }}</td>
                <td>{{ $item->noplat_suratjalan }}</td>
                <td>
                  {{-- HAPUS PEGAWAI --}}
                  <a href="{{ $item->bukti_suratjalan }}" target="_blank" class="btn btn-info">Unduh</a>
                </td>    
              </tr>
              @endforeach
              
            </tbody>
      </table>
  </div> 

  </div>
</div>


@endsection