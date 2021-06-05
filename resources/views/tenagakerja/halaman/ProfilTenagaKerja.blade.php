@extends('tenagakerja.layout.TampilanTenagaKerja')
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
            <div  class="col-12 col-lg-4">
                <div class="card">
                    <div class="card-body py-4 px-5">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                                <img 
                                    @if ($datas->foto_profi == "")
                                        src="{{ asset('pengguna/assets/images/faces/tidakadagambar.png')}}"
                                    @else
                                        src="{{ url('pengguna/assets/images/foto_profil/'.$datas->foto_profil)}}"
                                    @endif 
                                alt="Face 1">
                            </div>
                            <div class="ms-3 name">
                                <h5 class="font-bold">{{$datas->nama_tenagaKerja}}</h5>
                                <h6 class="text-muted mb-0">{{$datas->no_ktp}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Tentang Saya</h4>
                        <hr>
                    </div>
                    <div class="card-body">
                        <div class="card-content">
                                <form class="form form-horizontal">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label><strong>Nomor KTP</strong></label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <p>{{$datas->no_ktp}}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <label><strong>Email</strong></label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <p>{{$datas->email}}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <label><strong>Area</strong></label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                Arjawinangun, Kabupaten Cirebon, Provinsi Jawa Barat
                                            </div>
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Status Tenaga Kerja</h4>
                        <hr>
                    </div>
                    <div class="card-body">
                        <p>{{$datas->status_tenagaKerja}}</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-8">
                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Jasa</h5>
                            </div>
                            <div class="card-body">
                                @if($datas->id_jasa != "")
                                    {{$datas->Jasa->nama_jasa}}
                                @else
                                    Belum punya Jasa 
                                    <a href="{{url ('/tenagakerja/JasaTenagaKerja')}}" class="btn btn-info">Melamar Jasa</a>
                                @endif
                            </div>
                        </div>                    
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Kontrak</h5>
                            </div>
                            <div class="card-body">
                                @if($datas->id_kontrak != "")
                                    {{$datas->Kontrak->nama_jasa}}
                                @else
                                    Belum punya Kontrak 
                                @endif

                            </div>
                        </div>                    
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Komplain Kontrak</h5>
                            </div>
                            <div class="card-body">
                                Belum ada Komplain

                            </div>
                        </div>                    
                    </div>
                </div>
            </div>
        </section>
    </div>

</div>


@endsection