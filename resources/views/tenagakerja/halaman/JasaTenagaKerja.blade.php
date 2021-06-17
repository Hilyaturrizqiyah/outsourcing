@extends('tenagakerja.layout.TampilanTenagaKerja')
@section('content')


<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Lamar Jasa Tenaga Kerja</h3>
                <p class="text-subtitle text-muted">Daftar jasa tenaga kerja yang tersedia</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url ('tenagakerja')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Lamar Jasa Tenaga Kerja
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
        @if(\Session::has('alert'))
            <div class="alert alert-light-danger color-danger alert-dismissible show fade"><i class="bi bi-check-circle"></i>
                {{Session::get('alert')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

    <section class="section">
        <div class="card">
            {{-- <div class="card-header">
                <h4 class="card-title">Cari Jasa</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="row">
                        {{-- <div class="col-md-4 mb-4">
                            <div class="form-group">
                                <select class="choices form-select">
                                    <option value="">Semua Area</option>
                                    <optgroup label="Figures">
                                        <option value="romboid">Romboid</option>
                                        <option value="trapeze">Trapeze</option>
                                        <option value="triangle">Triangle</option>
                                        <option value="polygon">Polygon</option>
                                    </optgroup>
                                    <optgroup label="Colors">
                                        <option value="red">Red</option>
                                        <option value="green">Green</option>
                                        <option value="blue">Blue</option>
                                        <option value="purple">Purple</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div> --}}
                        {{-- <div class="col-md-4 mb-4">
                            <div class="form-group">
                                <select class="choices form-select">
                                    <option value="">Semua Jasa</option>

                                    @foreach ($jenis_jasas as $item)
                                        <option value="{{$item->id_jenisJasa}}">{{$item->nama_jenisJasa}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}
                        {{-- <div class="col-md-4 mb-4">
                            <button type="button" class="btn btn-outline-primary btn-icon btn-lg action-icon">
                                <span class="fonticon-wrap">
                                    <svg class="bi" >
                                        <use xlink:href="{{ asset('pengguna/assets/vendors/bootstrap-icons/bootstrap-icons.svg#search')}}"></use>
                                    </svg>
                                </span>
                            </button>
                        </div> 

                    </div>
                </div>
            </div> --}}
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Daftar Jasa Tenaga Kerja</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama Jasa</th>
                            <th>Jenis Jasa</th>
                            <th>Outsourcing</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no=1;
                        @endphp
                        @foreach ($jasas as $item)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$item->foto_profil}}</td>
                                <td>{{$item->nama_jasa}}</td>
                                <td>{{$item->jenis_jasa->nama_jenisJasa}}</td>
                                <td>{{$item->outsourcing->nama_outsourcing}}</td>
                                <td>
                                    <a href="/tenagakerja/MelamarKerja{{$item->id_jasa}}" class="btn btn-primary" onclick="return confirm('Data profil akan dikirim, Apakah anda yakin dengan data profil yang diisi ?')">Lamar Pekerjaan</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </section>

</div>


@endsection
