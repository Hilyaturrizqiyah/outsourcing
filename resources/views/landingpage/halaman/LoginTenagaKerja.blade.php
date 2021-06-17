<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('assets/login/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{asset('assets/login/css/owl.carousel.min.css')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/login/css/bootstrap.min.css')}}">

    <!-- Style -->
    <link rel="stylesheet" href="{{asset('assets/login/css/style.css')}}">

    <title>Outsourcing | Login Tenaga Kerja</title>
  </head>
  <body>



  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="{{asset('assets/login/images/undraw_remotely_2j6y.svg')}}" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            @if(\Session::has('alert-success'))
            <div class="alert alert-success color-success alert-dismissible show fade"><i class="bi bi-check-circle"></i>
                {{Session::get('alert-success')}}
            </div>
            @endif
            @if(\Session::has('alert'))
            <div class="alert alert-danger color-danger alert-dismissible show fade"><i class="bi bi-check-circle"></i>
                {{Session::get('alert')}}
            </div>
            @endif
            <div class="col-md-8">
              <div class="mb-4">
              <h3>Log In Tenaga Kerja</h3>
            </div>
            <form action="{{url('tenagakerja/AksiLoginTenagakerja')}}" method="post">
                {{csrf_field()}}
              <div class="form-group first">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" id="email">

              </div>
              <div class="form-group last mb-4">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password">

              </div>

              <input type="submit" value="Log In" class="btn btn-block btn-primary">

            </form>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>


    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
  </body>
</html>
