@extends('layouts.dashboard')

@section('page-title', 'Pembayaran')

@section('container')

<div class="row">
    <div class="col-12">
        
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Daftar Pembayaran</h5>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Pemesanan</th>
                                <th>Produk</th>
                                <th>Kuantitas</th>
                                <th>Total Harga</th>
                                <th>Status Pembayaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>AB4123</td>
                                <td>Pupuk Lumba-Lumba Kemasan 5Kg</td>
                                <td>10</td>
                                <td>Rp450000</td>
                                <td>
                                    {{-- JIKA BELUM BAYAR --}}
                                    <button type="button" class="btn btn-danger btn-lg">Belum Lunas</button>
                                    {{-- JIKA SUDAH BAYAR --}}
                                    <button type="button" class="btn btn-success btn-lg">Lunas</button>
                                </td>  
                            </tr>

                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection