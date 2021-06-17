@extends('outsourcing.layout.TampilanOutsourcing')
@section('content')


<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Tenaga Kerja</h3>
                <p class="text-subtitle text-muted"></p>
                <!-- <p>
                <div class="py-3 d-flex flex-row align-items-center justify-content-between">
                  <a href="{{url('/outsourcing/TambahTenagaKerja')}}" class="btn btn-success">Tambah Jasa</a>
                </div>
                </p> -->
                <!-- <p>
                  Button trigger for Success theme modal
                  <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#Keterampilan">
                    Tambah Jasa
                  </button>
                  <br>
                </p> -->
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url ('outsourcing/DashboardOutsourcing')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Tenaga Kerja</li>
                        
                    </ol>
                </nav>
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
                <th>Nama Tenaga Kerja</th>
                <th>No. KTP</th>
                <th>Status</th>
                <!-- <th>Bukti Transfer</th>
                <th>Tanggal Pembayaran</th>
                <th>Bulan Ke</th>
                <th>Status Pembayaran</th> -->
                <th>  </th>
              </tr>
            </thead>

            <tbody>
              @php
              $no=1;
              @endphp
              @foreach($datas as $data)
              <tr>
                <th>{{$no++}}</th>
                <th>{{$data->nama_tenagaKerja}}</th>
                <th>{{$data->no_ktp}}</th>
                <th>{{$data->status_tenagaKerja}}</th>
                <!-- <th>Bukti Transfer</th>
                <th>Tanggal Pembayaran</th>
                <th>Bulan Ke</th>
                <th>Status Pembayaran</th> -->
                <th>
                        <a href=# class="btn btn-warning">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a href="/outsourcing/HapusTenagaKerja{{$data->id_tenagaKerja}}" class="btn btn-danger" onclick="return confirm('Anda yakin mau menghapus item ini ?')">
                            <i class="fas fa-trash"></i>
                        </a>
                </th>
              </tr>
            </tbody>
            @endforeach
          </table>
        </div>
      </div>
    </div>
</div>
@endsection