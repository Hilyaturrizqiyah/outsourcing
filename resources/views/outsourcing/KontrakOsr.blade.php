@extends('customer.layout.TampilanCustomer')
@section('content')


<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Formulir Kontrak Kerja</h3>
                <p class="text-subtitle text-muted">Layanan Jasa Outsourcing</p>
            </div>
        </div>
    </div> <br>
    <div class="page-content">
        <section class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-header">
                                {{-- <img src="{{ url('assets/img/jasa/'.$jenisjasa->foto) }}" class="rounded mx-auto
                                d-block" width="600"> --}}
                                <h5 class="card-title"></h5>
                            </div>
                            <div class="card-body">
                                <!-- Form Basic -->
                                <div class="card mb-4">
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Kontrak Jasa</h6>
                                    </div>
                                    <div class="card-body">
                                        @if(\Session::has('alert'))
                                        <div class="alert alert-danger mb-3" align="center"
                                            style="background-color: red; color:white; ">
                                            <div>{{Session::get('alert')}}</div>
                                        </div>
                                        @endif
                                        @if(\Session::has('alert-success'))
                                        <div class="alert alert-success">
                                            <div>{{Session::get('alert-success')}}</div>
                                        </div>
                                        @endif
                                        <form class="contact-form-area contact-page-form contact-form text-left"
                                            action="{{url('/ajukan')}}/{{ $outsourcing->id_outsourcing }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label><b>Perusahaan Penyedia Jasa </b></label>
                                                <input type="text" class="form-control" name="nama_admin"
                                                    placeholder="{{$outsourcing->nama_outsourcing}}" disabled>

                                                @if ($errors->has('nama_admin'))
                                                <span class="text-danger">
                                                    <p class="text-right">* {{ $errors->first('nama_admin') }}</p>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label><b>Pilih Jasa </b></label>
                                                <select name="deskripsi" id="select" type="select" class="form-select">
                                                    @foreach ($jasa as $jasa)
                                                    <option value="{{$jasa->id_jasa}}" name="deskripsi">{{$jasa->nama_jasa}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label><b>Tanggal Mulai Kontrak</b></label>
                                                <input type="date" class="form-control" name="tgl_mulai_kontrak">
                                                @if ($errors->has('tgl_mulai_kontrak'))
                                                <span class="text-danger">
                                                    <p class="text-right">{{ $errors->first('tgl_mulai_kontrak') }}
                                                    </p>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label><b>Lama Kontrak</b></label>
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="text" class="form-control" name="lamaKontrak"
                                                            placeholder="Lama kontrak" aria-label="First name">
                                                    </div>
                                                    <div class="col">
                                                        <select name="deskripsi" id="select" type="select"
                                                            class="form-select">
                                                            <option value="Hari" name="deskripsi">Hari</option>
                                                            <option value="Bulan" name="deskripsi" type="select">Bulan
                                                            </option>
                                                            <option value="Tahun" name="deskripsi" type="select">Tahun
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="form-group">
                                                <label><b>Jumlah Tenaga Kerja</b></label>
                                                <input type="number" class="form-control" name="jumlah_tenagaKerja"
                                                    placeholder="Masukkan Jumlah">

                                                @if ($errors->has('jumlah_tenagaKerja'))
                                                <span class="text-danger">
                                                    <p class="text-right">{{ $errors->first('jumlah_tenagaKerja') }}</p>
                                                </span>
                                                @endif

                                            </div>

                                            {{-- <div class="form-group">
                                        <label><b>Jumlah Harga</b></label>
                                        <input type="text" class="form-control" name="password" placeholder="Jumlah Harga">

                                        @if ($errors->has('password'))
                                            <span class="text-danger"><p class="text-right">* {{ $errors->first('password') }}
                                            </p></span>
                                            @endif

                                    </div> --}}


                                    <div class="form-group">
                                        <input type="reset" class="btn btn-secondary" value="Batal">
                                        <button class="btn btn-primary">Ajukan Kontrak</button>
                                    </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-user"></i> Penyewa Jasa
                                </h6>
                            </div>

                            <table>
                                <div class="form-group">
                                    <tr>
                                        <td><strong>Nama Pengguna Jasa</strong></td>
                                        <td width="15px">:</td>
                                        <td>{{Auth::guard('customer')->user()->nama_customer}}</td>
                                    </tr>
                                </div>

                                <div class="form-group">
                                    <tr>
                                        <td><strong>Alamat Pengguna Jasa</strong></td>
                                        <td width="15px">:</td>
                                        <td>{{Auth::guard('customer')->user()->alamat}}</td>
                                    </tr>
                                </div>
                            </table>
                        </div>
                        <div class="card-body">
                            <div class="card-content">
                                <form class="form form-horizontal">
                                    <div class="form-body">
                                        {{-- <div class="row">
                                                <center>
                                                    <a href="{{url('/customer/formKontrak'.$jasa->id_jasa)}}"
                                        class="btn btn-primary">Mulai Ajukan Kontrak</a>
                                        </center>
                                    </div> --}}
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>


</section>
</div>

</div>


@endsection
