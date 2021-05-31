<!DOCTYPE html>
<html>
 <head>
  <title>Daftar</title>
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
                        <span style="color: red""><p class="text-right">* {{ $errors->first('email') }}</p></span>
                    @endif
                    <br>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Input Password">
                    @if ($errors->has('password'))
                        <span style="color: red""><p class="text-right">* {{ $errors->first('password') }}</p></span>
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
