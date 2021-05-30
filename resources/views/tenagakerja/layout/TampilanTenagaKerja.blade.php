<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenaga Kerja</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('pengguna/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('pengguna/assets/vendors/choices.js/choices.min.css')}}">
    <link rel="stylesheet" href="{{ asset('pengguna/assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('pengguna/assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('pengguna/assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('pengguna/assets/vendors/simple-datatables/style.css')}}">
    <link rel="shortcut icon" href="{{ asset('pengguna/assets/images/favicon.svg') }}" type="image/x-icon">
</head>

<body>
    <div id="app">
        <!-- ======= Menu ======= -->
        @include('tenagakerja.layout.MenuTenagaKerja')
        <!-- End Menu -->


        <div id="main" class='layout-navbar'>
            <!-- ======= Header ======= -->
            @include('tenagakerja.layout.HeaderTenagaKerja')
            <!-- End Header -->

            <div id="main-content">

                <!-- ======= Content ======= -->
                @yield('content')
                <!-- End Content -->

                <!-- ======= Footer ======= -->
                @include('tenagakerja.layout.FooterTenagaKerja')
                <!-- End Footer -->
            </div>
        </div>
    </div>
    <script src="{{ asset('pengguna/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('pengguna/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('pengguna/assets/vendors/choices.js/choices.min.js')}}"></script>
    <script src="{{ asset('pengguna/assets/vendors/simple-datatables/simple-datatables.js')}}"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
    <script src="{{ asset('pengguna/assets/js/main.js') }}"></script>
</body>

</html>