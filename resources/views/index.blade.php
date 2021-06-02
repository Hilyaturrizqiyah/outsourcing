<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Outsourcing</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo1.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="{{url('assets/fontawesome-free/css/all.min.css')}}">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">
        <h4 class="text-light"><img src="assets/img/logo2.png" alt="" class="img-fluid"><a href="index.html"><span>Outsourcing</span></a></h4>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="#index.html">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#team">Perusahaan</a></li>
          <li><a href="#contact">Contact</a></li>

          <li class="get-started"><a href="{{url('/customer/loginCustomer')}}">Login</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Jasa Tenaga Kerja Outsourcing</h1>
          <h2 class="mt-3" style="line-height: 180%;" data-aos="fade-up" data-aos-delay="400">Kami menyediakan informasi mengenai jasa pihak ketiga dari perusahaan-perusahaan Outsourcing yang ada di daerah Indramayu</h2>
          <div data-aos="fade-up" data-aos-delay="800">
            <a href="#about" class="btn-get-started scrollto"><i class="fas fa-phone-alt"></i> Hubungi Kami</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
          <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">


    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>About Us</h2>
        </div>

        <div class="row content">
          <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="150">
            <img src="assets/img/about.jpg" alt="" class="img-fluid">
          </div>
          <div class="col-lg-6 mt-5 pt-4 pt-lg-0" data-aos="fade-up" data-aos-delay="300">
            <p>
                Aplikasi kami menyediakan jasa ketenagakerjaan dari perusahaan-perusahaan outsourcing yang ada di daerah Indramayu
              </p>
              <ul>
                <li><i class="ri-check-double-line"></i> Website kami menyediakan informasi mengenai jasa tenaga kerja pihak ketiga pada perusahaan-perusahaan yang ada di Indramayu</li>
                <li><i class="ri-check-double-line"></i> Website kami menyediakan penyewaan atau melakukan kontrak jasa tenaga kerja dengan perusahaan outsourcing</li>
              </ul>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Services</h2>
          <p>Jasa Ketenagakerjaan yang tersedia</p>
        </div>

        <div class="row">
            @foreach ($jasa as $jasa)
          <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mt-3 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="fas fa-user-shield"></i></div>
              <h4 class="title"><a href="">{{$jasa->nama_jasa}}</a></h4>
              <p class="description">Memberikan pelayanan konsultasi untuk pengamanan gedung,
                  perkantoran perusahaan dan pribadi di seluruh Indonesia dengan biaya yang murah
                  terjangkau melalui penawaran outsourcing jasa satpam security yang tersedia di seluruh
                  Indonesia dengan harga yang fleksibel.</p>
            </div>
          </div>
          @endforeach
        </div>

      </div>
    </section><!-- End Services Section -->


    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Mitra Kami</h2>
          <p>Perusahaan - perusahaan Outsourcing yang ada di daerah Indramayu</p>
        </div>

        <div class="row">

          <div class="col-lg-6 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="member-img">
                <img src="assets/img/logo-bsm.png" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>

              </div>
              <div class="member-info">
                <h4>PT. BSM</h4>
                <span>Perusahaan Outsourcing</span>
                <a href="#about" class="btn btn-outline-primary">Kunjungi <i class="fas fa-hand-point-right"></i> </a>

              </div>
            </div>
          </div>

          <div class="col-lg-6 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="200">
              <div class="member-img">
                <img src="assets/img/PT-KURNIA-CAHYA-SEJAHTERA.png" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>

              </div>
              <div class="member-info">
                <h4>PT. Kurnia Cahya Sejahtera</h4>
                <span>Perusahaan Outsourcing</span>
                <a href="#about" class="btn btn-outline-primary">Kunjungi <i class="fas fa-hand-point-right"></i> </a>

              </div>
            </div>
          </div>


        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Contact Us</h2>
        </div>
        <center>
        <div class="section-title col-md-12 mb-1">
            <form action="/index/area/cari" method="GET">
                <input class="btn btn-light col-10" type="text" name="cari" placeholder="Masukkan Kecamatan" value="{{ old('cari') }}" style="box-shadow: 2px 5px rgba(128, 128, 128, 0.247);">
                <button class="btn btn-primary"><i class="fa fa-search"></i></button>
            </form>
        </div>
        </center>
        <br> <br>
        <div class="row">

        </div>
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

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="row d-flex align-items-center">
        <div class="col-lg-6 text-lg-left text-center">
          <div class="copyright">
            &copy; Copyright <strong>Outsourcing</strong>. All Rights Reserved
          </div>
          <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/vesperr-free-bootstrap-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
