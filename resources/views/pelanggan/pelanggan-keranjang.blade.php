@extends('layouts.dashboard')

@section('title', 'Keranjang')

@section('page-title', 'Keranjang')

@section('container')

<div class="row">
    <div class="col-12">
        <a class="btn btn-success" style="width:15%; margin-bottom:1%;" href="/keranjang/tambah">+ Tambah Produk</a>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title m-b-0">Keranjang</h5>
            </div>
                <div class="table-responsive">
                    <table class="table">
                        
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Produk Pesanan</th>
                                <th scope="col">Kuantitas</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Hapus</th>
                            </tr>
                        </thead>

                        <tbody class="customtable">
                            <tr>
                                <td>Pupuk Lumba-Lumba Kemasan 5Kg</td>
                                <td>
                                    <input type="number" style="width: 50px" id="fname" placeholder="" readonly>
                                    <button type="button" class="btn btn-success btn-sm">+</button>
                                    <button type="button" class="btn btn-danger btn-sm">-</button>
                                </td>
                                <td>25000</td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm">Hapus</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Pupuk Lumba-Lumba Kemasan 10Kg</td>
                                <td>
                                    <input type="number" style="width: 50px" id="fname" placeholder="" readonly>
                                    <button type="button" class="btn btn-success btn-sm">+</button>
                                    <button type="button" class="btn btn-danger btn-sm">-</button>
                                </td>
                                <td>45000</td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm">Hapus</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Pupuk Lumba-Lumba Kemasan 25Kg</td>
                                <td>
                                    <input type="number" style="width: 50px" id="fname" placeholder="" readonly>
                                    <button type="button" class="btn btn-success btn-sm">+</button>
                                    <button type="button" class="btn btn-danger btn-sm">-</button>
                                </td>
                                <td>105000</td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm">Hapus</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <button type="button" class="btn btn-warning btn-lg">CHECKOUT</button>
        </div>
    </div>
</div>
    
@endsection