@extends('layouts.dashboard')

@section('title', 'Keranjang')

@section('page-title', 'Keranjang')

@section('container')

@php
    $totalharga = 0;
@endphp

<div class="row">
    <div class="col-12">
        <a class="btn btn-success" style="width:15%; margin-left:85%; margin-bottom:1%; " href="produk">+ Tambah Produk</a>
        <div class="card">
                <div class="card-body">
                    <h5 class="card-title m-b-0">Daftar Produk yang Dipesan</h5>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Produk Pesanan</th>
                                <th scope="col">Kuantitas</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Hapus</th>
                            </tr>
                        </thead>

                        <tbody class="customtable">
                            @foreach ($keranjang as $item)
                            <tr>
                                <td>{{ $item->nama_produk }}</td>
                                <td>
                                    <p id="idProduk" style="display: none">{{ $item->id_produk }}</p>
                                    <input type="number" style="width: 50px" class="kuantitas" placeholder="" value="{{ $item->kuantitas }}" readonly>
                                    <a href="keranjang/produk+/{{ $item->id_produk }}" class="btn btn-success btn-sm">+</a>
                                    <a href="keranjang/produk-/{{ $item->id_produk }}" class="btn btn-danger btn-sm">-</a>
                                </td>
                                @php
                                    $harga = $item->harga_produk * $item->kuantitas;
                                    $totalharga += $harga;
                                @endphp
                                <td>Rp{{ number_format($harga, 0, ',', '.') }}</td>
                                <td>
                                    <a href="keranjang/delete/{{ $item->id_produk }}" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                            
                            @endforeach
                        </tbody>
                  
                    </table>
                </div>

                <form id="form1" style="display: none" action="keranjang/edit" method="POST">
                    @csrf                    
                    <input type="number" id="abc" name="kuantitas">
                    <input type="number" id="idp" name="id_produk">
                </form>

                
        </div>

        <h3 style="position: relative; display:inline-block; margin-left:51%;">Total Harga : Rp{{ number_format($totalharga, 0, ',', '.') }}</h3>
        <a href="checkout" class="btn btn-warning btn-lg" style="position: relative; display:inline-block; float: right; width:15%"><b>CHECKOUT</b></a>
        
    </div>
</div>


<script>
    var inputs = document.getElementsByClassName("kuantitas");

    for (var i = 0; i < inputs.length; i++) {
        var input = inputs[i];
        var isModified = false;
        var initialValue = input.value;

        input.addEventListener("click", function() {
            this.readOnly = false;
            this.focus();
        });

        input.addEventListener("input", function() {
            isModified = (this.value !== initialValue);
        });

        input.addEventListener("blur", function() {
            if (isModified) {
                var idProduk = this.parentNode.querySelector("#idProduk").textContent;
                // Make the API call with the updated data using idProduk and this.value
                updateInputData(idProduk, this.value);
            }

            this.readOnly = true;
            isModified = false;
        });

        input.addEventListener("keyup", function(event) {
            if (event.key === "Escape") {
                if (isModified) {
                    // Update the input data to the server
                    var idProduk = this.parentNode.querySelector("#idProduk").textContent;
                    updateInputData(idProduk, this.value);
                }
                this.readOnly = true;
                isModified = false;
            }
        });
    }

    function updateInputData(idProduk, value) {
      // Implement your logic here to send the updated input data to the server
        document.getElementById("abc").value = value;
        document.getElementById("idp").value = idProduk;
        var form = document.getElementById("form1");
        form.submit();
    }
  </script>
    
@endsection