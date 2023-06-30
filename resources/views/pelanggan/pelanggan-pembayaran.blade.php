@extends('layouts.dashboard')

@section('title', 'Pembayaran')

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
                            @foreach ($pembayaran as $item)
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
                                    <td style="vertical-align: middle">{{ $produk->kuantitas }}</td>
                                    @if ($loop->first)
                                    <td rowspan="{{ $loop->count }}" style="vertical-align: middle">Rp{{ number_format($item->total, 0, ',', '.') }}</td>
                                    <td rowspan="{{ $loop->count }}" style="vertical-align: middle">
                                    @if ($item->status_pembayaran == 0)
                                        <button type="button" class="btn btn-danger btn-lg">Belum Lunas</button>
                                    @else 
                                        <button type="button" class="btn btn-success btn-lg">Lunas</button>
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