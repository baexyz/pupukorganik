@extends('layouts.index')

@section('title', 'Home')

@section('main')



    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b class="logo-icon p-l-10">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="/dashboard/assets/images/logodashboard.png" style="width: 150px; margin-top:10px" alt="homepage" class="light-logo" />
                           
                        </b>
                        <!--End Logo icon -->
                         <!-- Logo text -->
                        {{-- <span class="logo-text">
                             <!-- dark Logo text -->
                             <img src="assets/images/logo-text.png" alt="homepage" class="light-logo" /> --}}
                            
                        </span>
                        <!-- Logo icon -->
                        <!-- <b class="logo-icon"> -->
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <!-- <img src="assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->
                            
                        <!-- </b> -->
                        <!--End Logo icon -->
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                        <!-- ============================================================== -->
                        <!-- create new -->
                        <!-- ============================================================== -->
                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             <span class="d-none d-md-block">Create New <i class="fa fa-angle-down"></i></span>
                             <span class="d-block d-md-none"><i class="fa fa-plus"></i></span>   
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li> --}}
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        {{-- <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="ti-close"></i></a>
                            </form>
                        </li> --}}
                    </ul>
                    @can('Pelanggan')
                    <h3 style="color: #ececec; margin-top: 10px">{{ $user->nama_user }}</h3>
                    @else
                    <h3 style="color: #ececec; margin-top: 10px">{{ $user->nama_pegawai }}</h3>
                    @endcan

                    

                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="/dashboard/assets/images/users.png" alt="user" class="rounded-circle" width="31"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated" >
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->


        <!-- ============================================================== -->
        <!-- SIDEBAR  -->
        <!-- ============================================================== -->

        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
               <div class="scroll-sidebar">
               <!-- Sidebar navigation-->
               <nav class="sidebar-nav">
                   <ul id="sidebarnav" class="p-t-30">
        
                   {{-- admin --}}
                    @can('Manager')
                       <li class="sidebar-item"> 
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="produk" aria-expanded="false"><i class="fas fa-seedling" style="margin-right:10px"></i><span class="hide-menu">Daftar Produk</span></a>
                       </li>
        
                       <li class="sidebar-item"> 
                           <a class="sidebar-link waves-effect waves-dark sidebar-link" href="pegawai" aria-expanded="false"><i class="fas fa-address-card" style="margin-right:10px"></i><span class="hide-menu">Daftar Pegawai</span></a>
                       </li>
        
                       <li class="sidebar-item"> 
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="pelanggan" aria-expanded="false"><i class="fas fa-users" style="margin-right:10px"></i><span class="hide-menu">Daftar Pelanggan</span></a>
                       </li>
        
                       <li class="sidebar-item"> 
                           <a class="sidebar-link waves-effect waves-dark sidebar-link" href="pemesanan" aria-expanded="false"><i class="fas fa-shopping-basket" style="margin-right:10px"></i><span class="hide-menu">Daftar Order</span></a>
                       </li>
        
                       {{-- <li class="sidebar-item"> 
                           <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.html" aria-expanded="false"><i class="far fa-money-bill-alt" style="margin-right:10px"></i><span class="hide-menu">Daftar Pembayaran</span></a>
                       </li> --}}
        
                       <li class="sidebar-item"> 
                           <a class="sidebar-link waves-effect waves-dark sidebar-link" href="riwayat-penjualan" aria-expanded="false"><i class=" fas fa-history" style="margin-right:10px"></i><span class="hide-menu">Riwayat Penjualan</span></a>
                       </li>
                    @endcan
        
                   {{-- Pegawai --}}
                    @cannot('Pelanggan')
                       <li class="sidebar-item"> 
                           <a class="sidebar-link waves-effect waves-dark sidebar-link" href="daftar-pengambilan" aria-expanded="false"><i class="fas fa-truck" style="margin-right:10px"></i><span class="hide-menu">Daftar Pengambilan</span></a>
                       </li>
        
                       <li class="sidebar-item"> 
                           <a class="sidebar-link waves-effect waves-dark sidebar-link" href="daftar-surat" aria-expanded="false"><i class="fas fa-paperclip" style="margin-right:10px"></i><span class="hide-menu">Daftar Surat Jalan</span></a>
                       </li>
                    @endcannot
        
                   {{-- Pelanggan --}}
                    @can('Pelanggan')
                       <li class="sidebar-item"> 
                           <a class="sidebar-link waves-effect waves-dark sidebar-link" href="produk" aria-expanded="false"><i class="fas fa-seedling" style="margin-right:10px"></i><span class="hide-menu">Produk</span></a>
                       </li>
        
                       <li class="sidebar-item"> 
                           <a class="sidebar-link waves-effect waves-dark sidebar-link" href="keranjang" aria-expanded="false"><i class="fas fa-shopping-cart" style="margin-right:10px"></i><span class="hide-menu">Keranjang</span></a>
                       </li>
        
                       <li class="sidebar-item"> 
                           <a class="sidebar-link waves-effect waves-dark sidebar-link" href="bayar" aria-expanded="false"><i class="far fa-credit-card" style="margin-right:10px"></i><span class="hide-menu">Pembayaran</span></a>
                       </li>
        
                       <li class="sidebar-item"> 
                           <a class="sidebar-link waves-effect waves-dark sidebar-link" href="pengambilan" aria-expanded="false"><i class="fas fa-truck-loading" style="margin-right:10px"></i><span class="hide-menu">Pengambilan</span></a>
                       </li>
                       
                       <li class="sidebar-item"> 
                           <a class="sidebar-link waves-effect waves-dark sidebar-link" href="riwayat-pemesanan" aria-expanded="false"><i class="fas fa-history" style="margin-right:10px"></i><span class="hide-menu">Riwayat Pemesanan</span></a>
                       </li>
        
                       {{-- DROPDOWN (JIKA DIPAKAI) --}}
                       {{-- <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Forms </span></a>
                           <ul aria-expanded="false" class="collapse  first-level">
                           
                               <li class="sidebar-item"><a href="form-basic.html" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Form Basic </span></a></li>
                               <li class="sidebar-item"><a href="form-wizard.html" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Form Wizard </span></a></li>
        
                           </ul>
                       </li> --}}
                    @endcan
               </ul>
           </nav>
           <!-- End Sidebar navigation -->
        </div>
        
        <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h2 class="page-title">@yield('page-title')</h2>
                    </div>
                </div>
            </div>
            
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->




            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            
            <div class="container-fluid">


                @yield('container')
                
                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                Copyrights By <a href="PTNongguanBiotekIndonesia.com" style="color: rgb(76, 160, 83)"> <b> PT Nongguan Biotek Indonesia.com </b> </a>
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->

@endsection

