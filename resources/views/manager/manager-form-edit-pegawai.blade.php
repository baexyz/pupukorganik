@extends('layouts.dashboard')

@section('title', 'Edit Pegawai')

@section('page-title', 'Edit Pegawai')

@section('container')

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <form class="form-horizontal" method="POST" action="{{ $pegawai->id_pegawai }}">
            @csrf
                <div class="card-body">
                    <h4 class="card-title">Edit Pegawai</h4>

                    {{-- EDIT NAMA PEGAWAI --}}
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nama Pegawai</label>
                        <div class="col-sm-9">
                            <input type="text" name="nama_pegawai" class="form-control" id="fname" value="{{ $pegawai->nama_pegawai }}">
                        </div>
                    </div>

                    {{-- EDIT TELEPON PEGAWAI --}}
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">No Telepon Pegawai</label>
                        <div class="col-sm-9">
                            <input type="text" name="notelp_pegawai" class="form-control" id="lname" value="{{ $pegawai->notelp_pegawai }}">
                        </div>
                    </div>

                    {{-- EDIT EMAIL PEGAWAI --}}
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Email Pegawai</label>
                        <div class="col-sm-9">
                            <input type="text" name="email_pegawai" class="form-control" id="lname" value="{{ $pegawai->email_pegawai }}">
                        </div>
                    </div>

                    {{-- EDIT PASSWORD PEGAWAI --}}
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="text" name="password_pegawai" class="form-control" id="lname" placeholder="Edit Password Pegawai">
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