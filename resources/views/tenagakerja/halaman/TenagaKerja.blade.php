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
                                <img src="assets/images/faces/1.jpg" alt="Face 1">
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
                                        <form class="form form-horizontal" enctype="multipart/form-data" action="/AksiUbahTenagakerja{{$datas->id_tenagaKerja}}" method="post">
                                            {{csrf_field()}}
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label><strong>Nomor KTP</strong></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" id="no_ktp" class="form-control" name="no_ktp" placeholder="Nomor KTP" value="{{$datas->no_ktp}}">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label><strong>Nama Tenaga Kerja</strong></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" id="nama" class="form-control" name="nama_tenagaKerja" placeholder="Nama Tenaga Kerja" value="{{$datas->nama_tenagaKerja}}">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label><strong>Email</strong></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="email" id="email" class="form-control" name="email" placeholder="Email" value="{{$datas->email}}">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label><strong>Password</strong></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="password" id="password" class="form-control" name="password" placeholder="Password">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label><strong>Area</strong></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" id="area" class="form-control" name="area" placeholder="Area">
                                                    </div>

                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                        <button type="submit" class="btn btn-primary me-1 mb-1">Ubah</button>
                                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        
                                    </div>
                                    <div class="tab-pane fade" id="dataPribadi" role="tabpanel" aria-labelledby="pribadi-tab">
                                        @if($countDataPribadi == !null)
                                            <form class="form form-horizontal">
                                            <div class="form-body">
                                                <div class="row">
                                                    
                                                    <div class="col-md-4">
                                                        <label><strong>Nama Lengkap</strong></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label><strong>Nama Panggilan</strong></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" class="form-control" name="nama_panggilan" placeholder="Nama Panggilan">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label><strong>Tempat Tanggal Lahir</strong></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir">
                                                        <input type="date" class="form-control" name="tanggal_lahir">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label><strong>Alamat Rumah (Sekarang)</strong></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" class="form-control" name="alamat_rumah" placeholder="Alamat Rumah">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label><strong>Nomor Telepon</strong></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" class="form-control" name="no_telp" placeholder="Nomor Telepon">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label><strong>Agama</strong></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" class="form-control" name="agama" placeholder="Agama">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label><strong>Kewarganegaraan</strong></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" class="form-control" name="kewarganegaraan" placeholder="Kewarganegaraan">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label><strong>Anak Ke-</strong></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" class="form-control" name="anak_ke" placeholder="Anak Ke-">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label><strong>Nama Ayah Kandung</strong></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" class="form-control" name="nama_ayah_kandung" placeholder="Nama Ayah Kandung">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label><strong>Nama Ibu Kandung</strong></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" class="form-control" name="nama_ibu_kandung" placeholder="Nama Ibu Kandung">
                                                    </div>
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
                                            <a href="" class="btn btn-success">Buat Data Pribadi</a>
                                            </center>
                                        @endif
                                                                           
                                    </div>
                                    <div class="tab-pane fade" id="dataKeluarga" role="tabpanel" aria-labelledby="keluarga-tab">
                                        <center>
                                            <!-- Button trigger for Success theme modal -->
                                            <button type="button" class="btn btn-success"
                                                data-bs-toggle="modal" data-bs-target="#success">
                                                Tambah Data Keluarga
                                            </button>
                                            <hr><br>
                                        </center>
                                        @if($countDataKeluarga == !null)
                                        @foreach($dataKeluarga as $keluarga)
                                        <form class="form form-horizontal">
                                            <div class="form-body">
                                                <div class="row">
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
                                                        <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir">
                                                        <input type="date" class="form-control" name="tanggal_lahir">
                                                    </div>
                                                    
                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                        <button type="submit" class="btn btn-primary me-1 mb-1">Ubah</button>
                                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
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
                                                    <div class="modal fade text-left" id="success" tabindex="-1"
                                                        role="dialog" aria-labelledby="myModalLabel110"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                            role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-success">
                                                                    <h5 class="modal-title white" id="myModalLabel110">
                                                                        Tambah Data Keluarga
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-bs-dismiss="modal" aria-label="Close">
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
                                                                                    <input type="date" class="form-control" name="tanggal_lahir">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="reset"
                                                                            class="btn btn-light-secondary">
                                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                                            <span class="d-none d-sm-block">Reset</span>
                                                                        </button>

                                                                        <button type="submit" class="btn btn-success ml-1">
                                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                                            <span class="d-none d-sm-block">Tambah</span>
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                    </div>
                                    <div class="tab-pane fade" id="pendidikanFormal" role="tabpanel" aria-labelledby="pddkFormal-tab">
                                        <form class="form form-horizontal">
                                            <div class="form-body">
                                                <div class="row">
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
                                                        <input type="text" class="form-control" name="periode" placeholder="Periode">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label><strong>Lokasi</strong></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" class="form-control" name="lokasi" placeholder="Lokasi">
                                                    </div>
                                                   
                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                        <button type="submit" class="btn btn-primary me-1 mb-1">Ubah</button>
                                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="pendidikanNonFormal" role="tabpanel" aria-labelledby="pddkNonFormal-tab">
                                        <form class="form form-horizontal">
                                            <div class="form-body">
                                                <div class="row">
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
                                                        <input type="text" class="form-control" name="periode" placeholder="Periode">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label><strong>Lokasi</strong></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" class="form-control" name="lokasi" placeholder="Lokasi">
                                                    </div>
                                                   
                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                        <button type="submit" class="btn btn-primary me-1 mb-1">Ubah</button>
                                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="keterampilan" role="tabpanel" aria-labelledby="keterampilan-tab">
                                        <form class="form form-horizontal">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label><strong>Nama Keterampilan</strong></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" class="form-control" name="nama_keterampilan" placeholder="Nama Keterampilan">
                                                    </div>
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
                                                                                                      
                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                        <button type="submit" class="btn btn-primary me-1 mb-1">Ubah</button>
                                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="pengalamanKerja" role="tabpanel" aria-labelledby="pengalaman-tab">
                                        <form class="form form-horizontal">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label><strong>Nama Perusahaan</strong></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" class="form-control" name="nama_perusahaan" placeholder="Nama Perusahaan">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label><strong>Periode</strong></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" class="form-control" name="periode" placeholder="Periode">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label><strong>Posisi</strong></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" class="form-control" name="posisi" placeholder="Posisi">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label><strong>Gaji</strong></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" class="form-control" name="gaji" placeholder="Gaji">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label><strong>Alasan Berhenti</strong></label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" class="form-control" name="alasan_berhenti" placeholder="Alasan Berhenti">
                                                    </div>
                                                    
                                                    
                                                                                                      
                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                        <button type="submit" class="btn btn-primary me-1 mb-1">Ubah</button>
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
            </div>
        </section>
    </div>

</div>


@endsection