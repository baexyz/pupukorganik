@extends('layouts.dashboard')

@section('title', 'Tambah Produk')

@section('page-title', 'Tambah Produk')

@section('container')

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <form class="form-horizontal" action="tambah" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <h4 class="card-title">Input Tambah Produk</h4>


                    {{-- INPUT NAMA PRODUK --}}
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nama Produk</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="fname" name="nama_produk" placeholder="Input Nama Produk">
                        </div>
                    </div>


                    {{-- INPUT BERAT PRODUK --}}
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Berat Produk (Kg)</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="lname" name="berat_produk" placeholder="Input Berat Produk (Kg)">
                        </div>
                    </div>


                    {{-- INPUT HARGA PRODUK --}}
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Harga (Rp)</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="lname" name="harga_produk" placeholder="Input Harga (Rp)">
                        </div>
                    </div>


                    {{-- INPUT DESKRIPSI PRODUK --}}
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Deskripsi</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="lname" name="deskripsi_produk" placeholder="Input Deskripsi Produk">
                        </div>
                    </div>


                    {{-- UPLOAD FOTO PRODUK --}}
                    <div class="form-group row">
                        <label class="col-md-3">Upload Foto Produk</label>
                        <div class="col-md-9">
                            <input type="file" name="foto_produk">
                        </div>
                    </div>

                </div>

                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">INPUT</button>
                    </div>
                </div>
            </form>
        </div>

    </div>    
</div>
    
@endsection