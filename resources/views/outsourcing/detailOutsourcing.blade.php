@extends('customer.layout.TampilanCustomer')
@section('content')


<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Layanan Penyedia Jasa Outsourcing</h3>
                <p class="text-subtitle text-muted">Perusahaan Outsourcing Terbaik</p>
            </div>
        </div>
    </div> <br>
    <div class="page-content">
        <section>
            <div class="row">
                <div class="col-lg-8 col-md-8 col-12">
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
                            <p style="text-align: justify; text-indent: 0.5in;">{{$outsourcing->deskripsi}}</p>
                            <br>
                            <h5>Jasa yang tersedia :</h5>
                            @foreach ($jasa as $jasa)
                            <p class="btn btn-outline-dark">{{$jasa->nama_jasa}}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Bagaimana Cara Kerjanya</h4>
                            <ol>
                                <li>Pilih jenis jasa yang diinginkan</li>
                                <li>Isi formulir kontrak jasa</li>
                                <li>Melakukan kesepakatan dengan pihak outsourcing atau penyedia jasa</li>
                                <li></li>
                            </ol>
                        </div>
                        <div class="card-body">
                            <div class="card-content">
                                <form class="form form-horizontal">
                                    <div class="form-body">
                                        <div class="row">
                                            <center>
                                                <a href="{{url('/customer/KontrakOsr'.$outsourcing->id_outsourcing)}}"
                                                    class="btn btn-primary">Mulai Ajukan Kontrak</a>
                                            </center>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

</div>


@endsection
