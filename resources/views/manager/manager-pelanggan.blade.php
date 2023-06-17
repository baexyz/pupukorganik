@extends('layouts.dashboard')

@section('container')
    

<div class="row">
    <div class="col-12">
        
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Daftar Pelanggan</h5>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
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
        
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>CV Maju Jaya</td>
                                <td>tiger@gmail.com</td>
                                <td>09321312321312</td>
                                <td>jln jalan no 123</td>
                            </tr>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>CV Maju Jaya</td>
                                <td>tiger@gmail.com</td>
                                <td>09321312321312</td>
                                <td>jln jalan no 123</td>
                            </tr>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>CV Maju Jaya</td>
                                <td>tiger@gmail.com</td>
                                <td>09321312321312</td>
                                <td>jln jalan no 123</td>
                            </tr>
        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
  
    </div>
  </div>




@endsection