@extends('layouts.dashboard')

@section('container')


<div class="row">
  <div class="col-12">

    <button type="button" class="btn btn-success">+ Tambah Pegawai</button>
      
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
              <tr>
                  <th scope="row">1</th>
                  <td>Rusdy</td>
                  <td>0869696969</td>
                  <td>@rusdi@homok.com</td>
                  <td>
                    {{-- EDIT PEGAWAI --}}
                    <button type="button" class="btn btn-warning">Edit</button>
                    {{-- HAPUS PEGAWAI --}}
                    <button type="button" class="btn btn-danger">Hapus</button>
                  </td>
                </tr>
            </tbody>
      </table>
  </div> 

  </div>
</div>


@endsection