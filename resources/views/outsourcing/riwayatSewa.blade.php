@extends('customer.layout.TampilanCustomer')
@section('content')


<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Riwayat</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url ('/customer/DashboardCustomer')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Riwayat
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section>
            <div class="row">
                @if(\Session::has('alert'))
                <div class="alert alert-danger mb-3" align="center" style="background-color: red; color:white; ">
                    <div>{{Session::get('alert')}}</div>
                </div>
                @endif
                @if(\Session::has('alert-success'))
                <div class="alert alert-success">
                    <div>{{Session::get('alert-success')}}</div>
                </div>
                @endif
                <div class="col-12">
                    @foreach($kontraks as $kontrak)
                    <div class="card">
                        <div class="card-header"
                            style="border-bottom-left-radius: 20px !important; border-bottom-right-radius: 20px !important">
                            <div class="row">
                                <div class="col-6">
                                    <h6>{{$kontrak->jasa->nama_jasa}}</h6>
                                    <small>Tanggal Pengajuan : {{$kontrak->tgl_mulai_kontrak}}</small> <br>
                                    @if($kontrak->status_kontrak == "Pending")
                                    <small style="color: orange">{{$kontrak->status_kontrak}}</small>
                                    @elseif($kontrak->status_kontrak == "Kontrak Disetujui")
                                    <small style="color: green">{{$kontrak->status_kontrak}}</small>
                                    @elseif($kontrak->status_kontrak == "In Progress")
                                    <small style="color: blue">{{$kontrak->status_kontrak}}</small>
                                    @elseif($kontrak->status_kontrak == "Finish")
                                    <small style="color: green">{{$kontrak->status_kontrak}}</small>
                                    @elseif($kontrak->status_kontrak == "Cancel")
                                    <small style="color: red"> {{$kontrak->status_kontrak}}</small>
                                    @endif
                                </div>
                                <div class="col-6">
                                    <a href="{{('/customer/riwayatSewaDetail'.$kontrak->id_kontrak)}}"
                                        class="btn btn-primary float-end"><i class="fas fa-eye"></i> Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
