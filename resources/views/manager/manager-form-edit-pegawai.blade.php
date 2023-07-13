@extends('layouts.dashboard')

@section('title', 'Edit Pegawai')

@section('page-title', 'Edit Pegawai')

@section('container')

<div class="row" style="margin-top: 3%">
    <div class="col-md-6">
        <div class="card" style="width: 150%; margin-left:30%; margin-right:10%">
            <form class="form-horizontal" method="POST" action="{{ $pegawai->id_pegawai }}">
            @csrf
                <div class="card-body">
                    <h4 class="card-title" style="text-align: center; margin-bottom:5%">FORM EDIT PEGAWAI</h4>

                    {{-- EDIT NAMA PEGAWAI --}}
                    <div class="form-group row">
                        <label for="fname" class="col-md-3"">Nama Pegawai</label>
                        <div class="col-sm-9">
                            <input type="text" name="nama_pegawai" class="form-control" id="fname" value="{{ $pegawai->nama_pegawai }}">
                        </div>
                    </div>

                    {{-- EDIT TELEPON PEGAWAI --}}
                    <div class="form-group row">
                        <label for="lname" class="col-md-3"">No Telepon Pegawai</label>
                        <div class="col-sm-9">
                            <input type="text" name="notelp_pegawai" class="form-control" id="lname" value="{{ $pegawai->notelp_pegawai }}">
                        </div>
                    </div>

                    {{-- EDIT EMAIL PEGAWAI --}}
                    <div class="form-group row">
                        <label for="lname" class="col-md-3"">Email Pegawai</label>
                        <div class="col-sm-9">
                            <input type="text" name="email_pegawai" class="form-control" id="lname" value="{{ $pegawai->email_pegawai }}">
                        </div>
                    </div>

                    {{-- EDIT PASSWORD PEGAWAI --}}
                    <div class="form-group row">
                        <label for="lname" class="col-md-3"">Password</label>
                        <div class="col-sm-9">
                            <input type="text" name="password_pegawai" class="form-control" id="lname" placeholder="Edit Password Pegawai">
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