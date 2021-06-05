@extends('tenagakerja.layout.TampilanTenagaKerja')
@section('content')


<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Ubah Profil Tenaga Kerja</h3>
                <p class="text-subtitle text-muted">Informasi tentang Ubah profil tenaga kerja</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url ('tenagakerja')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Ubah Profil Tenaga Kerja
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
            @if(\Session::has('alert-success'))
            <div class="alert alert-light-success color-success alert-dismissible show fade"><i class="bi bi-check-circle"></i>
                {{Session::get('alert-success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif  
    <div class="page-content">
        <section class="row">
            <div class="col-12">
                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Ubah Profil</h5>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="akun-tab" data-bs-toggle="tab" href="#dataAkun" role="tab" aria-controls="home" aria-selected="false">Data akun</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="pribadi-tab" data-bs-toggle="tab" href="#dataPribadi" role="tab" aria-controls="profile" aria-selected="false">Data Pribadi</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="keluarga-tab" data-bs-toggle="tab" href="#dataKeluarga" role="tab" aria-controls="contact" aria-selected="true">Data Keluarga</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="pddkFormal-tab" data-bs-toggle="tab" href="#pendidikanFormal" role="tab" aria-controls="contact" aria-selected="true">Pendidikan Formal</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="pddkNonFormal-tab" data-bs-toggle="tab" href="#pendidikanNonFormal" role="tab" aria-controls="contact" aria-selected="true">Pendidikan Non Formal</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="keterampilan-tab" data-bs-toggle="tab" href="#keterampilan" role="tab" aria-controls="contact" aria-selected="true">Keterampilan</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="pengalaman-tab" data-bs-toggle="tab" href="#pengalamanKerja" role="tab" aria-controls="contact" aria-selected="true">Pengalaman Kerja</a>
                                    </li>
                                    
                                </ul>
                                <hr>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade  active show" id="dataAkun" role="tabpanel" aria-labelledby="akun-tab">
                                        <form class="form form-horizontal" enctype="multipart/form-data" action="AksiUbahTenagakerja{{$datas->id_tenagaKerja}}" method="post">
                                            {{csrf_field()}}
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <table>
                                                            <tr height="50">
                                                                <td><label><strong>Nomor KTP</strong></label></label></td>
                                                                <td>&emsp;</td>
                                                                <td width="400"><input type="text" id="no_ktp" class="form-control" name="no_ktp" placeholder="Nomor KTP" value="{{$datas->no_ktp}}"></td>
                                                            </tr>
                                                            <tr height="50">
                                                                <td><label><strong>Nama Tenaga Kerja</strong></label></td>
                                                                <td>&emsp;</td>
                                                                <td><input type="text" id="nama" class="form-control" name="nama_tenagaKerja" placeholder="Nama Tenaga Kerja" value="{{$datas->nama_tenagaKerja}}"></td>
                                                            </tr>
                                                            <tr height="50">
                                                                <td><label><strong>Email</strong></label></td>
                                                                <td>&emsp;</td>
                                                                <td><input type="email" id="email" class="form-control" name="email" placeholder="Email" value="{{$datas->email}}"></td>
                                                            </tr>
                                                            <tr height="50">
                                                                <td><label><strong>Password</strong></label></td>
                                                                <td>&emsp;</td>
                                                                <td><input type="password" id="password" class="form-control" name="password" placeholder="Password"></td>
                                                            </tr>
                                                            <tr height="50"> 
                                                                <td><label><strong>Area</strong></label></td>
                                                                <td>&emsp;</td>
                                                                <td>
                                                                    <div class="panel-body">                            

                                                                        <label>Country</label>
                                                    
                                                                        <select id='sel_depart' name='sel_depart'>
                                                    
                                                                            <option value='0'>-- Select department --</option>
 
                                                                            <!-- Read Departments -->
                                                                            @foreach($provinsi['data'] as $department)
                                                                              <option value='{{ $department->id }}'>{{ $department->nama_provinsi }}</option>
                                                                            @endforeach
                                                                     
                                                                         </select>
                                                    
                                                                        <br>
                                                    
                                                    
                                                                        <label>State</label>
                                                    
                                                                            <select id='sel_emp' name='sel_emp'>
                                                                                <option value='0'>-- Select Employee --</option>
                                                                            </select>
                                                    
                                                                        <br>
                                                    
                                                    
                                                                        <label>City</label>
                                                    
                                                                            <select name="area" id="area">
                                                    
                                                                                <option value="">NA</option>
                                                    
                                                                            </select>
                                                    
                                                                    </div>
                                                                    <input type="text" id="area1" class="form-control" name="area1" placeholder="Area">
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <center>
                                                            <img class="rounded-circle img-responsive mt-2" width="128" height="128" 
                                                            @if ($datas->foto_profil == "")
                                                                src="{{ asset('pengguna/assets/images/faces/tidakadagambar.png')}}"
                                                            @else
                                                                src="{{ url('pengguna/assets/images/foto_profil/'.$datas->foto_profil)}}"
                                                            @endif
                                                            >
                                                            <br><br>
                                                            <div class="input-group mb-3">
                                                                <input type="file" name="foto_profil" class="form-control">
                                                            </div>
                                                        </center>
                                                        <small class="text-success">* masukkan berupa gambar</small><br>
                                                        <small class="text-success">* foto formal (foto akan muncul di formulir lamaran kerja)</small><br>
                                                        <small class="text-success">* ukuran kurang dari 2 mb</small>

                                                    </div>
                                                    
                                                </div>
                                                <br>
                                                <div class="col-sm-12 d-flex justify-content-left">
                                                    <button type="submit" class="btn btn-primary me-1 mb-1">Ubah</button>
                                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                </div>
                                            </div>
                                        </form>
                                        
                                    </div>
                                    <div class="tab-pane fade" id="dataPribadi" role="tabpanel" aria-labelledby="pribadi-tab">
                                        @if($countDataPribadi == !null)
                                        <form enctype="multipart/form-data" class="form form-horizontal" action="AksiUbahDataPribadi{{$dataPribadi->id_data_pribadi}}" method="post">
                                            {{csrf_field()}}
                                            <div class="form-body">
                                                <div class="row">
                                                    <input type="text" name="id_tenagaKerja" value="{{$id_tenagaKerja}}" hidden>
                                                    @if ($errors->has('id_tenagaKerja'))
                                                        <span class="text-danger"><p class="text-right">* {{ $errors->first('id_tenagaKerja') }}</p></span>
                                                    @endif

                                                    <input type="text" name="no_ktp" value="{{$datas->no_ktp}}" hidden>
                                                    @if ($errors->has('no_ktp'))
                                                        <span class="text-danger"><p class="text-right">* {{ $errors->first('no_ktp') }}</p></span>
                                                    @endif

                                                    <input type="text" name="foto" value="{{$datas->foto_profil}}" hidden>
                                                    @if ($errors->has('foto'))
                                                        <span class="text-danger"><p class="text-right">* {{ $errors->first('foto') }}</p></span>
                                                    @endif

                                                    <div class="col-md-4">
                                                        <label><strong>Nama Lengkap</strong></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap" value="{{$dataPribadi->nama_lengkap}}">
                                                    </div>
                                                    @if ($errors->has('nama_lengkap'))
                                                        <span class="text-danger"><p class="text-right">* {{ $errors->first('nama_lengkap') }}</p></span>
                                                    @endif

                                                    <div class="col-md-4">
                                                        <label><strong>Nama Panggilan</strong></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" class="form-control" name="nama_panggilan" placeholder="Nama Panggilan" value="{{$dataPribadi->nama_panggilan}}">
                                                    </div>
                                                    @if ($errors->has('nama_panggilan'))
                                                        <span class="text-danger"><p class="text-right">* {{ $errors->first('nama_panggilan') }}</p></span>
                                                    @endif

                                                    <div class="col-md-4">
                                                        <label><strong>Tempat Tanggal Lahir</strong></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir" value="{{$dataPribadi->tempat_lahir}}">
                                                        <input type="date" class="form-control" name="tanggal_lahir" value="{{$dataPribadi->tanggal_lahir}}">
                                                    </div>
                                                    @if ($errors->has('tempat_lahir'))
                                                        <span class="text-danger"><p class="text-right">* {{ $errors->first('tempat_lahir') }}</p></span>
                                                    @endif
                                                    @if ($errors->has('tanggal_lahir'))
                                                        <span class="text-danger"><p class="text-right">* {{ $errors->first('tanggal_lahir') }}</p></span>
                                                    @endif

                                                    <div class="col-md-4">
                                                        <label><strong>Alamat Rumah (Sekarang)</strong></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <textarea class="form-control" name="alamat_rumah" placeholder="Alamat Rumah"> {{$dataPribadi->alamat_rumah}}</textarea>
                                                    </div>
                                                    @if ($errors->has('alamat_rumah'))
                                                        <span class="text-danger"><p class="text-right">* {{ $errors->first('alamat_rumah') }}</p></span>
                                                    @endif

                                                    <div class="col-md-4">
                                                        <label><strong>Nomor Telepon</strong></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" class="form-control" name="no_telp" placeholder="Nomor Telepon" value="{{$dataPribadi->no_telp}}">
                                                    </div>
                                                    @if ($errors->has('no_telp'))
                                                        <span class="text-danger"><p class="text-right">* {{ $errors->first('no_telp') }}</p></span>
                                                    @endif

                                                    <div class="col-md-4">
                                                        <label><strong>Agama</strong></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" class="form-control" name="agama" placeholder="Agama" value="{{$dataPribadi->agama}}">
                                                    </div>
                                                    @if ($errors->has('agama'))
                                                        <span class="text-danger"><p class="text-right">* {{ $errors->first('agama') }}</p></span>
                                                    @endif

                                                    <div class="col-md-4">
                                                        <label><strong>Kewarganegaraan</strong></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" class="form-control" name="kewarganegaraan" placeholder="Kewarganegaraan" value="{{$dataPribadi->kewarganegaraan}}">
                                                    </div>
                                                    @if ($errors->has('kewarganegaraan'))
                                                        <span class="text-danger"><p class="text-right">* {{ $errors->first('kewarganegaraan') }}</p></span>
                                                    @endif

                                                    <div class="col-md-4">
                                                        <label><strong>Anak Ke-</strong></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" class="form-control" name="anak_ke" placeholder="Anak Ke-" value="{{$dataPribadi->anak_ke}}">
                                                    </div>
                                                    @if ($errors->has('anak_ke'))
                                                        <span class="text-danger"><p class="text-right">* {{ $errors->first('anak_ke') }}</p></span>
                                                    @endif

                                                    <div class="col-md-4">
                                                        <label><strong>Nama Ayah Kandung</strong></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" class="form-control" name="nama_ayah_kandung" placeholder="Nama Ayah Kandung" value="{{$dataPribadi->nama_ayah_kandung}}">
                                                    </div>
                                                    @if ($errors->has('nama_ayah_kandung'))
                                                        <span class="text-danger"><p class="text-right">* {{ $errors->first('nama_ayah_kandung') }}</p></span>
                                                    @endif

                                                    <div class="col-md-4">
                                                        <label><strong>Nama Ibu Kandung</strong></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" class="form-control" name="nama_ibu_kandung" placeholder="Nama Ibu Kandung" value="{{$dataPribadi->nama_ibu_kandung}}">
                                                    </div>
                                                    @if ($errors->has('nama_ibu_kandung'))
                                                        <span class="text-danger"><p class="text-right">* {{ $errors->first('nama_ibu_kandung') }}</p></span>
                                                    @endif

                                                    <div class="col-md-4">
                                                        <label><strong>Status Menikah</strong></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="status_menikah" id="status_menikah1" value="Belum Menikah" {{ ($dataPribadi->status_menikah == "Belum Menikah") ? 'checked' : ''}}>
                                                            <label class="form-check-label" for="status_menikah1">
                                                                Belum Menikah
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="status_menikah" id="status_menikah2" value="Menikah" {{ ($dataPribadi->status_menikah == "Menikah") ? 'checked' : ''}}>
                                                            <label class="form-check-label" for="status_menikah2">
                                                                Menikah
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="status_menikah" id="status_menikah3" value="Duda/Janda/Bercerai" {{ ($dataPribadi->status_menikah == "Duda/Janda/Bercerai") ? 'checked' : ''}}>
                                                            <label class="form-check-label" for="status_menikah3">
                                                                Duda/Janda/Bercerai
                                                            </label>
                                                        </div>
                                                    </div>
                                                    @if ($errors->has('status_menikah'))
                                                        <span class="text-danger"><p class="text-right">* {{ $errors->first('status_menikah') }}</p></span>
                                                    @endif

                                                    <div class="col-md-4">
                                                        <label><strong>Status Kepemilikan Rumah</strong></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="status_kepemilikan_rumah" id="status_kepemilikan_rumah1" value="Orang Tua" {{ ($dataPribadi->status_kepemilikan_rumah == "Orang Tua") ? 'checked' : ''}}>
                                                            <label class="form-check-label" for="status_kepemilikan_rumah1">
                                                                Orang Tua
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="status_kepemilikan_rumah" id="status_kepemilikan_rumah2" value="Pribadi" {{ ($dataPribadi->status_kepemilikan_rumah == "Pribadi") ? 'checked' : ''}}>
                                                            <label class="form-check-label" for="status_kepemilikan_rumah2">
                                                                Pribadi
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="status_kepemilikan_rumah" id="status_kepemilikan_rumah3" value="Kontrak/Sewa" {{ ($dataPribadi->status_kepemilikan_rumah == "Kontrak/Sewa") ? 'checked' : ''}}>
                                                            <label class="form-check-label" for="status_kepemilikan_rumah3">
                                                                Kontrak/Sewa
                                                            </label>
                                                        </div>
                                                    </div>
                                                    @if ($errors->has('status_kepemilikan_rumah'))
                                                        <span class="text-danger"><p class="text-right">* {{ $errors->first('status_kepemilikan_rumah') }}</p></span>
                                                    @endif

                                                    <div class="col-md-4">
                                                        <label><strong>Transportasi</strong></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="transportasi" id="transportasi1" value="Mobil" {{ ($dataPribadi->transportasi == "Mobil") ? 'checked' : ''}}>
                                                            <label class="form-check-label" for="transportasi1">
                                                                Mobil
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="transportasi" id="transportasi2" value="Motor" {{ ($dataPribadi->transportasi == "Motor") ? 'checked' : ''}}>
                                                            <label class="form-check-label" for="transportasi2">
                                                                Motor
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="transportasi" id="transportasi3" value="Umum" {{ ($dataPribadi->transportasi == "Umum") ? 'checked' : ''}}>
                                                            <label class="form-check-label" for="transportasi3">
                                                                Umum
                                                            </label>
                                                        </div>
                                                    </div>
                                                    @if ($errors->has('transportasi'))
                                                        <span class="text-danger"><p class="text-right">* {{ $errors->first('transportasi') }}</p></span>
                                                    @endif

                                                    
                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form> 

                                        @else
                                            <center>
                                                <p>Data Pribadi Belum Diisi</p>

                                                <!-- Button trigger for Success theme modal -->
                                                <button type="button" class="btn btn-success"
                                                    data-bs-toggle="modal" data-bs-target="#pribadi">
                                                    Buat Data Pribadi
                                                </button>
                                                <hr><br>
                                            </center>
                                        @endif
                                        <div class="modal-success me-1 mb-1 d-inline-block">
                                            <div class="modal fade" id="pribadi" tabindex="-1" aria-labelledby="exampleModalScrollableTitle" style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-success">
                                                            <h5 class="modal-title white" id="myModalLabel110">
                                                                Tambah Data Pribadi
                                                            </h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form enctype="multipart/form-data" class="form form-horizontal" action="{{url('tenagakerja/AksiTambahDataPribadi')}}" method="post">
                                                                {{csrf_field()}}
                                                                <div class="form-body">
                                                                    <div class="row">
                                                                        <input type="text" name="id_tenagaKerja" value="{{$id_tenagaKerja}}" hidden>
                                                                        @if ($errors->has('id_tenagaKerja'))
                                                                            <span class="text-danger"><p class="text-right">* {{ $errors->first('id_tenagaKerja') }}</p></span>
                                                                        @endif

                                                                        <input type="text" name="no_ktp" value="{{$datas->no_ktp}}" hidden>
                                                                        @if ($errors->has('no_ktp'))
                                                                            <span class="text-danger"><p class="text-right">* {{ $errors->first('no_ktp') }}</p></span>
                                                                        @endif

                                                                        <input type="text" name="foto" value="{{$datas->foto_profil}}" hidden>
                                                                        @if ($errors->has('foto'))
                                                                            <span class="text-danger"><p class="text-right">* {{ $errors->first('foto') }}</p></span>
                                                                        @endif
                                                                        
                                                                        <div class="col-md-4">
                                                                            <label><strong>Nama Lengkap</strong></label>
                                                                        </div>
                                                                        <div class="col-md-8 form-group">
                                                                            <input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap">
                                                                        </div>
                                                                        @if ($errors->has('nama_lengkap'))
                                                                            <span class="text-danger"><p class="text-right">* {{ $errors->first('nama_lengkap') }}</p></span>
                                                                        @endif
                    
                                                                        <div class="col-md-4">
                                                                            <label><strong>Nama Panggilan</strong></label>
                                                                        </div>
                                                                        <div class="col-md-8 form-group">
                                                                            <input type="text" class="form-control" name="nama_panggilan" placeholder="Nama Panggilan">
                                                                        </div>
                                                                        @if ($errors->has('nama_panggilan'))
                                                                            <span class="text-danger"><p class="text-right">* {{ $errors->first('nama_panggilan') }}</p></span>
                                                                        @endif
                    
                                                                        <div class="col-md-4">
                                                                            <label><strong>Tempat Tanggal Lahir</strong></label>
                                                                        </div>
                                                                        <div class="col-md-8 form-group">
                                                                            <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir">
                                                                            <input type="date" class="form-control" name="tanggal_lahir">
                                                                        </div>
                                                                        @if ($errors->has('tempat_lahir'))
                                                                            <span class="text-danger"><p class="text-right">* {{ $errors->first('tempat_lahir') }}</p></span>
                                                                        @endif
                                                                        @if ($errors->has('tanggal_lahir'))
                                                                            <span class="text-danger"><p class="text-right">* {{ $errors->first('tanggal_lahir') }}</p></span>
                                                                        @endif
                    
                                                                        <div class="col-md-4">
                                                                            <label><strong>Alamat Rumah (Sekarang)</strong></label>
                                                                        </div>
                                                                        <div class="col-md-8 form-group">
                                                                            <textarea class="form-control" name="alamat_rumah" placeholder="Alamat Rumah"></textarea>
                                                                        </div>
                                                                        @if ($errors->has('alamat_rumah'))
                                                                            <span class="text-danger"><p class="text-right">* {{ $errors->first('alamat_rumah') }}</p></span>
                                                                        @endif
                    
                                                                        <div class="col-md-4">
                                                                            <label><strong>Nomor Telepon</strong></label>
                                                                        </div>
                                                                        <div class="col-md-8 form-group">
                                                                            <input type="text" class="form-control" name="no_telp" placeholder="Nomor Telepon">
                                                                        </div>
                                                                        @if ($errors->has('no_telp'))
                                                                            <span class="text-danger"><p class="text-right">* {{ $errors->first('no_telp') }}</p></span>
                                                                        @endif
                    
                                                                        <div class="col-md-4">
                                                                            <label><strong>Agama</strong></label>
                                                                        </div>
                                                                        <div class="col-md-8 form-group">
                                                                            <input type="text" class="form-control" name="agama" placeholder="Agama">
                                                                        </div>
                                                                        @if ($errors->has('agama'))
                                                                            <span class="text-danger"><p class="text-right">* {{ $errors->first('agama') }}</p></span>
                                                                        @endif
                    
                                                                        <div class="col-md-4">
                                                                            <label><strong>Kewarganegaraan</strong></label>
                                                                        </div>
                                                                        <div class="col-md-8 form-group">
                                                                            <input type="text" class="form-control" name="kewarganegaraan" placeholder="Kewarganegaraan">
                                                                        </div>
                                                                        @if ($errors->has('kewarganegaraan'))
                                                                            <span class="text-danger"><p class="text-right">* {{ $errors->first('kewarganegaraan') }}</p></span>
                                                                        @endif
                    
                                                                        <div class="col-md-4">
                                                                            <label><strong>Anak Ke-</strong></label>
                                                                        </div>
                                                                        <div class="col-md-8 form-group">
                                                                            <input type="text" class="form-control" name="anak_ke" placeholder="Anak Ke-">
                                                                        </div>
                                                                        @if ($errors->has('anak_ke'))
                                                                            <span class="text-danger"><p class="text-right">* {{ $errors->first('anak_ke') }}</p></span>
                                                                        @endif
                    
                                                                        <div class="col-md-4">
                                                                            <label><strong>Nama Ayah Kandung</strong></label>
                                                                        </div>
                                                                        <div class="col-md-8 form-group">
                                                                            <input type="text" class="form-control" name="nama_ayah_kandung" placeholder="Nama Ayah Kandung">
                                                                        </div>
                                                                        @if ($errors->has('nama_ayah_kandung'))
                                                                            <span class="text-danger"><p class="text-right">* {{ $errors->first('nama_ayah_kandung') }}</p></span>
                                                                        @endif
                    
                                                                        <div class="col-md-4">
                                                                            <label><strong>Nama Ibu Kandung</strong></label>
                                                                        </div>
                                                                        <div class="col-md-8 form-group">
                                                                            <input type="text" class="form-control" name="nama_ibu_kandung" placeholder="Nama Ibu Kandung">
                                                                        </div>
                                                                        @if ($errors->has('nama_ibu_kandung'))
                                                                            <span class="text-danger"><p class="text-right">* {{ $errors->first('nama_ibu_kandung') }}</p></span>
                                                                        @endif
                    
                                                                        <div class="col-md-4">
                                                                            <label><strong>Status Menikah</strong></label>
                                                                        </div>
                                                                        <div class="col-md-8 form-group">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="status_menikah" id="status_menikah1" value="Belum Menikah">
                                                                                <label class="form-check-label" for="status_menikah1">
                                                                                    Belum Menikah
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="status_menikah" id="status_menikah2" value="Menikah">
                                                                                <label class="form-check-label" for="status_menikah2">
                                                                                    Menikah
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="status_menikah" id="status_menikah3" value="Duda/Janda/Bercerai">
                                                                                <label class="form-check-label" for="status_menikah3">
                                                                                    Duda/Janda/Bercerai
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        @if ($errors->has('status_menikah'))
                                                                            <span class="text-danger"><p class="text-right">* {{ $errors->first('status_menikah') }}</p></span>
                                                                        @endif
                    
                                                                        <div class="col-md-4">
                                                                            <label><strong>Status Kepemilikan Rumah</strong></label>
                                                                        </div>
                                                                        <div class="col-md-8 form-group">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="status_kepemilikan_rumah" id="status_kepemilikan_rumah1" value="Orang Tua">
                                                                                <label class="form-check-label" for="status_kepemilikan_rumah1">
                                                                                    Orang Tua
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="status_kepemilikan_rumah" id="status_kepemilikan_rumah2" value="Pribadi">
                                                                                <label class="form-check-label" for="status_kepemilikan_rumah2">
                                                                                    Pribadi
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="status_kepemilikan_rumah" id="status_kepemilikan_rumah3" value="Kontrak/Sewa">
                                                                                <label class="form-check-label" for="status_kepemilikan_rumah3">
                                                                                    Kontrak/Sewa
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        @if ($errors->has('status_kepemilikan_rumah'))
                                                                            <span class="text-danger"><p class="text-right">* {{ $errors->first('status_kepemilikan_rumah') }}</p></span>
                                                                        @endif
                    
                                                                        <div class="col-md-4">
                                                                            <label><strong>Transportasi</strong></label>
                                                                        </div>
                                                                        <div class="col-md-8 form-group">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="transportasi" id="transportasi1" value="Mobil">
                                                                                <label class="form-check-label" for="transportasi1">
                                                                                    Mobil
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="transportasi" id="transportasi2" value="Motor">
                                                                                <label class="form-check-label" for="transportasi2">
                                                                                    Motor
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="transportasi" id="transportasi3" value="Umum">
                                                                                <label class="form-check-label" for="transportasi3">
                                                                                    Umum
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        @if ($errors->has('transportasi'))
                                                                            <span class="text-danger"><p class="text-right">* {{ $errors->first('transportasi') }}</p></span>
                                                                        @endif
                    
                                                                        <hr>
                                                                        <div class="col-sm-12 d-flex justify-content-end">
                                                                            
                                                                            <button type="submit" class="btn btn-success me-1 mb-1">Kirim</button>
                                                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                                                           
                                    </div>
                                    <div class="tab-pane fade" id="dataKeluarga" role="tabpanel" aria-labelledby="keluarga-tab">
                                        <center>
                                            <!-- Button trigger for Success theme modal -->
                                            <button type="button" class="btn btn-success"
                                                data-bs-toggle="modal" data-bs-target="#keluarga">
                                                Tambah Data Keluarga
                                            </button>
                                            <hr><br>
                                        </center>
                                        @if($countDataKeluarga == !null)
                                        @foreach($dataKeluarga as $keluarga)
                                        <form enctype="multipart/form-data" class="form form-horizontal" action="AksiUbahDataKeluarga{{$keluarga->id_data_keluarga}}" method="post">
                                            {{csrf_field()}}
                                            <div class="form-body">
                                                <div class="row">
                                                    <input type="text" name="id_tenagaKerja" value="{{$id_tenagaKerja}}" hidden>
                                                    <div class="col-md-4">
                                                        <label><strong>Status Keluarga</strong></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <select class="form-select" name="status_keluarga" id="basicSelect">
                                                            <option value="">Masukkan Status Keluarga</option>
                                                            <option value="Suami" {{ ($keluarga->status_keluarga == "Suami") ? 'selected' : ''}}>Suami</option>
                                                            <option value="Istri" {{ ($keluarga->status_keluarga == "Istri") ? 'selected' : ''}}>Istri</option>
                                                            <option value="Anak" {{ ($keluarga->status_keluarga == "Anak") ? 'selected' : ''}}>Anak</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label><strong>Nama Keluarga</strong></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" class="form-control" name="nama_keluarga" placeholder="Nama Keluarga" value="{{$keluarga->nama_keluarga}}">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label><strong>Pekerjaan</strong></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" class="form-control" name="pekerjaan" placeholder="Pekerjaan" value="{{$keluarga->pekerjaan}}">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label><strong>Tempat Tanggal Lahir</strong></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir" value="{{$keluarga->tempat_lahir}}">
                                                        <input type="date" class="form-control" name="tanggal_lahir" value="{{$keluarga->tanggal_lahir}}">
                                                    </div>
                                                    
                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                        <button type="submit" class="btn btn-primary me-1 mb-1">Ubah</button>
                                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                        <a href="/tenagakerja/HapusDataKeluarga{{$keluarga->id_data_keluarga}}" class="btn btn-danger me-1 mb-1" onclick="return confirm('Anda yakin mau menghapus item ini ?')">
                                                            Hapus
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <hr><br>
                                        @endforeach
                                        @else
                                            <center>
                                            <br>
                                            <p>Data Keluarga masih kosong</p>
                                            </center>
                                        @endif

                                        <div class="modal-success me-1 mb-1 d-inline-block">
                                            <!--Success theme Modal -->
                                            <div class="modal fade text-left" id="keluarga" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-success">
                                                            <h5 class="modal-title white" id="myModalLabel110">
                                                                Tambah Data Keluarga
                                                            </h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                        <form enctype="multipart/form-data" class="form form-horizontal" action="{{url('tenagakerja/AksiTambahDataKeluarga')}}" method="post">
                                                           {{csrf_field()}}
                                                            <div class="modal-body">
                                                                <div class="form-body">
                                                                    <div class="row">
                                                                        <input type="text" name="id_tenagaKerja" value="{{$id_tenagaKerja}}" hidden>
                                                                        <div class="col-md-4">
                                                                            <label><strong>Status Keluarga</strong></label>
                                                                        </div>
                                                                        <div class="col-md-8 form-group">
                                                                            <select class="form-select" name="status_keluarga" id="basicSelect">
                                                                                <option value="">Masukkan Status Keluarga</option>
                                                                                <option value="Suami">Suami</option>
                                                                                <option value="Istri">Istri</option>
                                                                                <option value="Anak">Anak</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <label><strong>Nama Keluarga</strong></label>
                                                                        </div>
                                                                        <div class="col-md-8 form-group">
                                                                            <input type="text" class="form-control" name="nama_keluarga" placeholder="Nama Keluarga">
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <label><strong>Pekerjaan</strong></label>
                                                                        </div>
                                                                        <div class="col-md-8 form-group">
                                                                            <input type="text" class="form-control" name="pekerjaan" placeholder="Pekerjaan">
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <label><strong>Tempat Tanggal Lahir</strong></label>
                                                                        </div>
                                                                        <div class="col-md-8 form-group">
                                                                            <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir">
                                                                            <input type="date" class="form-control" name="tanggal_lahir" >
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-success ml-1">
                                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Tambah</span>
                                                                </button>
                                                                
                                                                <button type="reset" class="btn btn-light-secondary">
                                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Reset</span>
                                                                </button>                                                               
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pendidikanFormal" role="tabpanel" aria-labelledby="pddkFormal-tab">
                                        <center>
                                            <!-- Button trigger for Success theme modal -->
                                            <button type="button" class="btn btn-success"
                                                data-bs-toggle="modal" data-bs-target="#PddkFormal">
                                                Tambah Pendidikan Formal
                                            </button>
                                            <hr><br>
                                        </center>
                                        @if($countPddkFormal == !null)
                                        @foreach($pddkFormal as $formal)
                                        <form enctype="multipart/form-data" class="form form-horizontal" action="AksiUbahPddkFormal{{$formal->id_pendFormal}}" method="post">
                                            {{csrf_field()}}
                                            <div class="form-body">
                                                <div class="row">
                                                    <input type="text" name="id_tenagaKerja" value="{{$id_tenagaKerja}}" hidden>
                                                    <div class="col-md-4">
                                                        <label><strong>Pendidikan</strong></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <select class="form-select" name="pendidikan" id="basicSelect">
                                                            <option value="">Masukkan Pendidikan</option>
                                                            <option value="SMU/Sederajat" {{ ($formal->pendidikan == "SMU/Sederajat") ? 'selected' : ''}}>SMU/ Sederajat</option>
                                                            <option value="Akademi/Diploma" {{ ($formal->pendidikan == "Akademi/Diploma") ? 'selected' : ''}}>Akademi/Diploma</option>
                                                            <option value="Universitas" {{ ($formal->pendidikan == "Universitas") ? 'selected' : ''}}>Universitas</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label><strong>Nama Institusi</strong></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" class="form-control" name="nama_institusi" placeholder="Nama Institusi" value="{{$formal->nama_institusi}}">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label><strong>Jurusan</strong></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" class="form-control" name="jurusan" placeholder="Jurusan" value="{{$formal->jurusan}}">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label><strong>Periode</strong></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" class="form-control" name="periode_masuk" placeholder="Periode Masuk" value="{{$formal->periode_masuk}}">
                                                        <input type="text" class="form-control" name="periode_keluar" placeholder="Periode Keluar" value="{{$formal->periode_keluar}}">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label><strong>Lokasi</strong></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" class="form-control" name="lokasi" placeholder="Lokasi" value="{{$formal->lokasi}}">
                                                    </div>
                                                   
                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                        <button type="submit" class="btn btn-primary me-1 mb-1">Ubah</button>
                                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                        <a href="/tenagakerja/HapusPddkFormal{{$formal->id_pendFormal}}" class="btn btn-danger me-1 mb-1" onclick="return confirm('Anda yakin mau menghapus item ini ?')">
                                                            Hapus
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <hr><br>
                                        @endforeach
                                        @else
                                            <center>
                                            
                                            <p>Pendidikan Formal masih kosong</p>
                                            </center>
                                        @endif

                                        <div class="modal-success me-1 mb-1 d-inline-block">
                                            <!--Success theme Modal -->
                                            <div class="modal fade text-left" id="PddkFormal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-success">
                                                            <h5 class="modal-title white" id="myModalLabel110">
                                                                Tambah Pendidikan Formal
                                                            </h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                        <form enctype="multipart/form-data" class="form form-horizontal" action="{{url('tenagakerja/AksiTambahPddkFormal')}}" method="post">
                                                            {{csrf_field()}}
                                                            <div class="modal-body">
                                                                <div class="form-body">
                                                                    <div class="row">
                                                                        <input type="text" name="id_tenagaKerja" value="{{$id_tenagaKerja}}" hidden>
                                                                        <div class="col-md-4">
                                                                            <label><strong>Pendidikan</strong></label>
                                                                        </div>
                                                                        <div class="col-md-8 form-group">
                                                                            <select class="form-select" name="pendidikan" id="basicSelect">
                                                                                <option value="">Masukkan Pendidikan</option>
                                                                                <option value="SMU/Sederajat">SMU/ Sederajat</option>
                                                                                <option value="Akademi/Diploma">Akademi/Diploma</option>
                                                                                <option value="Universitas">Universitas</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <label><strong>Nama Institusi</strong></label>
                                                                        </div>
                                                                        <div class="col-md-8 form-group">
                                                                            <input type="text" class="form-control" name="nama_institusi" placeholder="Nama Institusi">
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <label><strong>Jurusan</strong></label>
                                                                        </div>
                                                                        <div class="col-md-8 form-group">
                                                                            <input type="text" class="form-control" name="jurusan" placeholder="Jurusan">
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <label><strong>Periode</strong></label>
                                                                        </div>
                                                                        <div class="col-md-8 form-group">
                                                                            <input type="text" class="form-control" name="periode_masuk" placeholder="Periode Masuk">
                                                                            <input type="text" class="form-control" name="periode_keluar" placeholder="Periode Keluar">
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <label><strong>Lokasi</strong></label>
                                                                        </div>
                                                                        <div class="col-md-8 form-group">
                                                                            <input type="text" class="form-control" name="lokasi" placeholder="Lokasi">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-success ml-1">
                                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Tambah</span>
                                                                </button>
                                                                
                                                                <button type="reset" class="btn btn-light-secondary">
                                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Reset</span>
                                                                </button>                                                               
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="pendidikanNonFormal" role="tabpanel" aria-labelledby="pddkNonFormal-tab">
                                        <center>
                                            <!-- Button trigger for Success theme modal -->
                                            <button type="button" class="btn btn-success"
                                                data-bs-toggle="modal" data-bs-target="#PddkNonFormal">
                                                Tambah Pendidikan Non Formal
                                            </button>
                                            <hr><br>
                                        </center>
                                        @if($countPddkNonFormal == !null)
                                        @foreach($pddkNonFormal as $nonFormal)
                                        <form enctype="multipart/form-data" class="form form-horizontal" action="AksiUbahPddkNonFormal{{$nonFormal->id_pendNonFormal}}" method="post">
                                            {{csrf_field()}}
                                                <div class="form-body">
                                                    <div class="row">
                                                        <input type="text" name="id_tenagaKerja" value="{{$id_tenagaKerja}}" hidden>
                                                        @if ($errors->has('id_tenagaKerja'))
                                                            <span class="text-danger"><p class="text-right">* {{ $errors->first('id_tenagaKerja') }}</p></span>
                                                        @endif
                                                        
                                                        <div class="col-md-4">
                                                            <label><strong>Kursus / Training</strong></label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" class="form-control" name="kursus" placeholder="Kursus / Training" value="{{$nonFormal->kursus}}">
                                                        </div>
                                                        @if ($errors->has('kursus'))
                                                            <span class="text-danger"><p class="text-right">* {{ $errors->first('kursus') }}</p></span>
                                                        @endif

                                                        <div class="col-md-4">
                                                            <label><strong>Nama Institusi</strong></label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" class="form-control" name="nama_institusi" placeholder="Nama Institusi" value="{{$nonFormal->nama_institusi}}">
                                                        </div>
                                                        @if ($errors->has('nama_institusi'))
                                                            <span class="text-danger"><p class="text-right">* {{ $errors->first('nama_institusi') }}</p></span>
                                                        @endif

                                                        <div class="col-md-4">
                                                            <label><strong>Periode</strong></label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" class="form-control" name="periode_masuk" placeholder="Periode Masuk" value="{{$nonFormal->periode_masuk}}">
                                                            <input type="text" class="form-control" name="periode_keluar" placeholder="Periode Keluar" value="{{$nonFormal->periode_keluar}}">
                                                        </div>
                                                        @if ($errors->has('periode_masuk'))
                                                            <span class="text-danger"><p class="text-right">* {{ $errors->first('periode_masuk') }}</p></span>
                                                        @endif
                                                        @if ($errors->has('periode_keluar'))
                                                            <span class="text-danger"><p class="text-right">* {{ $errors->first('periode_keluar') }}</p></span>
                                                        @endif

                                                        <div class="col-md-4">
                                                            <label><strong>Lokasi</strong></label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" class="form-control" name="lokasi" placeholder="Lokasi" value="{{$nonFormal->lokasi}}">
                                                        </div>
                                                        @if ($errors->has('lokasi'))
                                                            <span class="text-danger"><p class="text-right">* {{ $errors->first('lokasi') }}</p></span>
                                                        @endif
                                                       
                                                        <div class="col-sm-12 d-flex justify-content-end">
                                                            <button type="submit" class="btn btn-success me-1 mb-1">Ubah</button>
                                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                            <a href="/tenagakerja/HapusPddkNonFormal{{$nonFormal->id_pendNonFormal}}" class="btn btn-danger me-1 mb-1" onclick="return confirm('Anda yakin mau menghapus item ini ?')">
                                                                Hapus
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                        </form>
                                        
                                        <hr><br>
                                        @endforeach
                                        @else
                                            <center>
                                            
                                            <p>Pendidikan Non Formal masih kosong</p>
                                            </center>
                                        @endif

                                        <div class="modal-success me-1 mb-1 d-inline-block">
                                            <!--Success theme Modal -->
                                            <div class="modal fade text-left" id="PddkNonFormal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-success">
                                                            <h5 class="modal-title white" id="myModalLabel110">
                                                                Tambah Pendidikan Non Formal
                                                            </h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                        <form enctype="multipart/form-data" class="form form-horizontal" action="{{url('tenagakerja/AksiTambahPddkNonFormal')}}" method="post">
                                                            {{csrf_field()}}
                                                            <div class="modal-body">
                                                                <div class="form-body">
                                                                    <div class="row">
                                                                        <input type="text" name="id_tenagaKerja" value="{{$id_tenagaKerja}}" hidden>
                                                                        <div class="col-md-4">
                                                                            <label><strong>Kursus / Training</strong></label>
                                                                        </div>
                                                                        <div class="col-md-8 form-group">
                                                                            <input type="text" class="form-control" name="kursus" placeholder="Kursus / Training">
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <label><strong>Nama Institusi</strong></label>
                                                                        </div>
                                                                        <div class="col-md-8 form-group">
                                                                            <input type="text" class="form-control" name="nama_institusi" placeholder="Nama Institusi">
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <label><strong>Periode</strong></label>
                                                                        </div>
                                                                        <div class="col-md-8 form-group">
                                                                            <input type="text" class="form-control" name="periode_masuk" placeholder="Periode Masuk">
                                                                            <input type="text" class="form-control" name="periode_keluar" placeholder="Periode Keluar">
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <label><strong>Lokasi</strong></label>
                                                                        </div>
                                                                        <div class="col-md-8 form-group">
                                                                            <input type="text" class="form-control" name="lokasi" placeholder="Lokasi">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-success ml-1">
                                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Tambah</span>
                                                                </button>
                                                                
                                                                <button type="reset" class="btn btn-light-secondary">
                                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Reset</span>
                                                                </button>                                                               
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="keterampilan" role="tabpanel" aria-labelledby="keterampilan-tab">
                                        <center>
                                            <!-- Button trigger for Success theme modal -->
                                            <button type="button" class="btn btn-success"
                                                data-bs-toggle="modal" data-bs-target="#Keterampilan">
                                                Tambah Keterampilan
                                            </button>
                                            <hr><br>
                                        </center>
                                        @if($countKeterampilan == !null)
                                        @foreach($keterampilan as $terampil)
                                        <form enctype="multipart/form-data" class="form form-horizontal" action="AksiUbahKeterampilan{{$terampil->id_keterampilan}}" method="post">
                                            {{csrf_field()}}
                                            <div class="form-body">
                                                <div class="row">
                                                    <input type="text" name="id_tenagaKerja" value="{{$id_tenagaKerja}}" hidden>
                                                    @if ($errors->has('id_tenagaKerja'))
                                                        <span class="text-danger"><p class="text-right">* {{ $errors->first('id_tenagaKerja') }}</p></span>
                                                    @endif

                                                    <div class="col-md-4">
                                                        <label><strong>Nama Keterampilan</strong></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" class="form-control" name="nama_keterampilan" placeholder="Nama Keterampilan" value="{{$terampil->nama_keterampilan}}">
                                                    </div>
                                                    @if ($errors->has('nama_keterampilan'))
                                                        <span class="text-danger"><p class="text-right">* {{ $errors->first('nama_keterampilan') }}</p></span>
                                                    @endif

                                                    <div class="col-md-4">
                                                        <label><strong>Kemampuan</strong></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <select class="form-select" name="kemampuan" id="basicSelect">
                                                            <option value="">Masukkan Kemampuan</option>
                                                            <option value="Baik" {{ ($terampil->kemampuan == "Baik") ? 'selected' : ''}}>Baik</option>
                                                            <option value="Cukup" {{ ($terampil->kemampuan == "Cukup") ? 'selected' : ''}}>Cukup</option>
                                                            <option value="Kurang" {{ ($terampil->kemampuan == "Kurang") ? 'selected' : ''}}>Kurang</option>
                                                        </select>
                                                    </div>
                                                    @if ($errors->has('kemampuan'))
                                                        <span class="text-danger"><p class="text-right">* {{ $errors->first('kemampuan') }}</p></span>
                                                    @endif
                                                                                                      
                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                        <button type="submit" class="btn btn-primary me-1 mb-1">Ubah</button>
                                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                        <a href="/tenagakerja/HapusKeterampilan{{$terampil->id_keterampilan}}" class="btn btn-danger me-1 mb-1" onclick="return confirm('Anda yakin mau menghapus item ini ?')">
                                                            Hapus
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        
                                        <hr><br>
                                        @endforeach
                                        @else
                                            <center>
                                            
                                            <p>Keterampilan masih kosong</p>
                                            </center>
                                        @endif

                                        <div class="modal-success me-1 mb-1 d-inline-block">
                                            <!--Success theme Modal -->
                                            <div class="modal fade text-left" id="Keterampilan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-success">
                                                            <h5 class="modal-title white" id="myModalLabel110">
                                                                Tambah Keterampilan
                                                            </h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                        <form enctype="multipart/form-data" class="form form-horizontal" action="{{url('tenagakerja/AksiTambahKeterampilan')}}" method="post">
                                                            {{csrf_field()}}
                                                            <div class="modal-body">
                                                                <div class="form-body">
                                                                    <div class="row">
                                                                        <input type="text" name="id_tenagaKerja" value="{{$id_tenagaKerja}}" hidden>
                                                                        @if ($errors->has('id_tenagaKerja'))
                                                                            <span class="text-danger"><p class="text-right">* {{ $errors->first('id_tenagaKerja') }}</p></span>
                                                                        @endif
                                                                        
                                                                        <div class="col-md-4">
                                                                            <label><strong>Nama Keterampilan</strong></label>
                                                                        </div>
                                                                        <div class="col-md-8 form-group">
                                                                            <input type="text" class="form-control" name="nama_keterampilan" placeholder="Nama Keterampilan">
                                                                        </div>
                                                                        @if ($errors->has('nama_keterampilan'))
                                                                            <span class="text-danger"><p class="text-right">* {{ $errors->first('nama_keterampilan') }}</p></span>
                                                                        @endif
                    
                                                                        <div class="col-md-4">
                                                                            <label><strong>Kemampuan</strong></label>
                                                                        </div>
                                                                        <div class="col-md-8 form-group">
                                                                            <select class="form-select" name="kemampuan" id="basicSelect">
                                                                                <option value="">Masukkan Kemampuan</option>
                                                                                <option value="Baik">Baik</option>
                                                                                <option value="Cukup">Cukup</option>
                                                                                <option value="Kurang">Kurang</option>
                                                                            </select>
                                                                        </div>
                                                                        @if ($errors->has('kemampuan'))
                                                                            <span class="text-danger"><p class="text-right">* {{ $errors->first('kemampuan') }}</p></span>
                                                                        @endif
                                                                                                                          
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-success ml-1">
                                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Tambah</span>
                                                                </button>
                                                                
                                                                <button type="reset" class="btn btn-light-secondary">
                                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Reset</span>
                                                                </button>                                                               
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pengalamanKerja" role="tabpanel" aria-labelledby="pengalaman-tab">
                                        <center>
                                            <!-- Button trigger for Success theme modal -->
                                            <button type="button" class="btn btn-success"
                                                data-bs-toggle="modal" data-bs-target="#PengalamanKerja">
                                                Tambah Pengalaman Kerja
                                            </button>
                                            <hr><br>
                                        </center>
                                        @if($countPengalamanKerja == !null)
                                        @foreach($pengalamanKerja as $pengalaman)
                                        <form enctype="multipart/form-data" class="form form-horizontal" action="AksiUbahPengalamanKerja{{$pengalaman->id_pengalaman}}" method="post">
                                            {{csrf_field()}}
                                            <div class="form-body">
                                                <div class="row">
                                                    <input type="text" name="id_tenagaKerja" value="{{$id_tenagaKerja}}" hidden>
                                                        @if ($errors->has('id_tenagaKerja'))
                                                            <span class="text-danger"><p class="text-right">* {{ $errors->first('id_tenagaKerja') }}</p></span>
                                                        @endif

                                                    <div class="col-md-4">
                                                        <label><strong>Nama Perusahaan</strong></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" class="form-control" name="nama_perusahaan" placeholder="Nama Perusahaan" value="{{$pengalaman->nama_perusahaan}}">
                                                    </div>
                                                    @if ($errors->has('nama_perusahaan'))
                                                        <span class="text-danger"><p class="text-right">* {{ $errors->first('nama_perusahaan') }}</p></span>
                                                    @endif

                                                    <div class="col-md-4">
                                                        <label><strong>Periode</strong></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" class="form-control" name="periode_masuk" placeholder="Periode Masuk" value="{{$pengalaman->periode_masuk}}">
                                                        <input type="text" class="form-control" name="periode_keluar" placeholder="Periode Keluar" value="{{$pengalaman->periode_keluar}}">
                                                    </div>
                                                    @if ($errors->has('periode_masuk'))
                                                        <span class="text-danger"><p class="text-right">* {{ $errors->first('periode_masuk') }}</p></span>
                                                    @endif
                                                    @if ($errors->has('periode_keluar'))
                                                        <span class="text-danger"><p class="text-right">* {{ $errors->first('periode_keluar') }}</p></span>
                                                    @endif

                                                    <div class="col-md-4">
                                                        <label><strong>Posisi</strong></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" class="form-control" name="posisi" placeholder="Posisi" value="{{$pengalaman->posisi}}">
                                                    </div>
                                                    @if ($errors->has('posisi'))
                                                        <span class="text-danger"><p class="text-right">* {{ $errors->first('posisi') }}</p></span>
                                                    @endif

                                                    <div class="col-md-4">
                                                        <label><strong>Gaji</strong></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" class="form-control" name="gaji" placeholder="Gaji" value="{{$pengalaman->gaji}}">
                                                    </div>
                                                    @if ($errors->has('gaji'))
                                                        <span class="text-danger"><p class="text-right">* {{ $errors->first('gaji') }}</p></span>
                                                    @endif

                                                    <div class="col-md-4">
                                                        <label><strong>Alasan Berhenti</strong></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" class="form-control" name="alasan_berhenti" placeholder="Alasan Berhenti" value="{{$pengalaman->alasan_berhenti}}">
                                                    </div>
                                                    @if ($errors->has('alasan_berhenti'))
                                                        <span class="text-danger"><p class="text-right">* {{ $errors->first('alasan_berhenti') }}</p></span>
                                                    @endif
                                                    
                                                                                                      
                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                        <button type="submit" class="btn btn-primary me-1 mb-1">Ubah</button>
                                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                        <a href="/tenagakerja/HapusPengalamanKerja{{$pengalaman->id_pengalaman}}" class="btn btn-danger me-1 mb-1" onclick="return confirm('Anda yakin mau menghapus item ini ?')">
                                                            Hapus
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        
                                        <hr><br>
                                        @endforeach
                                        @else
                                            <center>
                                            
                                            <p>Pengalaman kerja masih kosong</p>
                                            </center>
                                        @endif

                                        <div class="modal-success me-1 mb-1 d-inline-block">
                                            <!--Success theme Modal -->
                                            <div class="modal fade text-left" id="PengalamanKerja" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-success">
                                                            <h5 class="modal-title white" id="myModalLabel110">
                                                                Tambah Pengalaman Kerja
                                                            </h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                        <form enctype="multipart/form-data" class="form form-horizontal" action="{{url('tenagakerja/AksiTambahPengalamanKerja')}}" method="post">
                                                            {{csrf_field()}}
                                                            <div class="modal-body">
                                                                <div class="form-body">
                                                                    <div class="row">
                                                                        <input type="text" name="id_tenagaKerja" value="{{$id_tenagaKerja}}" hidden>
                                                                            @if ($errors->has('id_tenagaKerja'))
                                                                                <span class="text-danger"><p class="text-right">* {{ $errors->first('id_tenagaKerja') }}</p></span>
                                                                            @endif
                    
                                                                        <div class="col-md-4">
                                                                            <label><strong>Nama Perusahaan</strong></label>
                                                                        </div>
                                                                        <div class="col-md-8 form-group">
                                                                            <input type="text" class="form-control" name="nama_perusahaan" placeholder="Nama Perusahaan">
                                                                        </div>
                                                                        @if ($errors->has('nama_perusahaan'))
                                                                            <span class="text-danger"><p class="text-right">* {{ $errors->first('nama_perusahaan') }}</p></span>
                                                                        @endif
                    
                                                                        <div class="col-md-4">
                                                                            <label><strong>Periode</strong></label>
                                                                        </div>
                                                                        <div class="col-md-8 form-group">
                                                                            <input type="text" class="form-control" name="periode_masuk" placeholder="Periode Masuk">
                                                                            <input type="text" class="form-control" name="periode_keluar" placeholder="Periode Keluar">
                                                                        </div>
                                                                        @if ($errors->has('periode_masuk'))
                                                                            <span class="text-danger"><p class="text-right">* {{ $errors->first('periode_masuk') }}</p></span>
                                                                        @endif
                                                                        @if ($errors->has('periode_keluar'))
                                                                            <span class="text-danger"><p class="text-right">* {{ $errors->first('periode_keluar') }}</p></span>
                                                                        @endif
                    
                                                                        <div class="col-md-4">
                                                                            <label><strong>Posisi</strong></label>
                                                                        </div>
                                                                        <div class="col-md-8 form-group">
                                                                            <input type="text" class="form-control" name="posisi" placeholder="Posisi">
                                                                        </div>
                                                                        @if ($errors->has('posisi'))
                                                                            <span class="text-danger"><p class="text-right">* {{ $errors->first('posisi') }}</p></span>
                                                                        @endif
                    
                                                                        <div class="col-md-4">
                                                                            <label><strong>Gaji</strong></label>
                                                                        </div>
                                                                        <div class="col-md-8 form-group">
                                                                            <input type="text" class="form-control" name="gaji" placeholder="Gaji">
                                                                        </div>
                                                                        @if ($errors->has('gaji'))
                                                                            <span class="text-danger"><p class="text-right">* {{ $errors->first('gaji') }}</p></span>
                                                                        @endif
                    
                                                                        <div class="col-md-4">
                                                                            <label><strong>Alasan Berhenti</strong></label>
                                                                        </div>
                                                                        <div class="col-md-8 form-group">
                                                                            <input type="text" class="form-control" name="alasan_berhenti" placeholder="Alasan Berhenti">
                                                                        </div>
                                                                        @if ($errors->has('alasan_berhenti'))
                                                                            <span class="text-danger"><p class="text-right">* {{ $errors->first('alasan_berhenti') }}</p></span>
                                                                        @endif
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-success ml-1">
                                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Tambah</span>
                                                                </button>
                                                                
                                                                <button type="reset" class="btn btn-light-secondary">
                                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Reset</span>
                                                                </button>                                                               
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
                    </div>
                </div>
            </div>
        </section>
    </div>

</div>


@endsection