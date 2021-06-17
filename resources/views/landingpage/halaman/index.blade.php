@extends('landingpage.layout.TampilanLandingpage')
@section('content')


<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                <h4 data-aos="fade-up">Jasa Tenaga Kerja Outsourcing</h4>
                <h6 class="mt-3" style="line-height: 180%;" data-aos="fade-up" data-aos-delay="400">Outsourcing merupakan sistem yang diberlakukan perusahaan
                    dimana mereka menyerahkan beberapa kegiatan perusahaan atau pekerjaan mereka kepada pihak luar.
                    Pihak ini disebut dengan outside provider. Seluruh pengalihan tugas, hak, serta kewajiban masing-masing
                    pihak biasanya diatur dalam sebuah perjanjian kerjasama atau kontrak kerja.</h6>
                <div data-aos="fade-up" data-aos-delay="800">
                    <a href="#about" class="btn-get-started scrollto"><i class="fas fa-phone-alt"></i> Hubungi Kami</a>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
                <img src="assets/img/osr-depan.jpg" class="img-fluid animated" alt="">
            </div>
        </div>
    </div>

</section><!-- End Hero -->

<main id="main">


    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>Tentang Kami</h2>
            </div>

            <div class="row content">
                <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="150">
                    <img src="assets/img/osr11.jpg" alt="" class="img-fluid">
                </div>
                <div class="col-lg-6 mt-5 pt-4 pt-lg-0" data-aos="fade-up" data-aos-delay="300">
                    <p>
                        Aplikasi kami menyediakan jasa ketenagakerjaan dari perusahaan-perusahaan outsourcing yang ada
                        di daerah Indramayu
                    </p>
                    <ul>
                        <li><i class="ri-check-double-line"></i> Website kami menyediakan informasi mengenai jasa tenaga
                            kerja pihak ketiga pada perusahaan-perusahaan yang ada di Indramayu</li>
                        <li><i class="ri-check-double-line"></i> Website kami menyediakan penyewaan atau melakukan
                            kontrak jasa tenaga kerja dengan perusahaan outsourcing</li>
                    </ul>
                   
                </div>
            </div>

        </div>
    </section><!-- End About Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>Layanan</h2>
                <p>Jasa Ketenagakerjaan yang tersedia</p>
            </div>

            <div class="row">
                @foreach ($jasa as $jasa)
                <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mt-3 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon"><i class="fas fa-user-shield"></i></div>
                        <h4 class="title"><a href="">{{$jasa->nama_jasa}}</a></h4>
                        <p class="description">{{$jasa->jenis_jasa->deskripsi}}</p>
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
                <h2>Perusahaan Penyedia Jasa</h2>
                <p>Perusahaan - perusahaan Outsourcing yang ada di daerah Indramayu</p>
            </div>

            <div class="row">
                @foreach ($osr as $osr)
                <div class="col-4">
                    <div class="member" data-aos="fade-up" data-aos-delay="100">
                        <div class="member-img">
                            <img src="{{ url('../pengguna/assets/images/foto_profil/'.$osr->foto_profil)}}" alt="image"
                                width="300px" height="300px">
                            <div class="social">
                                <a href=""><i class="icofont-twitter"></i></a>
                                <a href=""><i class="icofont-facebook"></i></a>
                                <a href=""><i class="icofont-instagram"></i></a>
                                <a href=""><i class="icofont-linkedin"></i></a>
                            </div>

                        </div>
                        <div class="member-info">

                            <h4>{{$osr->nama_outsourcing}}</h4>
                            <span>Perusahaan Outsourcing</span>
                            <a href="#about" class="btn btn-outline-primary">Kunjungi <i
                                    class="fas fa-hand-point-right"></i> </a>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section><!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>Kontak Kami</h2>
            </div>
            <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="contact-about">
                    <h3>Outsourcing</h3>
                    <p>Kami menyediakan jasa pihak ketiga</p>
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
                        <p>osr@example.com</p>
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
