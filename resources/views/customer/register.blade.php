{{-- <!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="icon" href="{{asset('assets/img/logo1.png')}}">
<!-- <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">-->
<link rel="stylesheet" href="{{asset('style.css')}}">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('pengguna/assets/css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('pengguna/assets/vendors/choices.js/choices.min.css')}}">
<link rel="stylesheet" href="{{ asset('pengguna/assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
<link rel="stylesheet" href="{{ asset('pengguna/assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
<link rel="stylesheet" href="{{ asset('pengguna/assets/css/app.css') }}">
<link rel="shortcut icon" href="{{ asset('pengguna/assets/images/favicon.svg') }}" type="image/x-icon">
<link rel="stylesheet" href="{{url('fontawesome-free/css/all.min.css')}}">


</head>

<body>
    <!-- <nav class="navbar navbar-expand-lg navbar-light">
 <a class="btn_2 d-none d-lg-block" href="{{ url('login') }}">LOGIN</a>
 </nav>-->
    <div id="card">
        <div id="card-content">
            <div id="card-title">
                <img src="{{asset('assets/img/logo2.png')}}" alt="logo" width="200px" height="100px">
                <h2>Login</h2>
            </div>
        </div>
        @if(\Session::has('alert'))
        <div class="alert alert-danger mb-3" align="center" style="background-color: red; color:white; ">
            <div>{{Session::get('alert')}}</div>
        </div>
        @endif
        @if(\Session::has('alert-success'))
        <div class="alert alert-success">
            <div>{{Session::get('alert-success')}}</div>
        </div>
        @endif
        <div class="card-body">
            <form action="{{ url('/customer/loginCustomerPost') }}" method="post" class="form">
                {{ csrf_field() }}

                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Input E-mail">
                    @if ($errors->has('email'))
                    <span style="color: red""><p class=" text-right">* {{ $errors->first('email') }}</p></span>
                    @endif
                    <br>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Input Password">
                        @if ($errors->has('password'))
                        <span style="color: red""><p class=" text-right">* {{ $errors->first('password') }}</p></span>
                        @endif
                        <br>
                        <center>
                            <input class="btn btn-primary" type="submit" name="submit" value="DAFTAR" /><br> <br>
                            <a class="link" href="{{ url('/') }}">Cancel</a>
                        </center>
            </form>
        </div>
    </div>
</body>

</html>

--}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="img/logo/logo.png" rel="icon">
    <title>Register</title>
    <link href="{{asset('assets/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/css/ruang-admin.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-login">
    <!-- Login Content -->
    <div class="container-login">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Register</h1>
                                    </div>
                                    @if(\Session::has('alert'))
                                    <div class="alert alert-danger mb-3" align="center"
                                        style="background-color: red; color:white; ">
                                        <div>{{Session::get('alert')}}</div>
                                    </div>
                                    @endif
                                    @if(\Session::has('alert-success'))
                                    <div class="alert alert-success">
                                        <div>{{Session::get('alert-success')}}</div>
                                    </div>
                                    @endif
                                    <form action="{{ url('/customer/registerCustomerPost') }}" method="post" class="user">
                                        @csrf
                                        <div class="form-group">
                                            <input type="nama_customer" name="nama_customer" class="form-control" id="exampleInputEmail"
                                                aria-describedby="emailHelp" placeholder="Nama Lengkap">
                                            @if ($errors->has('nama_customer'))
                                            <span>
                                                <p class=" text-right">*
                                                    {{ $errors->first('nama_customer') }}</p>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <textarea type="alamat" name="alamat" class="form-control" id="exampleInputEmail"
                                                aria-describedby="emailHelp" placeholder="Alamat"></textarea>
                                            @if ($errors->has('alamat'))
                                            <span>
                                                <p class=" text-right">*
                                                    {{ $errors->first('alamat') }}</p>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <input type="no_telp" name="no_telp" class="form-control" id="exampleInputEmail"
                                                aria-describedby="emailHelp" placeholder="Nomor Telepon">
                                            @if ($errors->has('no_telp'))
                                            <span>
                                                <p class=" text-right">*
                                                    {{ $errors->first('no_telp') }}</p>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" id="exampleInputEmail"
                                                aria-describedby="emailHelp" placeholder="Email">
                                            @if ($errors->has('email'))
                                            <span>
                                                <p class=" text-right">*
                                                    {{ $errors->first('email') }}</p>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control"
                                                id="exampleInputPassword" placeholder="Password">
                                            @if ($errors->has('password'))
                                            <span style="color: red""><p class=" text-right">*
                                                {{ $errors->first('password') }}</p></span>
                                            @endif
                                        </div>
                                        {{-- <div class="form-group">
                                            <input type="password" name="confirmation_password" class="form-control"
                                                id="exampleInputPassword" placeholder="Konfirmasi Password">
                                            @if ($errors->has('password'))
                                            <span style="color: red""><p class=" text-right">*
                                                {{ $errors->first('password') }}</p></span>
                                            @endif
                                        </div> --}}
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-block">Daftar</button>
                                        </div>
                                        {{-- <hr>
                                         <a href="index.html" class="btn btn-google btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a> --}}
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <p>Sudah punya akun?</p>
                                        <a class="font-weight-bold" href="{{url('/customer/loginCustomer')}}">Login</a>
                                    </div>
                                    <div class="text-center">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Content -->
    <script src="{{asset('admin/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <script src="{{asset('admin/js/ruang-admin.min.js')}}"></script>
</body>

</html>
