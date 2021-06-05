@extends('customer.layout.TampilanCustomer')
@section('content')


<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Profil Tenaga Kerja</h3>
                <p class="text-subtitle text-muted">Informasi tentang profil tenaga kerja</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url ('tenagakerja')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profil Tenaga Kerja
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-4">
                <div class="card">
                    <div class="card-body py-4 px-5">
                        <div class="text-center mb-4">
                            <div class="avatar avatar-xl">
                                <img style="height: 200px !important; width: 200px !important"
                                    @if(empty(Auth::guard('customer')->user()->foto_profil))
                                src="{{ asset('assets/img/customer/user1.jpg')}}"
                                @else
                                src="{{ url('/pengguna/assets/images/foto_profil/'. Auth::guard('customer')->user()->foto_profil)}}"
                                @endif
                                alt="Face 1">
                            </div>
                        </div>
                        <div class="ms-3 name">
                            <form enctype="multipart/form-data"
                                class="contact-form-area contact-page-form contact-form text-left"
                                action="aksiUbahProfilCust{{$datas->id_customer}}" method="post">

                                {{csrf_field()}}
                                <div class="form-group">
                                    <label><b>Ubah Foto</b></label>
                                    <input type="file" class="form-control" name="foto_profil">

                                    @if ($errors->has('foto_profil'))
                                    <span class="text-danger">
                                        <p class="text-right">* {{ $errors->first('foto_profil') }}</p>
                                    </span>
                                    @endif

                                </div>
                                <h5>{{Auth::guard('customer')->user()->nama_customer}}</h5>
                                {{-- <h5 class="font-bold">{{$datas->nama_tenagaKerja}}</h5>
                                <h6 class="text-muted mb-0">{{$datas->no_ktp}}</h6> --}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-8">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>
                                    <i class="fas fa-user"> Profil Saya</i> <br>
                                </h5>
                            </div>
                            <div class="card-body">
                                <!-- Form Basic -->
                                <div class="card mb-4">
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Ubah Profil</h6>
                                    </div>
                                    <div class="card-body">



                                        <div class="form-group">
                                            <label><b>Nama</b></label>
                                            <input type="text" class="form-control" name="nama_customer"
                                                value="{{$datas->nama_customer}}">

                                            @if ($errors->has('nama_customer'))
                                            <span class="text-danger">
                                                <p class="text-right">* {{ $errors->first('nama_customer') }}</p>
                                            </span>
                                            @endif

                                        </div>

                                        <div class="form-group">
                                            <label><b>Alamat</b></label>
                                            <textarea type="date" class="form-control"
                                                name="alamat">{{$datas->alamat}}</textarea>

                                            @if ($errors->has('alamat'))
                                            <span class="text-danger">
                                                <p class="text-right">* {{ $errors->first('alamat') }}</p>
                                            </span>
                                            @endif

                                        </div>

                                        <div class="form-group">
                                            <label><b>Nomor Telepon</b></label>
                                            <input type="text" class="form-control" name="no_telp"
                                                value="{{$datas->no_telp}}">

                                            @if ($errors->has('no_telp'))
                                            <span class="text-danger">
                                                <p class="text-right">* {{ $errors->first('no_telp') }}</p>
                                            </span>
                                            @endif

                                        </div>

                                        <div class="form-group">
                                            <label><b>Email</b></label>
                                            <input type="text" class="form-control" name="email"
                                                value="{{$datas->email}}">

                                            @if ($errors->has('email'))
                                            <span class="text-danger">
                                                <p class="text-right">* {{ $errors->first('email') }}</p>
                                            </span>
                                            @endif

                                        </div>

                                        {{-- <div class="form-group">
                                                <label><b>Password </b></label>
                                                <input type="text" class="form-control" name="password"
                                                    placeholder="Masukan password">

                                                @if ($errors->has('password'))
                                                <span class="text-danger">
                                                    <p class="text-right">* {{ $errors->first('password') }}</p>
                                        </span>
                                        @endif
                                    </div> --}}

                                    <div class="form-group">
                                        <input type="reset" class="btn btn-secondary" value="Batal">
                                        <input type="submit" class="btn btn-primary" value="Perbarui">
                                    </div>
                                    </form>
                                </div>
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
