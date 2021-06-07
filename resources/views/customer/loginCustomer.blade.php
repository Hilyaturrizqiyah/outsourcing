<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="img/logo/logo.png" rel="icon">
    <title>Login</title>
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
                                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                    </div>
                                    @if(\Session::has('alert'))
                                    <div class="alert alert-danger mb-3" align="center"
                                        style="background-color: red; color:white; ">
                                        <div>{{Session::get('alert')}}</div>
                                    </div>
                                    @endif
                                    @if(\Session::has('alert-success'))
                                    <div class="alert alert-success" align="center"
                                        style="background-color: green; color:white; ">
                                        <div>{{Session::get('alert-success')}}</div>
                                    </div>
                                    @endif
                                    <form action="{{ url('/customer/loginCustomerPost') }}" method="post" class="user">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" id="exampleInputEmail"
                                                aria-describedby="emailHelp" placeholder="Email Address">
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
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-block">Login</button>
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
                                        <p>Tidak punya akun? Daftar sebagai</p>
                                        <a class="font-weight-bold" href="{{url('/outsourcing/register')}}">Penyedia
                                            Jasa</a> |
                                        <a class="font-weight-bold" href="{{url('/customer/register')}}">Pengguna
                                            Jasa</a>
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
