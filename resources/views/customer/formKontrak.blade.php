@extends('customer.layout.TampilanCustomer')
@section('content')

<script type="text/javascript">
    function totalIt() {
  var input = document.getElementsByName("perlengkapan[]");
  var total = 0;
  for (var i = 0; i < input.length; i++) {
    if (input[i].checked) {
      total += parseFloat(input[i].value);
    }
  }
  document.getElementById("total").value =total;
}
</script>

<script type="text/javascript">
    function startCalculate(){
        interval=setInterval("Calculate()",1);
    }
    function Calculate(){
        var a=document.form1.biaya.value;
        var c=document.form1.jumlah_tenagaKerja.value;
        var x=document.form1.jumlahTenagaKerja.value;
        var y=document.form1.biayaPerlengkapan.value;
        document.form1.jumlah_biayaTenagaKerja.value=(c*a);
        document.form1.jumlah_biayaPerlengkapan.value=(x*y);
        document.form1.jumlahTenagaKerja.value=c;
    }
    function stopCalc(){
        clearInterval(interval);
    }

</script>
<script type="text/javascript">
    function hitungJumlahBP(){
        interval=setInterval("Hitung()",1);
    }
    function Hitung(){
        var a=document.form1.biayaPerlengkapan.value;
        var c=document.form1.jumlah_tenagaKerja.value;jumlah_biayaPerlengkapan
        document.form1.jumlah_biayaPerlengkapan.value=(c*a);
    }
    function stophitungJumlahBP(){
        clearInterval(interval);
    }

</script>

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
                    <div class="col">
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
                                        <form id="form1" name="form1"
                                            class="contact-form-area contact-page-form contact-form text-left"
                                            action="{{url('/ajukan')}}/{{ $biaya_tenaga->jasa->id_jasa }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label><b>Jasa </b></label>
                                                <input type="text" class="form-control" name="nama_admin"
                                                    placeholder="{{$biaya_tenaga->jasa->nama_jasa}}" disabled>
                                                @if ($errors->has('nama_admin'))
                                                <span class="text-danger">
                                                    <p class="text-right">* {{ $errors->first('nama_admin') }}</p>
                                                </span>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label><b>Perusahaan Penyedia Jasa </b></label>
                                                <input type="text" class="form-control" name="nama_admin"
                                                    placeholder="{{$biaya_tenaga->jasa->outsourcing->nama_outsourcing}}"
                                                    disabled>

                                                @if ($errors->has('nama_admin'))
                                                <span class="text-danger">
                                                    <p class="text-right">* {{ $errors->first('nama_admin') }}</p>
                                                </span>
                                                @endif

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
                                                        <input name="deskripsi" type="text" class="form-control"
                                                            value="Bulan" disabled>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label><b>Biaya Tenaga Kerja</b></label>
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="text" name="biaya" class="form-control"
                                                            value="{{$biaya_tenaga->biaya}}" onfocus="startCalculate()"
                                                            onblur="stopCalc()" readonly>
                                                    </div>
                                                    <div class="col">
                                                        <h5>/ orang</h5>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label><b>Jumlah Tenaga Kerja</b></label>
                                                <input type="number"
                                                    class="form-control @error('jumlah_tenagaKerja') is-invalid @enderror"
                                                    name="jumlah_tenagaKerja" onfocus="startCalculate()"
                                                    onblur="stopCalc()">

                                                @if ($errors->has('jumlah_tenagaKerja'))
                                                <span class="text-danger">
                                                    <p class="text-right">{{ $errors->first('jumlah_tenagaKerja') }}</p>
                                                </span>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label><b>Jumlah Biaya Tenaga Kerja</b></label>
                                                <input type="number" class="form-control" name="jumlah_biayaTenagaKerja"
                                                    onfocus="startCalculate()" onblur="stopCalc()" readonly>

                                                @if ($errors->has('password'))
                                                <span class="text-danger">
                                                    <p class="text-right">* {{ $errors->first('password') }}
                                                    </p>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label><b>Include : Biaya Peralatan</b></label>

                                                @foreach ($biaya_perlengkapan as $key => $biaya_perlengkapan)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="perlengkapan[]" value="{{$biaya_perlengkapan->biaya}}"
                                                        id="menu{{$key}}" onclick="totalIt()">
                                                    <label class="form-check-label" for="menu{{$key}}">
                                                        {{$biaya_perlengkapan->nama_biayaPerlengkapan}} ( {{$biaya_perlengkapan->biaya}} )
                                                    </label>
                                                </div>
                                                @endforeach
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-5">
                                                        <input type="text" name="biayaPerlengkapan" class="form-control" id="total" onfocus="startCalculate()"
                                                        onblur="stopCalc()" readonly>

                                                    </div>
                                                    <div class="col-lg-4">
                                                        <span>X (Jumlah Tenaga Kerja)</span>

                                                    </div>
                                                    <div class="col-lg-3">
                                                        <input class="form-control" name="jumlahTenagaKerja"
                                                        onfocus="startCalculate()"
                                                        onblur="stopCalc()" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label><b>Jumlah Biaya Peralatan</b></label>
                                                <input type="number" class="form-control" name="jumlah_biayaPerlengkapan" onfocus="startCalculate()"
                                                onblur="stopCalc()" readonly>
                                            </div>

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
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-user"></i> Penyewa
                                        Jasa
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
