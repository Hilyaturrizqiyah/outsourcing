@extends('osr.layout.TampilanOsr')
@section('content')


<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Dashboard Outsourcing</h3>
                <p class="text-subtitle text-muted">.....</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url ('tenagakerja')}}">Dashboard</a>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <a href="{{url('/admin/TambahJenisJasa')}}" class="btn btn-success">Tambah Jenis Jasa</a>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>Nama Jasa</th>
                        <th></th>
                      </tr>
                    </thead>

                    <tbody>
                      
                      <tr>
                        <td>1. </td>
                        <td>Driver</td>
                        <td>
                          <a href=# class="btn btn-warning">
                            <i class="fas fa-pencil-alt"></i>
                          </a>
                          <a href=# class="btn btn-danger" onclick="return confirm('Anda yakin mau menghapus item ini ?')">
                            <i class="fas fa-trash"></i>
                          </a>
                        </td>
                      </tr>
                    </tbody>
                      
                  </table>
                </div>
              </div>
            </div>

</div>


@endsection