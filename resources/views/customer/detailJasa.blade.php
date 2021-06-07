@extends('customer.layout.TampilanCustomer')
@section('content')


<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Layanan Penyedia Jasa Outsourcing</h3>
                <p class="text-subtitle text-muted">Temukan Jasa Outsourcing Terbaik</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url ('tenagakerja')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Jasa Outsourcing
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div> <br>
    <div class="page-content">
        <section>
            <div class="row">
                <div class="col-lg-8 col-md-8 col-12">
                    <div class="card">
                        <div class="card-header">
                            <img src="{{ url('assets/img/jasa/'.$jasa->foto_profil) }}" class="rounded img-fluid">
                            <h5 class="card-title"></h5>
                        </div>
                        <div class="card-body">
                            <h4>{{$jasa->nama_jasa}}</h4>
                            <p>{{$jasa->jenis_jasa->deskripsi}}</p>
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
                                <li>Melakukan Transaksi Pembayaran Dengan Mengupload Bukti Transfer</li>
                            </ol>
                        </div>
                        <div class="card-body">
                            <div class="card-content">
                                <form class="form form-horizontal">
                                    <div class="form-body">
                                        <div class="row">
                                            <center>
                                                <a href="{{url('/customer/formKontrak'.$jasa->id_jasa)}}"
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
