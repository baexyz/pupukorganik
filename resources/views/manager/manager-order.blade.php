@extends('layouts.dashboard')

@section('title', 'Daftar Order')

@section('page-title', 'Daftar Order')

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
                                <th>Nama Pelanggan</th>
                                <th>Perusahaan</th>
                                <th>Pesanan</th>
                                <th>Jumlah</th>
                                <th>Total Harga</th>
                                <th>Waktu Pemesanan</th>
                                <th>Status Pembayaran</th>
                            </tr>
                        </thead>
        
        
                        {{-- Valuenya masih contoh --}}
        
        
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
                                <td rowspan="{{ $loop->count }}" style="vertical-align: middle" class="text-center">Rp{{ number_format($item->total_harga, 0, ',', '.') }}</td>
                                <td rowspan="{{ $loop->count }}" style="vertical-align: middle" class="text-center">{{ $item->waktu_pemesanan }}</td>
                                <td rowspan="{{ $loop->count }}" style="vertical-align: middle" class="text-center">
                                    @if ($item->status == 'PENDING')
                                        <button type="button" class="btn btn-warning btn-lg">Belum Lunas</button>
                                    @elseif ($item->status == 'PAID')
                                        <button type="button" class="btn btn-success btn-lg">Lunas</button>
                                    @elseif ($item->status == 'EXPIRED')
                                        <button type="button" class="btn btn-danger btn-lg">Expired</button>
                                    @endif
                                </td>
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