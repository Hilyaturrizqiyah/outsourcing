@extends('admin.layout.TampilanAdmin')
@section('content')
      <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Data Tempat Wisata</h1>
            <ol class="breadcrumb">  
              <li class="breadcrumb-item"><a href="{{url ('/admin')}}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{url ('/admin/MengelolaAdmin')}}">Data Admin</a></li>
              <li class="breadcrumb-item active" aria-current="page">Tambah Data Admin</li>            
            </ol>
          </div>
          <hr>
          <div class="row justify-content-center">
            <div class="col-lg-6">

              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tambah Data Admin</h6>
                </div>
                <div class="card-body">

                  <form enctype="multipart/form-data" class="contact-form-area contact-page-form contact-form text-left" action="{{url('admin/AksiTambahAdmin')}}" method="post">

                    {{csrf_field()}}

                    <div class="form-group">
                      <label><b>Nama Admin</b></label>
                      <input type="text" class="form-control" name="nama_admin" placeholder="Masukkan Nama Admin">

                    @if ($errors->has('nama_admin'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('nama_admin') }}</p></span>
                    @endif

                    </div>

                    <div class="form-group">
                      <label><b>Alamat</b></label>
                      <textarea class="form-control" name="alamat" placeholder="Masukkan Alamat Admin"></textarea>

                    @if ($errors->has('alamat'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('alamat') }}</p></span>
                    @endif

                    </div>
                    
                    <div class="form-group">
                      <label><b>Nomor Telepon</b></label>
                      <input type="text" class="form-control" name="no_telp" placeholder="Masukkan Nomor Telepon">

                    @if ($errors->has('nama_admin'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('no_telp') }}</p></span>
                    @endif

                    </div>

                    <div class="form-group">
                      <label><b>Email</b></label>
                      <input type="email" class="form-control" name="email" placeholder="Masukkan Email">

                    @if ($errors->has('email'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('email') }}</p></span>
                    @endif

                    </div>

                    <div class="form-group">
                      <label><b>Password</b></label>
                      <input type="password" class="form-control" name="password" placeholder="Masukkan Password">

                    @if ($errors->has('password'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('password') }}</p></span>
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
