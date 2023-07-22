<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="dashboard/assets/images/favicon.png">
    <title>register</title>
    <!-- Custom CSS -->
    <link href="dashboard/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="main-wrapper">
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
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
            <div class="auth-box bg-dark border-top border-secondary">
                <div>
                    <div class="text-center p-t-20 p-b-20">
                        <span class="db"><img src="dashboard/assets/images/logo.png" style="width: 200px" alt="logo" /></span>
                    </div>
                    <!-- Form -->
                    <form class="form-horizontal m-t-20" action="/register" method="POST">
                        @csrf
                        <div class="row p-b-30">
                            <div class="col-12">
                                {{-- @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                 @endif --}}

                                {{-- INPUT USERNAME --}}
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white" id="basic-addon1">
                                            <i class="ti-user" style="width:30px"></i>
                                        </span>
                                    </div>
                                    <input type="text" name="nama_user" class="form-control form-control-lg @error('nama_user') is-invalid @enderror" placeholder="Nama Pengguna" aria-label="Username" aria-describedby="basic-addon1" required>
                                    @error('nama_user')
                                    <div class="invalid-feedback">
                                        Harap Input Nama Anda
                                    </div>
                                    @enderror
                                </div>
                                

                                {{-- INPUT PERUSAHAAN --}}
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white" id="basic-addon1">
                                            <i class="fas fa-warehouse" style="width:30px"></i>
                                        </span>
                                    </div>
                                    <input type="text" name="perusahaan_user" class="form-control form-control-lg @error('perusahaan_user') is-invalid @enderror" placeholder="Nama Tempat Usaha" aria-label="Username" aria-describedby="basic-addon1" required>
                                    @error('perusahaan_user')
                                    <div class="invalid-feedback">
                                        Harap Input Nama Perusahaan Anda
                                    </div>
                                    @enderror
                                </div>

                                {{-- INPUT EMAIL --}}
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white" id="basic-addon1">
                                            <i class="ti-email" style="width:30px"></i>
                                        </span>
                                    </div>
                                    <input type="email" name="email_user" class="form-control form-control-lg @error('email_user') is-invalid @enderror" placeholder="Email" aria-label="Username" aria-describedby="basic-addon1" required>
                                    @error('email_user')
                                    <div class="invalid-feedback">
                                        Harap Input Email Anda Sesuai Format
                                    </div>
                                    @enderror
                                </div>


                                {{-- INPUT NoMOR TELEPON --}}
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white" id="basic-addon1">
                                            <i class="fas fa-phone" style="width:30px"></i></span>
                                    </div>
                                    <input type="tel" name="notelp_user" class="form-control form-control-lg @error('notelp_user') is-invalid @enderror" placeholder="Nomor Telepon +62" aria-label="Username" aria-describedby="basic-addon1" required >
                                    @error('notelp_user')
                                        <div class="invalid-feedback">
                                            Harap Input Nomor Telepon Anda dengan Format +62
                                        </div>
                                    @enderror

                                </div>

                                {{-- INPUT ALAMAT --}}
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white" id="basic-addon1">
                                            <i class="fas fa-home" style="width:30px"></i>
                                        </span>
                                    </div>
                                    <input type="text" name="alamat_user" class="form-control form-control-lg  @error('alamat_user') is-invalid @enderror" placeholder="Alamat" aria-label="Username" aria-describedby="basic-addon1" required>
                                    @error('alamat_user')
                                        <div class="invalid-feedback">
                                            Harap Input Alamat Rumah Anda
                                        </div>
                                    @enderror

                                </div>


                                {{-- INPUT PASSWORD --}}
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white" id="basic-addon2">
                                            <i class="fas fa-key" style="width:30px"></i>
                                        </span>
                                    </div>
                                    <input type="password" name="password_user" class="form-control form-control-lg" placeholder="Password Akun" aria-label="Password" aria-describedby="basic-addon1" required>
                                </div>
                                {{-- <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-info text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg" placeholder=" Confirm Password" aria-label="Password" aria-describedby="basic-addon1" required>
                                </div> --}}
                            </div>
                        </div>  


                        {{-- REGISTER BUTTOn --}}
                        <div class="row border-top border-secondary">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="p-t-20">
                                        <button class="btn btn-block btn-lg btn-info" type="submit" style="color:rgb(255, 255, 255);  background-color:rgb(68, 178, 110)"> 
                                            <h4>REGISTER</h4>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="dashboard/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="dashboard/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="dashboard/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
    </script>
</body>

</html>