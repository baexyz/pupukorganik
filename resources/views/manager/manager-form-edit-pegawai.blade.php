@extends('layouts.dashboard')


@section('container')

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <form class="form-horizontal">
                <div class="card-body">
                    <h4 class="card-title">Edit Tambah Pegawai</h4>


                    {{-- EDIT NAMA PEGAWAI --}}
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nama Pegawai</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="fname" value="Edit Nama Pegawai">
                        </div>
                    </div>


                    {{-- EDIT TELEPON PEGAWAI --}}
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">No Telepon Pegawai</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="lname" value="Nomer Telepon Pegawai">
                        </div>
                    </div>


                    {{-- EDIT EMAIL PEGAWAI --}}
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Email Pegawai</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="lname" value="Edit Email Pegawai">
                        </div>
                    </div>


                    {{-- EDIT PASSWORD PEGAWAI --}}
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="lname" placeholder="Edit Password Pegawai">
                        </div>
                    </div>


                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="button" class="btn btn-primary">INPUT</button>
                    </div>
                </div>
            </form>
        </div>

    </div>    
</div>
    
@endsection