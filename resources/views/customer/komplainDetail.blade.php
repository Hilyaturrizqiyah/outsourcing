@extends('customer.layout.TampilanCustomer')
@section('content')


<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Komplain Customer</h3>
                <p class="text-subtitle text-muted"></p>
            </div>
        </div>
    </div> <br>
    <div class="page-content">
        <section>
            <div class="row">
                <div class="col-lg-8 col-md-8 col-12">
                    <div class="card">
                        <div class="card-header">
                            {{-- <h5 class="card-title">Komplain Customer</h5> --}}
                        </div>
                        <div class="card-body">
                            <h4>{{Auth::guard('customer')->user()->nama_customer}}</h4>
                            <p>{{$detail_komplain->komplain->alasan}}</p>
                            <p>{{$detail_komplain->komplain->kontrak->lama_kontrak}}</p>
                            <br>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Daftar Nama Pekerja :</h5>
                            <p class="btn btn-outline-dark">{{$detail_komplain->tenagakerja->nama_tenagaKerja}}</p>
                        </div>
                        <div class="card-body">
                            <div class="card-content">
                                <form class="form form-horizontal">
                                    <div class="form-body">
                                        <div class="row">
                                            <center>
                                                <a href="{{url('/customer/KontrakOsr'.$detail_komplain->komplain->id_komplain)}}"
                                                    class="btn btn-primary">Komplain Tenaga Kerja</a>
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

@endsection
