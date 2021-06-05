@extends('customer.layout.TampilanCustomer')
@section('content')


<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Formulir Komplain</h3>
                <p class="text-subtitle text-muted">Layanan Jasa Outsourcing</p>
            </div>
        </div>
    </div> <br>
    <div class="page-content">
        <section class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- Form Basic -->
                                <div class="card mb-4">
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Formulir Pendapat Customer</h6>
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
                                            action="{{url('/ajukanKomplain')}}/{{ $kontraks->id_kontrak }}"
                                            method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label><b>Pilih Nama Tenaga Kerja</b></label>
                                                <small style="color: red">*Yang akan dikomplain</small>
                                                <select type="select" class="form-control" name="id_tenagaKerja">
                                                    @foreach ($tenaga_kerja as $tenaga_kerja)
                                                    <option value="{{$tenaga_kerja->id_tenagaKerja}}">{{$tenaga_kerja->nama_tenagaKerja}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('jumlah_tenagaKerja'))
                                                <span class="text-danger">
                                                    <p class="text-right">{{ $errors->first('jumlah_tenagaKerja') }}</p>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <textarea type="date" class="form-control" name="alasan"
                                                    rows="15"></textarea>
                                                @if ($errors->has('alasan'))
                                                <span class="text-danger">
                                                    <p class="text-right">{{ $errors->first('alasan') }}
                                                    </p>
                                                </span>
                                                @endif
                                            </div>
                                            <table>
                                                <div class="form-group">
                                                    <tr>
                                                        <td><strong>Nama Customer</strong></td>
                                                        <td width="15px">:</td>
                                                        <td>{{Auth::guard('customer')->user()->nama_customer}}</td>
                                                    </tr>
                                                </div>

                                                <div class="form-group">
                                                    <tr>
                                                        <td><strong>Alamat Customer</strong></td>
                                                        <td width="15px">:</td>
                                                        <td>{{Auth::guard('customer')->user()->alamat}}</td>
                                                    </tr>
                                                </div>
                                                <div class="form-group">
                                                    <tr>
                                                        <td><strong>No. Telepon Customer</strong></td>
                                                        <td width="15px">:</td>
                                                        <td>{{Auth::guard('customer')->user()->no_telp}}</td>
                                                    </tr>
                                                </div>
                                            </table> <br>
                                            <div class="form-group">
                                                <input type="reset" class="btn btn-secondary" value="Batal">
                                                <button class="btn btn-primary">Ajukan Komplain</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    {{-- <div  class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Bagaimana Cara Kerjanya</h4>
                            <ol>
                                <li>Pilih jenis jasa yang diinginkan</li>
                                <li>Isi formulir kontrak jasa</li>
                                <li>Melakukan kesepakatan dengan pihak outsourcing atau penyedia jasa</li>
                                <li></li>
                            </ol>
                        </div>
                        <div class="card-body">
                            <div class="card-content">
                                    <form class="form form-horizontal">
                                        <div class="form-body">
                                            <div class="row">
                                                <center>
                                                    <a href="{{url('/customer/formKontrak')}}" class="btn
    btn-primary">Mulai Ajukan Kontrak</a>
    </center>
</div>
</div>
</form>
</div>
</div>
</div>
</div> --}}
</section>
</div>

</div>


@endsection
