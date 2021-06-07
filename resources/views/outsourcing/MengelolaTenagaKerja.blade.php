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
                <th>Nama</th>
                <th>No. KTP</th>
                <th>Area</th>
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
              {{-- @foreach($kontraks as $kontrak) --}}
              <tr>
                <th>1</th>
                <th>Maks</th>
                <th>1234567890123456</th>
                <th>1</th>
                <th>Pelamar</th>
                <!-- <th>Bukti Transfer</th>
                <th>Tanggal Pembayaran</th>
                <th>Bulan Ke</th>
                <th>Status Pembayaran</th> -->
                <th>
                  <div class="col-sm-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-1 mb-1">Ubah</button>
                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                    <a href=# class="btn btn-danger me-1 mb-1" onclick="return confirm('Anda yakin mau menghapus item ini ?')">
                      Hapus
                    </a>
                  </div>
                </th>
              </tr>
            </tbody>
            {{-- @endforeach --}}
          </table>
        </div>
      </div>
    </div>
</div>
@endsection