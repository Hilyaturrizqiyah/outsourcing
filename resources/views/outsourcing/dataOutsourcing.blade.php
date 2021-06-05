@extends('customer.layout.TampilanCustomer')
@section('content')


<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Layanan Penyedia Jasa Outsourcing</h3>
                <p class="text-subtitle text-muted">Temukan Penyedia Jasa Outsourcing Terbaik</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url ('tenagakerja')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Penyedia Jasa Outsourcing
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="section-title col-md-12 mb-1">
        <form action="/Pasien/DashboardPasien/cari" method="GET">
            <input class="btn btn-light col-10" type="text" name="cari" placeholder="Search Jasa.." value="" style="box-shadow: 2px 5px rgba(128, 128, 128, 0.247);">
            <button class="btn btn-primary col-1"><i class="fa fa-search"></i></button>
        </form>
    </div> <br> <br>
    <div class="page-content">
        <section class="row">
            @foreach ($outsourcing as $outsourcing)
            <div  class="col-lg-4 col-md-4 col-sm-6 col-12">
            <a href="{{url('/customer/detailOutsourcing'.$outsourcing->id_outsourcing)}}">
                <div class="card">
                    <div class="card-header">
                        <h4>{{$outsourcing->nama_outsourcing}}</h4>
                    </div>
                    <div class="card-body">
                        <div class="card-content">
                                <form class="form form-horizontal">
                                    <div class="form-body">
                                        <div class="row">
                                            <img
                                src="{{ url('../pengguna/assets/images/foto_profil/'.$outsourcing->foto_profil) }}"
                                alt="Image" width="350px" height="200px">
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
            </a>
            </div>
            @endforeach

            <div class="col-12 col-lg-8">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Jasa</h5>
                            </div>
                            <div class="card-body">
                                Melamar Jasa (Belum punya Jasa)

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

</div>


@endsection
