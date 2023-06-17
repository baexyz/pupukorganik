@extends('layouts.dashboard')

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
                                <th>ID Pemesanan</th>
                                <th>Nama Pelanggan</th>
                                <th>Pesanan</th>
                                <th>Jumlah</th>
                                <th>Total Harga</th>
                                <th>Waktu</th>
                                <th>Status</th>
                            </tr>
                        </thead>
        
        
                        {{-- Valuenya masih contoh --}}
        
        
                        <tbody>
                            
                            <tr>
                                <td>AB3241</td>
                                <td>Rusdi</td>
                                <td>Pupuk Bio Organik Lumba-Luma 5Kg</td>
                                <td>10</td>
                                <td>450000</td>
                                <td>24/12/2023 04:53:31</td>
                                <td>Lunas</td>
                            </tr>
                            <tr>
                                <td>KC4123</td>
                                <td>Rusdi</td>
                                <td>Pupuk Bio Organik Lumba-Luma 5Kg</td>
                                <td>4</td>
                                <td>90000</td>
                                <td>-</td>
                                <td>Belum Lunas</td>
                            </tr>
                            <tr>
                                <td>DS8312</td>
                                <td>Rusdi</td>
                                <td>Pupuk Bio Organik Lumba-Luma 5Kg</td>
                                <td>1</td>
                                <td>45000</td>
                                <td>-</td>
                                <td>Belum Lunas</td>
                            </tr>
        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>



@endsection