@extends('customer.layout.TampilanCustomer')
@section('content')


<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-12 order-md-1 order-last">
                <center>
                    <h5>Layanan Penyedia Jasa Outsourcing</h5>
                </center>
            </div>
            {{-- <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url ('tenagakerja')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Penyedia Jasa Outsourcing
            </li>
            </ol>
            </nav>
        </div> --}}
    </div>
</div>
<div class="section-title col-md-12 mb-1">
    <form action="/customer/dataOutsourcing/cariOsr" method="GET">
        <label for="search-input" class="search d-flex align-items-center">
            <input class="form-control" type="text" name="cariOsr" placeholder="Cari Outsourcing.."
                style="box-shadow: 0px 1px 1px 1px rgba(0, 0, 0, 0.247);">
            <button class="btn btn-primary" style="box-shadow: 1px 1px 1px 1px rgba(0, 0, 0, 0.247);">
                <img width="20px" height="20px" src="/assets/img/search.png" alt="image" class="absolute p1-m">
            </button>
        </label>
    </form>
</div> <br> <br>
<div class="page-content">
    <p class="text-subtitle text-muted">Temukan Perusahaan Outsourcing Terbaik</p>
    <section>
        <div class="row">
                <div class="col">
                    @foreach ($outsourcing as $outsourcing)
                    <div class="card">
                        <a href="{{url('/customer/detailOutsourcing'.$outsourcing->id_outsourcing)}}">
                            <div class="card-header"
                                style="border-bottom-left-radius: 20px !important; border-bottom-right-radius: 20px !important">
                                <div class="row">
                                    <div class="row">
                                        <div class="avatar avatar-xl col">
                                            <img style="height: 100px !important; width: 100px !important"
                                                src="{{ url('../pengguna/assets/images/foto_profil/'.$outsourcing->foto_profil) }}"
                                                alt="Image">
                                        </div>
                                        <div class="col-10">
                                            <h4>{{$outsourcing->nama_outsourcing}}</h4>
                                            <p style="color: black"><i class="fas fa-map-pin"></i> {{$outsourcing->alamat}}</p>
                                            <small style="color: gray"><i class="fas fa-phone-alt"></i> {{$outsourcing->no_telp}}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
        </div>
    </section>
</div>


@endsection
