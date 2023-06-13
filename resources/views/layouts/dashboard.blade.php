@extends('layouts.index')

@section('title', 'Home')

@section('sidebar')

<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
       <div class="scroll-sidebar">
       <!-- Sidebar navigation-->
       <nav class="sidebar-nav">
           <ul id="sidebarnav" class="p-t-30">

           {{-- admin --}}
               <li class="sidebar-item"> 
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.html" aria-expanded="false"><i class="fas fa-seedling" style="margin-right:10px"></i><span class="hide-menu">Produk</span></a>
               </li>

               <li class="sidebar-item"> 
                   <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.html" aria-expanded="false"><i class="fas fa-address-card" style="margin-right:10px"></i><span class="hide-menu">Daftar Pegawai</span></a>
               </li>

               <li class="sidebar-item"> 
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.html" aria-expanded="false"><i class="fas fa-users" style="margin-right:10px"></i><span class="hide-menu">Daftar Pelanggan</span></a>
               </li>

               <li class="sidebar-item"> 
                   <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.html" aria-expanded="false"><i class="fas fa-shopping-basket" style="margin-right:10px"></i><span class="hide-menu">Daftar Pemesanan</span></a>
               </li>

               <li class="sidebar-item"> 
                   <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.html" aria-expanded="false"><i class="far fa-money-bill-alt" style="margin-right:10px"></i><span class="hide-menu">Daftar Pembayaran</span></a>
               </li>

               <li class="sidebar-item"> 
                   <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.html" aria-expanded="false"><i class=" fas fa-history" style="margin-right:10px"></i><span class="hide-menu">Riwayat Pemesanan</span></a>
               </li>

           {{-- Pegawai --}}
           
               <li class="sidebar-item"> 
                   <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.html" aria-expanded="false"><i class="fas fa-truck" style="margin-right:10px"></i><span class="hide-menu">Input Surat Jalan</span></a>
               </li>

               <li class="sidebar-item"> 
                   <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.html" aria-expanded="false"><i class="fas fa-paperclip" style="margin-right:10px"></i><span class="hide-menu">Riwayat Surat Jalan</span></a>
               </li>

           {{-- Pelanggan --}}

               <li class="sidebar-item"> 
                   <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.html" aria-expanded="false"><i class="fas fa-seedling" style="margin-right:10px"></i><span class="hide-menu">Produk</span></a>
               </li>

               <li class="sidebar-item"> 
                   <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.html" aria-expanded="false"><i class="fas fa-shopping-cart" style="margin-right:10px"></i><span class="hide-menu">Keranjang</span></a>
               </li>

               <li class="sidebar-item"> 
                   <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.html" aria-expanded="false"><i class="far fa-credit-card" style="margin-right:10px"></i><span class="hide-menu">Pembayaran</span></a>
               </li>

               <li class="sidebar-item"> 
                   <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.html" aria-expanded="false"><i class="fas fa-truck-loading" style="margin-right:10px"></i><span class="hide-menu">Pengambilan</span></a>
               </li>
               
               <li class="sidebar-item"> 
                   <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.html" aria-expanded="false"><i class="fas fa-history" style="margin-right:10px"></i><span class="hide-menu">Riwayat Pemesanan</span></a>
               </li>

               {{-- DROPDOWN (JIKA DIPAKAI) --}}
               {{-- <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Forms </span></a>
                   <ul aria-expanded="false" class="collapse  first-level">
                   
                       <li class="sidebar-item"><a href="form-basic.html" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Form Basic </span></a></li>
                       <li class="sidebar-item"><a href="form-wizard.html" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Form Wizard </span></a></li>

                   </ul>
               </li> --}}
       </ul>
   </nav>
   <!-- End Sidebar navigation -->
</div>

<!-- End Sidebar scroll-->
</aside>

@endsection


@section('greeting')
<div class="container-fluid">
    <div class="row">
        {{-- Selamat datang (nama user) --}}
        <h3 style="margin-left: 10px">Selamat datang</h3> <h3 style="color: #53bd33; margin-left: 10px">{{ $user->nama_user }}</h3>
        <br>
        {{-- Logout button --}}
    </div>
@endsection