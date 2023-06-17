@extends('layouts.dashboard')


@section('containerr')

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <form class="form-horizontal">
                <div class="card-body">
                    <h4 class="card-title">Input Surat Jalan</h4>


                    {{-- INPUT NOMER SURAT JALAN --}}
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">No. Surat Jalan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="fname" placeholder="Input Nomer Surat Jalan">
                        </div>
                    </div>


                    {{-- INPUT NAMA PENERIMA --}}
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Nama Penerima</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="lname" placeholder="Input Nama Penerima Barang">
                        </div>
                    </div>


                    {{-- INPUT NOMER TELEPON PENERIMA --}}
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">No. Telepon Penerima</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="lname" placeholder="Input Nomer Telepon Penerima">
                        </div>
                    </div>


                    {{-- INPUT WAKTU PENERIMAAN --}}
                    <div class="form-group row">
                        <label class="m-t-15">Waktu Penerimaan</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="datepicker-autoclose" placeholder="mm/dd/yyyy">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>
                    </div>
                    

                    {{-- INPUT TIPE KENDARAAN PENERIMA --}}
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Tipe Kendaraan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="lname" placeholder="Input Tipe Kendaraan Penerima">
                        </div>
                    </div>


                    {{-- INPUT NOMER PLAT KENDARAAN PENERIMA --}}
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">No. Plat Kendaraan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="lname" placeholder="Input Nomer Plat Kendaraan Penerima">
                        </div>
                    </div>


                    {{-- UPLOAD GAMBAR BUKTI SURAT JALAN --}}
                    <div class="form-group row">
                        <label class="col-md-3">Upload Bukti Surat Jalan</label>
                        <div class="col-md-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                                <label class="custom-file-label" for="validatedCustomFile">Pilih Gambar</label>
                                <div class="invalid-feedback">Example invalid custom file feedback</div>
                            </div>
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