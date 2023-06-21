@extends('layouts.dashboard')

@section('container')
    

<div class="row">
    <div class="col-12">
        
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Basic Datatable</h5>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID Pemesanan</th>
                                <th>Nama</th>
                                <th>Perusahaan</th>
                                <th>Pesanan</th>
                                <th>Kuantitas</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">AB3123</th>
                                <td> Rusdi </td>
                                <td>CV Jaya Makmur</td>
                                <td>Pupuk organik Kemasan 5Kg</td>
                                <td>10</td>
                                <td>
                                  {{-- JIKA BELUM INPUT --}}
                                  <button type="button" class="btn btn-warning btn-lg">Input</button>
                                  {{-- JIKA SUDAH INPUT --}}
                                  <button type="button" class="btn btn-success btn-lg">Sudah Diinput</button>
                                </td>
                              </tr>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection