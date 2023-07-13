@extends('layouts.dashboard')

@section('title', 'Daftar Pelanggan')

@section('page-title', 'Daftar Pelanggan')

@section('container')
    

<div class="row">
    <div class="col-12">
        
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Daftar Pelanggan</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Perusahaan</th>
                                <th>Email</th>
                                <th>No. Telepon</th>
                                <th>Alamat</th>
                            </tr>
                        </thead>
                        {{-- Valuenya masih contoh --}}
                        <tbody>
                            @foreach ($pelanggan as $item)
                            <tr>
                                <td>{{ $item->nama_user }}</td>
                                <td>{{ $item->perusahaan_user }}</td>
                                <td>{{ $item->email_user }}</td>
                                <td>{{ $item->notelp_user }}</td>
                                <td>{{ $item->alamat_user }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
  </div>
@endsection