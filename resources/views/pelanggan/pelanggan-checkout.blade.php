@extends('layouts.dashboard')

@section('title', 'Check Out')

@section('page-title', 'Check Out')

@section('container')

@php
    $totalharga = 0;
@endphp

<div class="row">
    <div class="col-md-12">
        <div class="card card-body printableArea">
            <div class="row">
                
                <div clas   s="col-md-12">
                    <div class="table-responsive m-t-40" style="clear: both;">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Perusahaan</th>
                                    <th>Produk Pesanan</th>
                                    <th class="text-right">Kuantitas</th>
                                    <th class="text-right">Harga</th>
                                    <th class="text-right">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($keranjang as $item)
                                <tr>
                                    @if ($loop->first)
                                    <td rowspan="{{ $loop->count }}" style="vertical-align: middle" class="text-center">{{ $user->nama_user }}</td>
                                    <td rowspan="{{ $loop->count }}" style="vertical-align: middle" class="text-center">{{ $user->perusahaan_user }}</td>
                                    @endif                                    
                                    <td>{{ $item->nama_produk }}</td>
                                    <td class="text-right">{{ $item->kuantitas }}</td>
                                    <td class="text-right"> Rp{{ number_format($item->harga_produk, 0, ',', '.') }} </td>
                                    @php
                                        $harga = $item->harga_produk * $item->kuantitas;
                                        $totalharga += $harga;
                                    @endphp
                                    <td class="text-right"> Rp{{ number_format($harga, 0, ',', '.') }} </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="pull-right m-t-30 text-right">
                        <hr>
                        <h3><b>Total :</b> Rp{{ number_format($totalharga, 0, ',', '.') }}</h3>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="text-right">
                        <button class="btn btn-danger" type="submit"> BAYAR </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection