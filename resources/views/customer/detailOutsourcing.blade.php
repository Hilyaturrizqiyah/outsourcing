@extends('customer.layout.TampilanCustomer')
@section('content')


<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h5>Layanan Penyedia Jasa Outsourcing</h5>
                <p class="text-subtitle text-muted">Perusahaan Outsourcing Terbaik</p>
            </div>
        </div>
    </div> <br>
    <div class="page-content">
        <section>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <center>
                                <img src="{{ url('../pengguna/assets/images/foto_profil/'.$outsourcing->foto_profil) }}"
                                    class="rounded img-fluid" width="400px" height="400px">
                            </center>
                            <h5 class="card-title"></h5>
                        </div>
                        <div class="card-body">
                            <h4>{{$outsourcing->nama_outsourcing}}</h4>
                            <p><i class="fas fa-map-pin"></i> {{$outsourcing->alamat}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="page-content">
        <section>
            <div class="row">
                <div class="col-lg-8 col-md-8 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5>Tentang Kami :</h5>
                            <p style="text-align: justify; text-indent: 0.5in;">{{$outsourcing->deskripsi}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Ingin ajukan kontrak ?</h4>
                            <small>Pilih jasa yang tersedia :</small>
                            <ol>
                                @foreach ($jasa as $jasa)
                                <a href="{{url('/customer/detailJasa'.$jasa->id_jasa)}}" class="btn btn-outline-dark mt-3">{{$jasa->nama_jasa}}</a>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>


@endsection
