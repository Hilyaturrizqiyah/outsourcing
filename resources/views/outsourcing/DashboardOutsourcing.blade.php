@extends('outsourcing.layout.TampilanOutsourcing')
@section('content')


<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Dashboard Outsourcing</h3>
                <p class="text-subtitle text-muted">Dashboard Penyedia Jasa Outsourcing</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url ('tenagakerja')}}">Dashboard</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <br>
    <br>


        <div class="row">
            <div class="col-lg-12">
              <h5>Data Jasa</h5>
            </div>
            <hr>
        </div>

        <div class="row mb-3">
            <!-- New User Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <a href="" class="card-link">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1 text-gray-800">Semua Data</div>
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">1</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
              <h5>Data Tenaga Kerja</h5>
            </div>
            <hr>
        </div>

        <div class="row mb-3">
            <!-- New User Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <a href="" class="card-link">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1 text-gray-800">Status Pelamar</div>
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">1</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <a href="" class="card-link">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1 text-gray-800">Status Tenaga Kerja</div>
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">1</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div>
        </div>
        <div class="row mb-3">
            <!-- New User Card Example -->
            
        </div>

</div>


@endsection
