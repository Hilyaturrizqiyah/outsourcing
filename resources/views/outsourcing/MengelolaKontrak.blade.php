@extends('outsourcing.layout.TampilanOutsourcing')
@section('content')


<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Kontrak</h3>
                <p class="text-subtitle text-muted">List Data Kontrak</p>
                <!-- <p>
                <div class="py-3 d-flex flex-row align-items-center justify-content-between">
                  <a href="{{url('/outsourcing/TambahJasa')}}" class="btn btn-success">Tambah Jasa</a>
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
                        <li class="breadcrumb-item active" aria-current="page">Jasa Outsourcing</li>
                        
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
                <th>Nama Customer</th>
                <th>Jasa</th>
                <th>Tanggal Pengajuan</th>
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

                @foreach($kontraks as $kontrak)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$kontrak->customer->nama_customer}}</td>
                    <td>{{$kontrak->jasa->nama_jasa}}</td>
                    <td>
                        {{$kontrak->tgl_mulai_kontrak}}
                    </td>
                    <td>
                        @if($kontrak->status_kontrak == "Pending")
                        <small style="color: orange">{{$kontrak->status_kontrak}}</small>
                        @elseif($kontrak->status_kontrak == "Kontrak Disetujui")
                        <small style="color: green">{{$kontrak->status_kontrak}}</small>
                        @elseif($kontrak->status_kontrak == "In Progress")
                        <small style="color: blue">{{$kontrak->status_kontrak}}</small>
                        @elseif($kontrak->status_kontrak == "Finish")
                        <small style="color: green">{{$kontrak->status_kontrak}}</small>
                        @elseif($kontrak->status_kontrak == "Cancel")
                        <small style="color: red"> {{$kontrak->status_kontrak}}</small>
                        @endif
                    </td>
                    <td>
                        <a href="/outsourcing/UbahStatus{{$kontrak->id_kontrak}}" class="btn btn-warning">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a href="/outsourcing/HapusJasa{{$kontrak->id_kontrak}}" class="btn btn-danger" onclick="return confirm('Anda yakin mau menghapus item ini ?')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            </tbody>
                @endforeach
          </table>
        </div>
      </div>
    </div>
</div>
@endsection