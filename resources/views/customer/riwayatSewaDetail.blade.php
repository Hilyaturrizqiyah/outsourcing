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
                @if($kontraks->status_kontrak == 'Menunggu Pembayaran')
                <div class="row">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-header"
                                style="border-bottom-left-radius: 20px !important; border-bottom-right-radius: 20px !important">
                                <div class="row">
                                    <div class="col-6">
                                        <p class="fw-bold">{{$kontraks->jasa->nama_jasa}} |
                                            {{$kontraks->outsourcing->nama_outsourcing}}</p>
                                        <small>Tanggal Pengajuan : {{$kontraks->tgl_mulai_kontrak}}</small> <br>
                                        <p>Lama Kontrak : {{$kontraks->lama_kontrak}}</p>
                                        <p>Jumlah Tenaga Kerja : {{$kontraks->jumlah_tenagaKerja}}</p>
                                        <p>Jumlah Biaya Perlengkapan : Rp. {{number_format($kontraks->jumlah_biayaPerlengkapan)}}</p>
                                        <p>Jumlah Biaya Tenaga Kerja : Rp. {{number_format($kontraks->jumlah_biayaTenagaKerja)}}</p>

                                        <small style="color: purple">Status : {{$kontraks->status_kontrak}}</small> <br>
                                    </div>
                                    <div class="col-6">
                                        <small class="float-end" style="color: red">Note : Pembayaran tenaga kerja <br> dapat
                                            dilakukan dari awal sampai akhir
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
                                <h6>Upload Bukti Pembayaran Perlengkapan</h6>
                                <small>*Pembayaran untuk peralatan seperti seragam dll</small><br>
                                <form enctype="multipart/form-data"
                                    action="{{url('customer/uploadPembayaranPerlengkapan')}}" method="post">
                                    {{csrf_field()}}
                                    <input type="text" name="id_kontrak" value="{{$kontraks->id_kontrak}}" hidden>
                                    <input type="file" name="bukti_tfPerlengkapan">
                                    <hr>
                                    <input type="submit" class="btn btn-primary" value="Kirim"
                                        {{ ($pembayaranP->status_bayar == 'Menunggu Validasi') ? 'disabled' : ''}}>
                                    {{ ($pembayaranP->status_bayar == 'Menunggu Validasi') ? '(Menunggu Validasi oleh Outsourcing)' : ''}}
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- DataTable with Hover -->

                @elseif($kontraks->status_kontrak == 'Kontrak Disetujui')
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header"
                                style="border-bottom-left-radius: 20px !important; border-bottom-right-radius: 20px !important">
                                <div class="row">
                                    <div class="col-6">
                                        <p class="fw-bold">{{$kontraks->jasa->nama_jasa}} |
                                            {{$kontraks->outsourcing->nama_outsourcing}}</p>
                                        <p style="font-size: 12px">Tanggal Pengajuan : {{$kontraks->tgl_mulai_kontrak}}
                                        </p>
                                        <p style="font-size: 12px">Lama Kontrak : {{$kontraks->lama_kontrak}} Bulan</p>
                                        <br>

                                        <small style="color: green">Status : {{$kontraks->status_kontrak}}</small> <br>
                                    </div>
                                    <div class="col-6">
                                        <b class="float-end">{{$kontraks->outsourcing->nama_outsourcing}}</b>
                                        <small class="float-end" style="color: red">Note : Pembayaran dilakukan per
                                            bulan <br> selama masa kontrak</small>
                                            {{-- <p>Download Surat Pengajuan Kontrak Kerja</p>
                                            <a href="{{ route('suratKontrak.download', $kontraks->id_kontrak) }}" class="btn btn-primary"><i class="fas fa-file-pdf"></i> PDF</a> --}}
                                        {{-- <a href="{{('/customer/komplain')}}" class="btn btn-primary float-end"><i
                                            class="fas fa-eye"></i> Ajukan Komplain</a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card text-center">
                            <div class="card-header"
                                style="border-bottom-left-radius: 20px !important; border-bottom-right-radius: 20px !important">
                                <div class="row">
                                    <div class="col">
                                        <img src="{{ url('pengguna/assets/images/bukti_tf/'.$kontraks->foto_kontrak) }}" alt="Image"
                                        width="500px" height="550px">

                                    </div>

                                </div>
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
                                    <div class="col">
                                        <p class="fw-bold">{{$kontraks->jasa->nama_jasa}} |
                                            {{$kontraks->outsourcing->nama_outsourcing}}</p>
                                        <p style="font-size: 12px">Tanggal Pengajuan : {{$kontraks->tgl_mulai_kontrak}}
                                        </p>
                                        <p style="font-size: 12px">Lama Kontrak : {{$kontraks->lama_kontrak}} Bulan</p>
                                        <br>

                                        <small style="color: blue">Status : {{$kontraks->status_kontrak}}</small> <br>
                                    </div>
                                    <div class="col">
                                        <p class="float-end" style="color: red">Pembayaran dilakukan setiap akhir
                                            bulan</p>
                                        <p class="float-end" style="color: red">Total nominal
                                            Rp. {{number_format($kontraks->jumlah_biayaTenagaKerja)}}</p>
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
                                <a href="{{url('/customer/formKomplain'.$kontraks->id_kontrak)}}"
                                    class="btn btn-primary">Komplain</a>
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
                                        <th>Keterangan</th>
                                        <th>Nominal</th>
                                        <th>Bulan Ke</th>
                                        <th>Status Pembayaran</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                @foreach($pembayaranTK as $pembayaranTK)
                                <tbody>
                                    @php
                                    $no=1;
                                    @endphp
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$pembayaranTK->nama_pembayaran}}</td>
                                        <td>Rp.
                                            {{number_format($pembayaranTK->nominal / $pembayaranTK->kontrakjasa->lama_kontrak)}}
                                        </td>
                                        <td>{{$pembayaranTK->bulan_ke}}</td>
                                        <td>{{$pembayaranTK->status_bayar}}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#uploadBukti">
                                                Upload Bukti Pembayaran
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card text-center">
                            <div class="card-header"
                                style="border-bottom-left-radius: 20px !important; border-bottom-right-radius: 20px !important">
                                <div class="row">
                                    <div class="col">
                                        <img src="{{ url('pengguna/assets/images/bukti_tf/'.$kontraks->foto_kontrak) }}" alt="Image"
                                        width="500px" height="550px">

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @else
                <div class="col">
                    <div class="card">
                        <div class="card-header"
                            style="border-bottom-left-radius: 20px !important; border-bottom-right-radius: 20px !important">
                            <div class="row">
                                <div class="col-6">
                                    <p class="fw-bold">{{$kontraks->jasa->nama_jasa}} |
                                        {{$kontraks->outsourcing->nama_outsourcing}}</p>
                                    <small>Tanggal Pengajuan : {{$kontraks->tgl_mulai_kontrak}}</small> <br>
                                    <p>Lama Kontrak : {{$kontraks->lama_kontrak}}</p>
                                    <small style="color: orange">Status : {{$kontraks->status_kontrak}}</small> <br>
                                </div>
                                <div class="col-6">
                                    <small class="float-end" style="color: red">Note : Pembayaran dilakukan per
                                        bulan <br> selama masa kontrak</small>
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
<!-- Modal -->
<div class="modal fade" id="uploadBukti" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Bukti Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{url('customer/uploadPembayaranTenaga')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label><b>Upload Bukti</b></label>
                        <input type="file" class="form-control" name="bukti_tfTenagaKerja">
                        @if ($errors->has('bukti_tf'))
                        <span class="text-danger">
                            <p class="text-right">* {{ $errors->first('bukti_tf') }}</p>
                        </span>
                        @endif
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
