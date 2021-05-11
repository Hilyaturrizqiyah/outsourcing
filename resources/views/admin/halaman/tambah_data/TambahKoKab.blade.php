@extends('admin.layout.TampilanAdmin')
@section('content')
      <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Data Area</h1>
            <ol class="breadcrumb">  
              <li class="breadcrumb-item"><a href="{{url ('/admin')}}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{url ('/admin/MengelolaArea')}}">Data Area</a></li>
              <li class="breadcrumb-item active" aria-current="page">Tambah Data Area</li>            
            </ol>
          </div>
          <hr>
          <div class="row justify-content-center">
            <div class="col-lg-6">

              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tambah Data Kota Kabupaten</h6>
                </div>
                <div class="card-body">

                  <form enctype="multipart/form-data" class="contact-form-area contact-page-form contact-form text-left" action="{{url('admin/AksiTambahKoKab')}}" method="post">

                    {{csrf_field()}}

                    <div class="form-group">
                      <select name = "provinsi" class="form-control">
                        <option value="">Pilih Provinsi</option>
                         @foreach($provinsi as $tampil)
                         <option value="{{$tampil->id}}">{{$tampil->nama_provinsi}}</option>
                         @endforeach
                      </select>

                    @if ($errors->has('provinsi'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('provinsi') }}</p></span>
                    @endif

                    </div>

                    <div class="form-group">
                        <label><b>Kota Kabupaten</b></label>
                        <input type="text" class="form-control" name="nama_kotaKabupaten" placeholder="Masukkan Kota Kabupaten">
  
                      @if ($errors->has('kota_kabupaten'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('kota_kabupaten') }}</p></span>
                      @endif
  
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
      <!---Container Fluid-->
@endsection
