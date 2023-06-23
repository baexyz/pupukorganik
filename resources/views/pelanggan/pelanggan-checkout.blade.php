@extends('layouts.dashboard')


@section('pagetitle')
<div class="page-breadcrumb">
  <div class="row">
      <div class="col-12 d-flex no-block align-items-center">
          <h2 class="page-title">CheckOut</h2>
      </div>
  </div>
</div>
@endsection


@section('container')


<div class="row">
    <div class="col-md-12">
        <div class="card card-body printableArea">
            <h3><b>CheckOut</b> <span class="pull-right"></span></h3>
            <hr>
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
                                <tr>
                                    <td class="text-center">Rusdi</td>
                                    <td class="text-center">CV Ngawi</td>
                                    <td>Pupuk Lumba-Lumba Kemasaan 5Kg</td>
                                    <td class="text-right">10</td>
                                    <td class="text-right"> Rp45000 </td>
                                    <td class="text-right"> Rp450000 </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="pull-right m-t-30 text-right">
                        <hr>
                        <h3><b>Total :</b> $13,986</h3>
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