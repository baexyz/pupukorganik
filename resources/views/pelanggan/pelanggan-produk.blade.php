@extends('layouts.dashboard')

@section('title', 'Produk')

@section('page-title', 'Produk')

@section('container')
    

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title m-b-0" >Silahkan pilih produk yang akan dipesan</h3>
            </div>

            <table class="table">
                  <thead>
                    <tr style="color: rgb(50, 146, 63)">
                      <th scope="col"><h4>Foto Produk</h4></th>
                      <th scope="col"><h4>Produk</h4></th>
                      <th scope="col"><h4>Deskripsi Produk</b></th>
                      <th scope="col"><h4>Berat</h4></th>
                      <th scope="col"><h4>Harga</h4></th>
                      <th scope="col"><h4>Pesan</h4></th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($produk as $item)
                    <tr>
                      <td style="width: 30%">
                        <img src="{{ $item->foto_produk }}" alt="user" style="width: 100%" />
                      </td>
                      <td style="width: 15%">{{ $item->nama_produk }}</td>
                      <td style="width: 20%">{{ $item->deskripsi_produk }}</td>
                      <td style="width: 10%">{{ $item->berat_produk }} Kg</td>
                      <td style="width: 10%">Rp{{ number_format($item->harga_produk, 0, ',', '.') }}</td>
                      
                      <td style="width: 15%"> 
                        {{-- BUTTON PESAN UNTUK MENAMBAHKAN PRODUK KE DALAM KERANJANG --}}
                        <button type="button" class="btn btn-success btn-lg" onclick="func1({{ $item->id_produk }})">Pesan</button>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
            </table>
        </div>
        <form id="form1" style="display: none" action="produk/pesan" method="POST">
          @csrf                    
          <input type="text" id="abc" name="id_produk">
        </form>
    </div>
</div>

<script>
  function func1(id) {
    document.getElementById("abc").value = id;
    document.getElementById("form1").submit();
  }
</script>

@endsection