@extends('admin.layout.TampilanAdmin')
@section('content')
<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Detail Outsourcing</h1>
            <ol class="breadcrumb">  
              <li class="breadcrumb-item"><a href="">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{url('/admin/MengelolaOutsourcing')}}">Outsourcing</a></li>
              <li class="breadcrumb-item active" aria-current="page">Detail Outsourcing</li>
            </ol>
          </div>
          <hr>

           @if(\Session::has('alert-success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h6><i class="fas fa-sign-out-alt"></i><b> Success!!</b></h6>
                        {{Session::get('alert-success')}}
                    </div>
                  @endif
                  
            <div class="col-lg-12">

              <!-- DataTable Provinsi -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <strong>{{$datas->nama_outsourcing}}</strong>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <img src="{{ url('pengguna/assets/images/foto_profil/'.$datas->foto_profil)}}" height="100">
                      <table>
                        <tr>
                          <td><strong>Deskripsi</strong></td>
                          <td><strong>:</strong></td>
                          <td>{{$datas->deskripsi}}</td>
                        </tr>
                        <tr>
                          <td><strong>Nomor Telepon</strong></td>
                          <td><strong>:</strong></td>
                          <td>{{$datas->no_telp}}</td>
                        </tr>
                        <tr>
                          <td><strong>Email</strong></td>
                          <td><strong>:</strong></td>
                          <td>{{$datas->email}}</td>
                        </tr>
                        <tr>
                          <td><strong>Alamat</strong></td>
                          <td><strong>:</strong></td>
                          <td>{{$datas->alamat}}</td>
                        </tr>
                      </table>
                      
                      @if ($datas->status_outsourcing != 'Tervalidasi')
                          <br>
                          <a class="btn btn-success" href="/admin/ValidasiOutsourcing{{$datas->id_outsourcing}}">Validasi</a>

                      @endif
                      

                    </div>
                    <div class="col-md-6">
                      <table>
                        <tr>
                          <td><strong>Nama Bank</strong></td>
                          <td><strong>:</strong></td>
                          <td>{{$datas->nama_bank}}</td>
                        </tr>
                        <tr>
                          <td><strong>Nomor Rekening</strong></td>
                          <td><strong>:</strong></td>
                          <td>{{$datas->no_rekening}}</td>
                        </tr>
                        
                        <tr>
                          <td><strong>Nama Pemilik Rekening</strong></td>
                          <td><strong>:</strong></td>
                          <td>{{$datas->nama_pemilikRekening}}</td>
                        </tr>
                        <tr>
                          <td><strong>Alamat</strong></td>
                          <td><strong>:</strong></td>
                          <td>{{$datas->alamat}}</td>
                        </tr>
                      </table>
                      <br>
                      <span style="color: green">{{$datas->status_outsourcing}}</span>

                    </div>
                  </div>
                </div>
                <div class="table-responsive p-3">
                  <table class="table table-hover">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>Scan</th>
                        <th>Nama Dokumen</th>
                        <th>Nomor Dokumen</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th>1</th>
                        <th><a href="{{ url('pengguna/assets/images/scan_dokumen/'.$datas->scan_siup) }}" data-lightbox="image-1" data-title="Our Projects"><img src="{{ url('pengguna/assets/images/scan_dokumen/'.$datas->scan_siup) }}" height="100" width="100"></a></th>
                        <th>Scan SIUP</th>
                        <th>{{$datas->no_siup}}</th>
                        <th></th>
                      </tr>
                      <tr>
                        <th>2</th>
                        <th><a href="{{ url('pengguna/assets/images/scan_dokumen/'.$datas->scan_tdp) }}" data-lightbox="image-1" data-title="Our Projects"><img src="{{ url('pengguna/assets/images/scan_dokumen/'.$datas->scan_tdp) }}" height="100" width="100"></a></th>
                        <th>Scan TDP</th>
                        <th>{{$datas->no_tdp}}</th>
                        <th></th>
                      </tr>
                      <tr>
                        <th>3</th>
                        <th><a href="{{ url('pengguna/assets/images/scan_dokumen/'.$datas->scan_ktp) }}" data-lightbox="image-1" data-title="Our Projects"><img src="{{ url('pengguna/assets/images/scan_dokumen/'.$datas->scan_ktp) }}" height="200"></a></th>
                        <th>Scan KTP</th>
                        <th>{{$datas->no_ktp}}</th>
                        <th></th>
                      </tr>
                    </tbody>                     
                  </table>
                </div>
              </div>
              <!---DataTable Provinsi-->

            </div>
       
@endsection