@extends('layouts.dashboard')

@section('title', 'Edit Produk')

@section('page-title', 'Edit Produk')

@section('container')

<div class="row" style="margin-top: 3%">
    <div class="col-md-6">
        <div class="card" style="width: 150%; margin-left:30%; margin-right:10%">
            <form class="form-horizontal" action="{{ $produk->id_produk }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <h4 class="card-title" style="text-align: center; margin-bottom:5%">FORM EDIT PRODUK</h4>


                    {{-- EDIT NAMA PRODUK --}}
                    <div class="form-group row">
                        <label for="fname" class="col-md-3"">Nama Produk</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="fname" name="nama_produk" value="{{ $produk->nama_produk }}">
                        </div>
                    </div>


                    {{-- EDIT BERAT PRODUK --}}
                    <div class="form-group row">
                        <label for="lname" class="col-md-3"">Berat Produk (Kg)</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="lname" name="berat_produk" value="{{ $produk->berat_produk }}">
                        </div>
                    </div>


                    {{-- EDIT HARGA PRODUK --}}
                    <div class="form-group row">
                        <label for="lname" class="col-md-3"">Harga (Rp)</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="lname" name="harga_produk" value="{{ $produk->harga_produk }}">
                        </div>
                    </div>


                    {{-- EDIT DESKRIPSI PRODUK --}}
                    <div class="form-group row">
                        <label for="lname" class="col-md-3"">Deskripsi</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="lname" name="deskripsi_produk" value="{{ $produk->deskripsi_produk }}">
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
                        <button type="submit" class="btn btn-success" style="width:100%">INPUT</button>
                    </div>
                </div>
            </form>
        </div>

    </div>    
</div>

@endsection