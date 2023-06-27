@extends('layouts.dashboard')

@section('title', 'Daftar Pegawai')

@section('page-title', 'Daftar Pegawai')

@section('container')


<div class="row">
  <div class="col-12">

    <a class="btn btn-success" style="width:15%; margin-bottom:1%;" href="/pegawai/tambah">+ Tambah Pegawai</a>

      
    <div class="card">
      <div class="card-body">
          <h5 class="card-title m-b-0">Daftar Pegawai</h5>
      </div>
      <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">No. Telepon</th>
                <th scope="col">E-mail</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
  
            {{-- Valuenya masih contoh --}}
  
            <tbody>
              @foreach ($pegawai as $item)
              <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $item->nama_pegawai }}</td>
                  <td>{{ $item->notelp_pegawai }}</td>
                  <td>{{ $item->email_pegawai }}</td>
                  <td>
                    {{-- EDIT PEGAWAI --}}
                    <a href="pegawai/edit/{{ $item->id_pegawai }}" class="btn btn-warning">Edit</a>
                    {{-- HAPUS PEGAWAI --}}
                    <a href="pegawai/delete/{{ $item->id_pegawai }}" class="btn btn-danger">Hapus</a>
                  </td>
              </tr>
              @endforeach

            </tbody>
      </table>
  </div> 

  </div>
</div>


@endsection