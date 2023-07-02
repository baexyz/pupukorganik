@extends('layouts.dashboard')

@section('title', 'Riwayat Pemesanan')

@section('page-title', 'Riwayat Pemesanan')

@section('container')

<div class="row">
    <div class="col-12">
        
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Riwayat Pemesanan</h5>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">ID Pemesanan</th>
                                <th class="text-center">Produk</th>
                                <th class="text-center">Kuantitas</th>
                                <th class="text-center">Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pemesanan as $item)
                                @php
                                    $iter = $loop->iteration;
                                @endphp
                                @foreach ($item->produk as $produk)
                                <tr>
                                    @if ($loop->first)
                                    <td rowspan="{{ $loop->count }}" style="vertical-align: middle" class="text-center">{{ $iter }}</td>
                                    <td rowspan="{{ $loop->count }}" style="vertical-align: middle" class="text-center">{{ $item->id_keranjang }}</td>
                                    @endif
                                    <td style="vertical-align: middle">{{ $produk->nama_produk }}</td>
                                    <td style="vertical-align: middle" class="text-center">{{ $produk->kuantitas }}</td>
                                    @if ($loop->first)
                                    <td rowspan="{{ $loop->count }}" style="vertical-align: middle" class="text-center">Rp{{ number_format($item->total, 0, ',', '.') }}</td>
                                    @endif  
                                </tr>
                                @endforeach
                            @endforeach
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection