@extends('layouts.dashboard')

@section('title', 'Daftar Pengambilan')

@section('page-title', 'Daftar Pengambilan')

@section('container')
    
<div class="row">
    <div class="col-12">
        
        <div class="card">
            <div class="card-body">
                <h5 class="card-title" style="margin-bottom: 3%">Daftar Pengambilan</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Pemesanan</th>
                                <th>Nama</th>
                                <th>Perusahaan</th>
                                <th>Produk Pesanan</th>
                                <th>Kuantitas</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengambilan as $item)
                                @foreach ($item->produk as $produk)
                                <tr>
                                    @if ($loop->first)
                                    <td rowspan="{{ $loop->count }}" style="vertical-align: middle" class="text-center">{{ $loop->parent->iteration }}</td>
                                    <td rowspan="{{ $loop->count }}" style="vertical-align: middle" class="text-center">{{ $item->id_keranjang }}</td>
                                    <td rowspan="{{ $loop->count }}" style="vertical-align: middle" class="text-center">{{ $item->pelanggan->nama_user }}</td>
                                    <td rowspan="{{ $loop->count }}" style="vertical-align: middle" class="text-center">{{ $item->pelanggan->perusahaan_user }}</td>
                                    @endif
                                    <td style="vertical-align: middle">{{ $produk->nama_produk }}</td>
                                    <td style="vertical-align: middle">{{ $produk->kuantitas }}</td>
                                    @if ($loop->first)
                                    <td rowspan="{{ $loop->count }}" style="vertical-align: middle" class="text-center">
                                        @if ($item->status == 0)
                                        {{-- JIKA BELUM INPUT --}}
                                        <button type="button" onclick="inputsurat({{ $item->id_pengambilan }})" class="btn btn-warning btn-lg">Input</button>
                                        @elseif ($item->status == 1)
                                        {{-- JIKA SUDAH INPUT --}}
                                        <button type="button" class="btn btn-success btn-lg">Sudah Diinput</button>
                                        @endif
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                <form id="form1" style="display: none" action="form-surat" method="POST">
                    @csrf                    
                    <input type="text" id="abc" name="id_pengambilan">
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function inputsurat(value) {
      // Implement your logic here to send the updated input data to the server
        document.getElementById("abc").value = value;
        var form = document.getElementById("form1");
        form.submit();
    }
</script>


@endsection