@extends('landingpage.layout.TampilanLandingpage')
@section('content')

  <main id="main">

    <br><br>
    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Daftarkan Akun anda</h2>
          <hr>
        </div>

        <div class="row content">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="150">
            <img src="{{ url('assets/img/hero-img.png') }}" alt="" class="img-fluid animated">
          </div>
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">

            @if(\Session::has('alert-success'))
            <div class="alert alert-success color-success alert-dismissible show fade"><i class="bi bi-check-circle"></i>
                {{Session::get('alert-success')}}
            </div>
            @endif

            <div align="center">
              <h4>
                Mendaftar Akun Outsourcing
              </h4>
            </div>  
            
              <hr>
              <form enctype="multipart/form-data" action="{{url('/outsourcing/AksiTambahOutsourcing')}}" method="post">

                {{csrf_field()}}
                
                <div class="mb-3 row">
                  <label for="nama" class="col-sm-3 col-form-label"><strong>Nama</strong></label>
                  <div class="col-sm-9">
                    <input type="text" name="nama_outsourcing" class="form-control" id="nama">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="no_ktp" class="col-sm-3 col-form-label"><strong>Nomor KTP</strong></label>
                  <div class="col-sm-9">
                    <input type="text" name="no_ktp" class="form-control" id="no_ktp">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="email" class="col-sm-3 col-form-label"><strong>Email</strong></label>
                  <div class="col-sm-9">
                    <input type="text" name="email" class="form-control" id="email">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="Password" class="col-sm-3 col-form-label"><strong>Password</strong></label>
                  <div class="col-sm-9">
                    <input type="password" name="password" class="form-control" id="Password">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-3 col-form-label"></label>
                  <div class="col-sm-9">
                    <input type="submit" class="btn btn-outline-primary" value="Mendaftar">
                  </div>
                </div>

              </form>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Contact Us</h2>
        </div>

        <div class="row">

          <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="contact-about">
              <h3>Outsourcing</h3>
              <p>Cras fermentum odio eu feugiat. Justo eget magna fermentum iaculis eu non diam phasellus. Scelerisque felis imperdiet proin fermentum leo. Amet volutpat consequat mauris nunc congue.</p>
              <div class="social-links">
                <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
                <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
                <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
                <a href="#" class="linkedin"><i class="icofont-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-6 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
            <div class="info">
              <div>
                <i class="ri-map-pin-line"></i>
                <p>Jl. Raya Lohbener Lama No. 08 Indramayu 45252</p>
              </div>

              <div>
                <i class="ri-mail-send-line"></i>
                <p>info@example.com</p>
              </div>

              <div>
                <i class="ri-phone-line"></i>
                <p>+1 5589 55488 55s</p>
              </div>

            </div>
          </div>


        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  @endsection