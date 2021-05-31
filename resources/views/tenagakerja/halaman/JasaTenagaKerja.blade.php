@extends('tenagakerja.layout.TampilanTenagaKerja')
@section('content')


<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Jasa Tenaga Kerja</h3>
                <p class="text-subtitle text-muted">Daftar jasa tenaga kerja yang tersedia</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url ('tenagakerja')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Jasa Tenaga Kerja
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>  
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Cari Jasa</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="form-group">
                                <select class="choices form-select">
                                    <option value="">Semua Area</option>
                                    <option value="square">Square</option>
                                    <option value="rectangle">Rectangle</option>
                                    <option value="rombo">Rombo</option>
                                    <option value="romboid">Romboid</option>
                                    <option value="trapeze">Trapeze</option>
                                    <option value="traible">Triangle</option>
                                    <option value="polygon">Polygon</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="form-group">
                                <select class="choices form-select">
                                    <option value="">Semua Jasa</option>
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
                        </div>
                        <div class="col-md-4 mb-4">
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
            </div>
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
                        <tr>
                            <td>1</td>
                            <td>Graiden</td>
                            <td>vehicula.aliquet@semconsequat.co.uk</td>
                            <td>076 4820 8838</td>
                            <td>Offenburg</td>
                            <td>
                                <a href="" class="btn btn-primary">Lamar Pekerjaan</a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Graiden</td>
                            <td>vehicula.aliquet@semconsequat.co.uk</td>
                            <td>076 4820 8838</td>
                            <td>Offenburg</td>
                            <td>
                                <a href="" class="btn btn-primary">Lamar Pekerjaan</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </section>

</div>


@endsection