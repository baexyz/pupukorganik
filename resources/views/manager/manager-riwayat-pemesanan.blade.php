@extends('layouts.dashboard')

@section('title', 'Riwayat Penjualan')

@section('page-title', 'Riwayat Penjualan')

@section('container')

<div class="row">
    <div class="col-12">
        
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Riwayat Penjualan</h5>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
          
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>ID Pemesanan</th>
                                <th>Nama</th>
                                <th>Perusahaan</th>
                                <th>Pesanan</th>
                                <th>Kuantitas</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
          
                        <tbody>
                        @foreach ($pemesanan as $item)
                            @foreach ($item->produk as $produk)
                            <tr>
                                @if ($loop->first)
                                <td rowspan="{{ $loop->count }}" style="vertical-align: middle" class="text-center">{{ $loop->parent->iteration }}</td>
                                <td rowspan="{{ $loop->count }}" style="vertical-align: middle" class="text-center">{{ $item->id_keranjang }}</td>
                                <td rowspan="{{ $loop->count }}" style="vertical-align: middle" class="text-center">{{ $item->pelanggan->nama_user }}</td>
                                <td rowspan="{{ $loop->count }}" style="vertical-align: middle" class="text-center">{{ $item->pelanggan->perusahaan_user }}</td>
                                @endif
                                <td style="vertical-align: middle">{{ $produk->nama_produk }}</td>
                                <td style="vertical-align: middle">{{ $produk->kuantitas }}</td>
                                @if ($loop->first)
                                <td rowspan="{{ $loop->count }}" style="vertical-align: middle" class="text-center">Rp{{ number_format($item->total, 0, ',', '.') }}</td>
                                @endif
                            </tr>
                            @endforeach
                        @endforeach
                        </tbody>   
                    </table>
                </div>      
            </div>
          </div>
  
    </div>
  </div>


@endsection