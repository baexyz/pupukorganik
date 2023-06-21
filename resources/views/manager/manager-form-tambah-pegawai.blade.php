@extends('layouts.dashboard')


@section('container')

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <form class="form-horizontal">
                <div class="card-body">
                    <h4 class="card-title">Input Tambah Pegawai</h4>


                    {{-- INPUT NAMA PEGAWAI --}}
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nama Pegawai</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="fname" placeholder="Input Nama Pegawai>
                        </div>
                    </div>


                    {{-- INPUT TELEPON PEGAWAI --}}
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">No Telepon Pegawai</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="lname" placeholder="No Telepon Pegawai">
                        </div>
                    </div>


                    {{-- INPUT EMAIL PEGAWAI --}}
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Email Pegawai</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="lname" placeholder="Input Email Pegawai">
                        </div>
                    </div>


                    {{-- INPUT PASSWORD PEGAWAI --}}
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="lname" placeholder="Input Password Pegawai">
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