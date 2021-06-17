@extends('outsourcing.layout.TampilanOutsourcing')
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
                        <li class="breadcrumb-item"><a href="{{url ('outsourcing/DashboardOutsourcing')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Jasa Outsourcing</li>
                        
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <!-- Form Basic -->
        <div class="card mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Jasa</h6>
          </div>
          <div class="card-body">
            <form enctype="multipart/form-data" class="contact-form-area contact-page-form contact-form text-left" action="AksiUbahJasa{{$datas->id_jasa}}" method="post">
              {{csrf_field()}}
              <div class="form-group">
                <label><b>Nama Jasa</b></label>
                <input type="text" class="form-control" name="nama_jasa" placeholder="Masukkan Nama Jasa">
                @if ($errors->has('nama_jasa'))
                  <span class="text-danger"><p class="text-right">* {{ $errors->first('nama_jasa') }}</p></span>
                @endif
              </div>
              <div class="form-group">
                <label><b>Nama Jenis Jasa</b></label>
                <select class="form-select" name="id_jenisJasa" id="id_jenisJasa">
                  <option value='0'>-- Select Jenis Jasa --</option>
                  <!-- Read jenis_jasa -->
                  @foreach($jenis_jasa as $id_jenisJasa => $nama_jenisJasa)
                  <option value="{{ $id_jenisJasa}}">{{ $nama_jenisJasa }}</option>
                  @endforeach                           
                </select>
                <!-- @if ($errors->has('nama_jenisJasa'))
                  <span class="text-danger"><p class="text-right">* {{ $errors->first('nama_jenisJasa') }}</p></span>
                @endif -->
              </div>
              <div class="form-group">
                <label><b>Foto</b></label>
                  <div class="custom-file">
                    <input type="file" name="foto_profil" id="foto_profil">
                    <br><label class="text-primary" for="foto_profil">* Ukuran Maksimal 2 Mb</label>
                    </div>
                    @if ($errors->has('foto_profil'))
                      <span class="text-danger"><p class="text-right">* {{ $errors->first('foto_profil') }}</p></span>
                    @endif
                  </div>
             </div>     
              <div class="form-group"> 
                <input type="reset" class="btn btn-secondary"  value="Batal">
                <input type="submit" class="btn btn-primary" value="Simpan">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection