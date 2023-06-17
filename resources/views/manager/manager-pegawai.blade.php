@extends('layouts.dashboard')

@section('container')


<div class="row">
  <div class="col-12">
      
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
              </tr>
            </thead>
  
            {{-- Valuenya masih contoh --}}
  
            <tbody>
              <tr>
                  <th scope="row">1</th>
                  <td>Rusdy</td>
                  <td>0869696969</td>
                  <td>@rusdi@homok.com</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Rusdy</td>
                  <td>0869696969</td>
                  <td>@rusdi@homok.com</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Rusdy</td>
                  <td>0869696969</td>
                  <td>@rusdi@homok.com</td>
                </tr>
            </tbody>
      </table>
  </div> 

  </div>
</div>


@endsection