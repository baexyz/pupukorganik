@extends('layouts.dashboard')


@section('container')

<div class="row">
    <div class="col-12">
        
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Daftar Pengambilan Pesanan</h5>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Pemesanan</th>
                                <th>Produk</th>
                                <th>Kuantitas</th>
                                <th>Nama Pemesan</th>
                                <th>Perusahaan</th>
                                <th>Waktu Penerimaan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>AB4123</td>
                                <td>Pupuk Lumba-Lumba Kemasan 5Kg</td>
                                <td>10</td>
                                <td>Rp450000</td>
                                <td>Anton Wicaksono</td>
                                <td>CV Jaya Makmur</td>
                                <td> 13/02/2023 (11:20:49)</td>
                                <td>
                                    {{-- JIKA BELUM DIAMBIL --}}
                                    <button type="button" class="btn btn-warning btn-lg">Belum Diambil</button>
                                    {{-- JIKA SUDAH DIAMBIL --}}
                                    <button type="button" class="btn btn-success btn-lg">Sudah Diambil</button>
                                </td>  
                            </tr>

                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection