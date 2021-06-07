@extends('customer.layout.TampilanCustomer')
@section('content')


<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Riwayat Komplain Customer</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url ('/customer/DashboardCustomer')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Riwayat Komplain
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
                    @foreach($komplain as $komplains)
                    <div class="card">
                        <div class="card-header"
                            style="border-bottom-left-radius: 20px !important; border-bottom-right-radius: 20px !important">
                            <div class="row">
                                <div class="col-6">
                                    <h6>{{$komplains->kontrak_jasa}}</h6>
                                    <i class="fas fa-user"></i> <small style="color: blueviolet"><b>{{Auth::guard('customer')->user()->nama_customer}}</b></small>
                                    <p>{{$komplains->alasan}}</p>
                                </div>
                                {{-- <div class="col-6">
                                    <a href="{{('/customer/riwayatSewaDetail'.$komplain->id_komplain)}}"
                                        class="btn btn-primary float-end"><i class="fas fa-eye"></i> Detail</a>
                                </div> --}}
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
