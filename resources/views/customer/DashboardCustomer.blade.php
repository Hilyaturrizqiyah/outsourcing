@extends('customer.layout.TampilanCustomer')
@section('content')


<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 order-md-1 order-last">
                <center>
                    <h5>Layanan Penyedia Jasa Outsourcing</h5>
                </center>
            </div>
            {{-- <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url ('tenagakerja')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Jasa Outsourcing
            </li>
            </ol>
            </nav>
        </div> --}}
    </div>
</div>
<div class="col">
    <form action="/customer/DashboardCustomer/cariJasa" method="GET">
        <label for="search-input" class="search d-flex align-items-center">
            <input class="form-control" type="text" name="cariJasa" placeholder="Cari Jasa.." 
                style="box-shadow: 0px 1px 1px 1px rgba(0, 0, 0, 0.247);">
            <button class="btn btn-primary" style="box-shadow: 1px 1px 1px 1px rgba(0, 0, 0, 0.247);">
                <img width="20px" height="20px" src="/assets/img/search.png" alt="image" class="absolute p1-m">
            </button>
        </label>
        {{-- <button class="btn btn-light col"><i class="fa fa-search"></i></button> --}}
    </form>
</div> <br> <br>
<div class="page-content">
    <section class="row">
        <p class="text-subtitle text-muted">Temukan Jasa Outsourcing Terbaik</p>
        @foreach ($jasa as $jasa)
        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
            <a href="{{url('/customer/detailJasa'.$jasa->id_jasa)}}">
                <div class="card">
                    <div class="card-body">
                        <div class="card-content">
                            <form class="form form-horizontal">
                                <div class="form-body">
                                    <div class="row">
                                        <h6>{{$jasa->nama_jasa}}</h6>
                                        <img src="{{ url('../assets/img/jasa/'.$jasa->foto_profil) }}" alt="Image"
                                            width="350px" height="150px">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </section>
</div>

</div>


@endsection
