@extends('layouts.dashboard')

@section('title', 'Input Surat Jalan')

@section('page-title', 'Input Surat Jalan')

@section('container')

<div class="row">
    <div class="col-md-6">
        <div class="card" style="width: 150%; margin-left:30%; margin-right:10%">
            <form class="form-horizontal" action="input-surat" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <h4 class="card-title" style="text-align: center; margin-bottom:5%">INPUT SURAT JALAN</h4>
                    <input type="hidden" name="id_pengambilan" value="{{ $id_pengambilan }}">
                    {{-- INPUT NOMER SURAT JALAN --}}
                    <div class="form-group row">
                        <label for="fname" class="col-md-3">No. Surat Jalan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="fname" name="no_suratjalan" placeholder="Input Nomer Surat Jalan">
                        </div>
                    </div>
                    {{-- INPUT NAMA PENERIMA --}}
                    <div class="form-group row">
                        <label for="lname" class="col-md-3">Nama Penerima</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="lname" name="nama_penerima_suratjalan" placeholder="Input Nama Penerima Barang">
                        </div>
                    </div>
                    {{-- INPUT NOMER TELEPON PENERIMA --}}
                    <div class="form-group row">
                        <label for="lname" class="col-md-3">No. Telepon Penerima</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="lname" name="notelp_penerima_suratjalan" placeholder="Input Nomer Telepon Penerima">
                        </div>
                    </div>
                    {{-- INPUT WAKTU PENERIMAAN --}}
                    <div class="form-group row">
                        <label class="col-md-3">Waktu Penerimaan</label>
                        <div class="col-sm-9">
                            <input type="datetime-local" id="waktupenerimaan" name="waktu_penerimaan_suratjalan">
                        </div>
                    </div>
                    {{-- INPUT TIPE KENDARAAN PENERIMA --}}
                    <div class="form-group row">
                        <label for="lname" class="col-md-3">Tipe Kendaraan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="lname" name="tipe_kendaraan_suratjalan" placeholder="Input Tipe Kendaraan Penerima">
                        </div>
                    </div>
                    {{-- INPUT NOMER PLAT KENDARAAN PENERIMA --}}
                    <div class="form-group row">
                        <label for="lname" class="col-md-3">No. Plat Kendaraan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="lname" name="noplat_suratjalan" placeholder="Input Nomer Plat Kendaraan Penerima">
                        </div>
                    </div>
                    {{-- UPLOAD GAMBAR BUKTI SURAT JALAN --}}
                    <div class="form-group row">
                        <label class="col-md-3">Upload Bukti Surat Jalan</label>
                        <div class="col-md-9">
                            <input type="file" name="bukti_suratjalan">
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