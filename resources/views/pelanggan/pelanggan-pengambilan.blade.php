@extends('layouts.dashboard')

@section('title', 'Pengambilan')

@section('page-title', 'Pengambilan')

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
                                <th>Waktu Penerimaan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengambilan as $item)
                                @php
                                    $iter = $loop->iteration;
                                    $waktu = $item->waktu_penerimaan;
                                    $status = $item->status;
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
                                    <td rowspan="{{ $loop->count }}" style="vertical-align: middle" class="text-center">{{ $waktu }}</td>
                                    <td rowspan="{{ $loop->count }}" style="vertical-align: middle" class="text-center">
                                        @if ($status == 0)
                                        {{-- JIKA BELUM DIAMBIL --}}
                                        <button type="button" class="btn btn-warning btn-lg">Belum Diambil</button>
                                        @elseif ($status == 1)
                                        {{-- JIKA SUDAH DIAMBIL --}}
                                        <button type="button" class="btn btn-success btn-lg">Sudah Diambil</button>
                                        @endif
                                    </td>
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