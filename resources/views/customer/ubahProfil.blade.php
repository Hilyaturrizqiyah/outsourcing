@extends('customer.layout.TampilanCustomer')
@section('content')


<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Profil Customer</h3>
                <p class="text-subtitle text-muted">Informasi tentang profil customer</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url ('tenagakerja')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profil Customer
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
                        <div class="text-center">
                            <div class="avatar avatar-xl">
                                <img style="height: 200px !important; width: 200px !important" @if (empty(Auth::guard('customer')->user()->foto_profil))
                                src="{{ asset('/assets/img/customer/user1.jpg')}}"
                                @else
                                src="{{ asset('/pengguna/assets/images/foto_profil/'.Auth::guard('customer')->user()->foto_profil)}}"
                                @endif
                                alt="Face 1">
                            </div>
                            <div class="ms-3 mt-4 name">
                                <h5 class="font-bold">{{Auth::guard('customer')->user()->nama_customer}}</h5>
                                <i class="fas fa-envelope"></i>  <small class="text-muted">{{Auth::guard('customer')->user()->email}}</small> <br>
                                <i class="fas fa-phone"></i> <small class="text-muted">{{Auth::guard('customer')->user()->no_telp}}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-8">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header" style="border-bottom-left-radius: 20px !important; border-bottom-right-radius: 20px !important">
                                <div class="row">
                                    <div class="col-6">
                                        <h5>
                                            <i class="fas fa-user"> Profil Saya</i>
                                        </h5>
                                    </div>
                                    <div class="col-6">
                                        <a href="{{('/customer/formUbah')}}" class="btn btn-primary float-end">Ubah</a>
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
