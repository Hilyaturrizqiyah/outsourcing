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
                        <li class="breadcrumb-item"><a href="{{url ('/customer/riwayatSewa')}}">Riwayat</a>
                        <li class="breadcrumb-item active" aria-current="page">Riwayat Detail
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
                @if($kontraks->status_kontrak == 'Kontrak Disetujui')
                <div class="row">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-header"
                                style="border-bottom-left-radius: 20px !important; border-bottom-right-radius: 20px !important">
                                <div class="row">
                                    <div class="col-6">
                                        <h6>{{$kontraks->jasa->nama_jasa}}</h6>
                                        <small>Tanggal Pengajuan : {{$kontraks->tgl_mulai_kontrak}}</small> <br>
                                        <p>Lama Kontrak : {{$kontraks->lama_kontrak}}</p>
                                        <small style="color: green">Status : {{$kontraks->status_kontrak}}</small> <br>
                                    </div>
                                    <div class="col-6">
                                        <b class="float-end">{{$kontraks->outsourcing->nama_outsourcing}}</b>
                                        <small class="float-end" style="color: red">Pembayaran dilakukan setiap akhir
                                            bulan</small>
                                        {{-- <a href="{{('/customer/komplain')}}" class="btn btn-primary float-end"><i
                                            class="fas fa-eye"></i> Ajukan Komplain</a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <div class="card-header"
                                style="border-bottom-left-radius: 20px !important; border-bottom-right-radius: 20px !important">
                                <h6>Upload Bukti Pembayaran</h6>
                                <small>*Pembayaran untuk peralatan seperti seragam dll</small><br>
                                <input type="file" name="" id="">
                            </div>

                        </div>
                    </div>
                </div>

                <!-- DataTable with Hover -->
                @elseif($kontraks->status_kontrak == 'In Progress')
                <div class="row">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-header"
                                style="border-bottom-left-radius: 20px !important; border-bottom-right-radius: 20px !important">
                                <div class="row">
                                    <div class="col-6">
                                        <h6>{{$kontraks->jasa->nama_jasa}}</h6>
                                        <small>Tanggal Pengajuan : {{$kontraks->tgl_mulai_kontrak}}</small> <br>
                                        <p>Lama Kontrak : {{$kontraks->lama_kontrak}}</p>
                                        <small style="color: blue">Status : {{$kontraks->status_kontrak}}</small> <br>
                                    </div>
                                    <div class="col-6">
                                        <b class="float-end">{{$kontraks->outsourcing->nama_outsourcing}}</b>
                                        <small class="float-end" style="color: red">Pembayaran dilakukan setiap akhir
                                            bulan</small>
                                        {{-- <a href="{{('/customer/komplain')}}" class="btn btn-primary float-end"><i
                                            class="fas fa-eye"></i> Ajukan Komplain</a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <div class="card-header"
                                style="border-bottom-left-radius: 20px !important; border-bottom-right-radius: 20px !important">
                                <h6>Ingin Ajukan Komplain ?</h6>
                                <a href="{{url('/customer/formKomplain'.$kontraks->id_kontrak)}}" class="btn btn-primary">Komplain</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="table-responsive p-3">
                            <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Batas Tanggal Bayar</th>
                                        <th>Nominal</th>
                                        <th>Bukti Transfer</th>
                                        <th>Tanggal Pembayaran</th>
                                        <th>Bulan Ke</th>
                                        <th>Status Pembayaran</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php
                                    $no=1;
                                    @endphp
                                    {{-- @foreach($kontraks as $kontrak)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$kontrak->tgl_mulai_kontrak}}</td>
                                        <td>{{$kontrak->jumlah_harga}}</td>
                                        <td>foto bukti tf</td>
                                        <td>tgl</td>
                                        <td>bulan</td>
                                        <td>
                                            <a href="/admin/HapusCustomer{{$kontrak->id_kontrak}}"
                                                class="btn btn-danger"
                                                onclick="return confirm('Anda yakin mau menghapus item ini ?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach --}}
                            </table>
                        </div>
                    </div>
                </div>
                @else
                <div class="col-12">
                    <div class="card">
                        <div class="card-header"
                            style="border-bottom-left-radius: 20px !important; border-bottom-right-radius: 20px !important">
                            <div class="row">
                                <div class="col-6">
                                    <h6>{{$kontraks->jasa->nama_jasa}}</h6>
                                    <small>Tanggal Pengajuan : {{$kontraks->tgl_mulai_kontrak}}</small> <br>
                                    <p>Lama Kontrak : {{$kontraks->lama_kontrak}}</p>
                                    <small style="color: orange">Status : {{$kontraks->status_kontrak}}</small> <br>
                                </div>
                                <div class="col-6">
                                    <b class="float-end">{{$kontraks->outsourcing->nama_outsourcing}}</b>
                                    <small class="float-end" style="color: red">Pembayaran dilakukan setiap akhir
                                        bulan</small>
                                    {{-- <a href="{{('/customer/komplain')}}" class="btn btn-primary float-end"><i
                                        class="fas fa-eye"></i> Ajukan Komplain</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </section>
    </div>
</div>
@endsection
