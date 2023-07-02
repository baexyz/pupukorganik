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
                                @foreach ($item->produk as $produk)
                                <tr>
                                    @if ($loop->first)
                                    <td rowspan="{{ $loop->count }}" style="vertical-align: middle" class="text-center">{{ $loop->parent->iteration }}</td>
                                    <td rowspan="{{ $loop->count }}" style="vertical-align: middle" class="text-center">{{ $item->id_keranjang }}</td>
                                    @endif
                                    <td style="vertical-align: middle">{{ $produk->nama_produk }}</td>
                                    <td style="vertical-align: middle">{{ $produk->kuantitas }}</td>
                                    @if ($loop->first)
                                    <td rowspan="{{ $loop->count }}" style="vertical-align: middle">Rp{{ number_format($item->total, 0, ',', '.') }}</td>
                                    <td rowspan="{{ $loop->count }}" style="vertical-align: middle">
                                    {{-- @if ($item->status_pembayaran == 0)
                                        <button type="button" class="btn btn-danger btn-lg">Belum Lunas</button>
                                    @else 
                                        <button type="button" class="btn btn-success btn-lg">Lunas</button>
                                    @endif --}}
                                    @if ($item->status_pembayaran == 'PENDING')
                                        <button type="button" class="btn btn-warning btn-lg">Belum Lunas</button>
                                        {{-- Link pembayaran --}}
                                        <a href="{{ $item->invoice_url }}" target="_blank" class="btn btn-primary btn-lg">Bayar</a>
                                    @elseif ($item->status_pembayaran == 'PAID')
                                        <button type="button" class="btn btn-success btn-lg">Lunas</button>
                                    @elseif ($item->status_pembayaran == 'EXPIRED')
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