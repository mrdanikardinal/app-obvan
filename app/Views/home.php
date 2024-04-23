<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>HOME | APP-OBVAN</title>
  <meta content="" name="description">
  <meta content="" name="keywords">



  <link href="<?= base_url("/vendor-home/assets/img/apple-touch-icon.png"); ?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url("/vendor-home/assets/vendor/aos/aos.css"); ?>" rel="stylesheet">

  <link href="<?= base_url("/vendor-home/assets/vendor/bootstrap/css/bootstrap.min.css"); ?>" rel="stylesheet">
  <link href="<?= base_url("/vendor-home/assets/vendor/bootstrap-icons/bootstrap-icons.css"); ?> " rel="stylesheet">
  <link href="<?= base_url("/vendor-home/assets/vendor/boxicons/css/boxicons.min.css"); ?>" rel="stylesheet">
  <link href="<?= base_url("/vendor-home/assets/vendor/glightbox/css/glightbox.min.css"); ?>" rel="stylesheet">
  <link href="<?= base_url("/vendor-home/assets/vendor/remixicon/remixicon.css"); ?>" rel="stylesheet">
  <link href="<?= base_url("/vendor-home/assets/vendor/swiper/swiper-bundle.min.css"); ?>" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Template Main CSS File -->
  <link href="<?= base_url("/vendor-home/assets/css/style.css"); ?>" rel="stylesheet">


</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="index.html"><span>APPS-OBVAN</span></a></h1>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <?php if (!logged_in()) : ?>
            <li><a class="nav-link scrollto active" href="<?= base_url("/login") ?>">Login</a></li>
          <?php endif; ?>
          <?php if (logged_in()) : ?>
            <li><a class="nav-link scrollto active" href="<?= base_url('/dashboard'); ?>">Dashboard</a></li>
            <li><a class="nav-link scrollto active" href="<?= base_url('/logout'); ?>">Logout</a></li>
          <?php endif; ?>
          <li><a class="nav-link scrollto" href="#about">Tentang</a></li>
          <li><a class="nav-link scrollto" href="#gallery">Galeri</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
         
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">

    <div class="container">
      <div class="row justify-content-between">
        <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
          <div data-aos="zoom-out">
            <h1>Mempersembahkan dengan..<span> #SING PENTING YAKIN</span></h1>
            <h2>Kami adalah tim obvan berbakat, seperti apa yang diperlukan</h2>
            <div class="text-center text-lg-start">

              <?php if (!logged_in()) : ?>
                <a class="btn-get-started scrollto" href="<?= base_url("/login") ?>">Login</a>
              <?php endif; ?>
              <?php if (logged_in()) : ?>
                <a class="btn-get-started scrollto" href="<?= base_url('/dashboard'); ?>">Dashboard</a>
                <a class="btn-get-started scrollto" href="<?= base_url('/logout'); ?>">Logout</a>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="col-lg-4 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
          <img src="<?= base_url("/img/arjuna/arjuna-samping-kiri-transparent.png"); ?>" class="img-fluid animated" alt="arjuna-samping-kiri">
        </div>
      </div>
    </div>

    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
      <defs>
        <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
      </defs>
      <g class="wave1">
        <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
      </g>
      <g class="wave2">
        <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
      </g>
      <g class="wave3">
        <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
      </g>
    </svg>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container-fluid">

        <div>
          <a href="https://www.youtube.com/watch?v=CyO2BOC2emU" class="glightbox play-btn mb-4"></a>
        </div>
      </div>
    </section><!-- End About Section -->



    <!-- ======= Details Section ======= -->
    <section id="details" class="details">
      <div class="container">

        <div class="row content">
          <div class="col-md-4" data-aos="fade-right">
            <img src="<?= base_url("/img/arjuna/arjuna-sport2.jpg"); ?>" class="img-fluid" alt="arjuna-sport2">
          </div>
          <div class="col-md-8 pt-4" data-aos="fade-up">
            <h3>TVRI HD SPORT</h3>
            <p>
              TVRI Sport (sebelumnya bernama TVRI 4 dan TVRI Sport HD) adalah sebuah saluran televisi publik nasional yang dimiliki oleh LPP Televisi Republik Indonesia; menayangkan program-program yang berkaitan dengan olahraga selama 24 jam. TVRI Sport merupakan kanal terestrial pertama di Indonesia yang khusus menyiarkan tayangan olahraga.

            </p>
          </div>
        </div>

        <div class="row content">
          <div class="col-md-4 order-1 order-md-2" data-aos="fade-left">
            <img src="<?= base_url("/img/arjuna/arjuna-world.png"); ?>" class="img-fluid" alt="arjuna-world">
          </div>
          <div class="col-md-8 pt-5 order-2 order-md-1" data-aos="fade-up">
            <h3>TVRI WORLD</h3>
            <p>
              TVRI World (sebelumnya bernama TVRI 3 dan TVRI Kanal 3) adalah saluran televisi publik nasional yang dimiliki oleh LPP Televisi Republik Indonesia; menayangkan program-program berbahasa Inggris untuk pemirsa dalam dan luar negeri. Saluran ini hanya dapat disaksikan melalui siaran terestrial digital, satelit (secara gratis), dan layanan streaming TVRI Klik. Saluran ini merupakan saluran televisi terestrial pertama di Indonesia yang disiarkan dalam bahasa Inggris.
            </p>
          </div>
        </div>

        <div class="row content">
          <div class="col-md-4" data-aos="fade-right">
            <img src="<?= base_url("/img/arjuna/arjuna-nasional.png"); ?>" class="img-fluid" alt="arjuna-nasional">

          </div>
          <div class="col-md-8 pt-5" data-aos="fade-up">
            <h3>TVRI NASIONAL</h3>
            <p>
              Televisi Republik Indonesia (TVRI) adalah jaringan televisi publik berskala nasional di Indonesia. TVRI berstatus sebagai Lembaga Penyiaran Publik bersama Radio Republik Indonesia (RRI), yang ditetapkan melalui Undang-Undang No. 32/2002 tentang Penyiaran. TVRI merupakan jaringan televisi pertama di Indonesia, mulai mengudara pada tanggal 24 Agustus 1962 dan diperingati sebagai Hari Televisi Nasional. TVRI memonopoli siaran televisi di Indonesia hingga tahun 1989, ketika televisi swasta pertama Indonesia, yakni RCTI, didirikan.
              TVRI saat ini mengudara di seluruh wilayah Indonesia dengan menjalankan 3 saluran televisi nasional dan 35 stasiun televisi daerah, serta didukung 361 stasiun transmisi (termasuk 129 stasiun transmisi digital) di seluruh Indonesia.[1] Selain di televisi konvensional, siaran TVRI juga dapat ditonton melalui siaran streaming di situs resmi, aplikasi TVRI Klik, dan layanan OTT lainnya.
            </p>
          </div>
        </div>

        <div class="row content">
          <div class="col-md-4 order-1 order-md-2" data-aos="fade-left">
            <img src="<?= base_url("/img/arjuna/arjuna-depan-transparent.png"); ?>" class="img-fluid" alt="arjuna-depan-transparent">
          </div>
          <div class="col-md-8 pt-5 order-2 order-md-1" data-aos="fade-up">
            <h3>SNG VAN ARJUNA </h3>
            <p class="fst-italic">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
            </p>
          </div>
        </div>

      </div>
    </section><!-- End Details Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Galeri</h2>
          <p>Lihat Galeri Kami</p>
        </div>

        <div class="row g-0" data-aos="fade-left">

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="100">
              <a href="<?= base_url("/img/galery/perpisahan-pak-rismanto.jpg"); ?>" class="gallery-lightbox">
                <img src="<?= base_url("/img/galery/perpisahan-pak-rismanto.jpg"); ?>" alt="perpisahan-pak-rismanto" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="150">
              <a href="<?= base_url("/img/galery/team-idul-fitri.jpg"); ?>" class="gallery-lightbox">
                <img src="<?= base_url("/img/galery/team-idul-fitri.jpg"); ?>" alt="team-idul-fitri" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="200">
              <a href="<?= base_url("/img/galery/team-idul-adha-jogja.jpg"); ?>" class="gallery-lightbox">
                <img src="<?= base_url("/img/galery/team-idul-adha-jogja.jpg"); ?>" alt="team-idul-adha-jogja" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="250">
              <a href="<?= base_url("/img/galery/dialog-kemenkes.jpg"); ?>" class="gallery-lightbox">
                <img src="<?= base_url("/img/galery/dialog-kemenkes.jpg"); ?>" alt="dialog-kemenkes" class="img-fluid">
              </a>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Gallery Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container">

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">
          <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="<?= base_url("img/galery/gamer.png"); ?>" class="testimonial-img" alt="">
                <h3>JANSEN STEPPEN J.SINAGA</h3>
                <h4>Katua Team &amp; Obvan</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                 Bla....bla....
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->
            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="<?= base_url("img/galery/mrdinall2.png"); ?>" class="testimonial-img" alt="">
                <h3>Mr Dinall</h3>
                <h4>Teknisi &amp; Obvan</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                 Tidak ada hal yang tidak mungkin
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->
            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="<?= base_url("img/galery/gamer.png"); ?>" class="testimonial-img" alt="">
                <h3>ARIEFIN WISNUMURTI</h3>
                <h4>Teknisi &amp; Obvan</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                 Bla....bla....
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->
     
            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="<?= base_url("img/galery/gamer.png"); ?>" class="testimonial-img" alt="">
                <h3>MAULANA ANDRIYANTO</h3>
                <h4>Teknisi &amp; Obvan</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                 Bla....bla....
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->
            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="<?= base_url("img/galery/gamer.png"); ?>" class="testimonial-img" alt="">
                <h3>MAULANA SULFAN</h3>
                <h4>Teknisi &amp; Obvan</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                 Bla....bla....
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->
            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="<?= base_url("img/galery/gamer.png"); ?>" class="testimonial-img" alt="">
                <h3>JOKO ROHATIN</h3>
                <h4>Teknisi &amp; Obvan</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                 Bla....bla....
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->
            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="<?= base_url("img/galery/gamer.png"); ?>" class="testimonial-img" alt="">
                <h3>ABY MANYU</h3>
                <h4>Teknisi &amp; Obvan</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                 Bla....bla....
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->
            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="<?= base_url("img/galery/gamer.png"); ?>" class="testimonial-img" alt="">
                <h3>MUH. EGA PRAKOSO</h3>
                <h4>Teknisi &amp; Obvan</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                 Bla....bla....
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->
            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="<?= base_url("img/galery/gamer.png"); ?>" class="testimonial-img" alt="">
                <h3>DENI APRIANSYAH</h3>
                <h4>Teknisi &amp; Obvan</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                 Bla....bla....
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->
            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="<?= base_url("img/galery/gamer.png"); ?>" class="testimonial-img" alt="">
                <h3>PURNOMO MARISKI</h3>
                <h4>Teknisi &amp; Obvan</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                 Bla....bla....
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->
            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="<?= base_url("img/galery/gamer.png"); ?>" class="testimonial-img" alt="">
                <h3>HASAN RIDLO ABDULLAH</h3>
                <h4>Teknisi &amp; Obvan</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                 Bla....bla....
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->
            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="<?= base_url("img/galery/gamer.png"); ?>" class="testimonial-img" alt="">
                <h3>MUH. ARIF ABDURRAHMAN</h3>
                <h4>Teknisi &amp; Obvan</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                 Bla....bla....
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->
            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="<?= base_url("img/galery/gamer.png"); ?>" class="testimonial-img" alt="">
                <h3>PANJI NUGROHO KUSWINARTO</h3>
                <h4>Teknisi &amp; Obvan</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                 Bla....bla....
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->
            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="<?= base_url("img/galery/woman.png"); ?>" class="testimonial-img" alt="">
                <h3>WIDOWATI BROTONINGSIH</h3>
                <h4>Teknisi &amp; Obvan</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                 Bla....bla....
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

           

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Team</h2>
          <p>Team Obvan</p>
        </div>

        <div class="row" data-aos="fade-left">

          <div class="col-lg-3 col-md-6">
            <div class="member" data-aos="zoom-in" data-aos-delay="100">
              <div class="pic"><img src="<?= base_url("img/galery/man.png"); ?>" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>JANSEN STEPPEN J.SINAGA</h4>
                <span>Ketua Team &amp; Obvan</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="member" data-aos="zoom-in" data-aos-delay="100">
              <div class="pic"><img src="<?= base_url("img/galery/mrdinall2.png"); ?>" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Mr Dinall</h4>
                <span>Teknisi &amp; Obvan</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="member" data-aos="zoom-in" data-aos-delay="100">
              <div class="pic"><img src="<?= base_url("img/galery/man.png"); ?>" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>ARIEFIN WISNUMURTI</h4>
                <span>Teknisi &amp; Obvan</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="member" data-aos="zoom-in" data-aos-delay="100">
              <div class="pic"><img src="<?= base_url("img/galery/man.png"); ?>" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>MAULANA SULFAN</h4>
                <span>Teknisi &amp; Obvan</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="member" data-aos="zoom-in" data-aos-delay="100">
              <div class="pic"><img src="<?= base_url("img/galery/man.png"); ?>" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>MAULANA ANDRIYANTO</h4>
                <span>Teknisi &amp; Obvan</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="member" data-aos="zoom-in" data-aos-delay="100">
              <div class="pic"><img src="<?= base_url("img/galery/man.png"); ?>" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>ABY MANYU</h4>
                <span>Teknisi &amp; Obvan</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="member" data-aos="zoom-in" data-aos-delay="100">
              <div class="pic"><img src="<?= base_url("img/galery/man.png"); ?>" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>JOKO ROHATIN</h4>
                <span>Teknisi &amp; Obvan</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="member" data-aos="zoom-in" data-aos-delay="100">
              <div class="pic"><img src="<?= base_url("img/galery/man.png"); ?>" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>ABY MANYU</h4>
                <span>Teknisi &amp; Obvan</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="member" data-aos="zoom-in" data-aos-delay="100">
              <div class="pic"><img src="<?= base_url("img/galery/man.png"); ?>" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>MUH. EGA PRAKOSO</h4>
                <span>Teknisi &amp; Obvan</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="member" data-aos="zoom-in" data-aos-delay="100">
              <div class="pic"><img src="<?= base_url("img/galery/man.png"); ?>" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>DENI APRIANSYAH</h4>
                <span>Teknisi &amp; Obvan</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="member" data-aos="zoom-in" data-aos-delay="100">
              <div class="pic"><img src="<?= base_url("img/galery/man.png"); ?>" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>PURNOMO MARISKI</h4>
                <span>Teknisi &amp; Obvan</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="member" data-aos="zoom-in" data-aos-delay="100">
              <div class="pic"><img src="<?= base_url("img/galery/man.png"); ?>" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>HASAN RIDLO ABDULLAH</h4>
                <span>Teknisi &amp; Obvan</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="member" data-aos="zoom-in" data-aos-delay="100">
              <div class="pic"><img src="<?= base_url("img/galery/man.png"); ?>" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>MUH. ARIF ABDURRAHMAN</h4>
                <span>Teknisi &amp; Obvan</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="member" data-aos="zoom-in" data-aos-delay="100">
              <div class="pic"><img src="<?= base_url("img/galery/man.png"); ?>" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>PANJI NUGROHO KUSWINARTO</h4>
                <span>Teknisi &amp; Obvan</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="member" data-aos="zoom-in" data-aos-delay="100">
              <div class="pic"><img src="<?= base_url("img/galery/woman.png"); ?>" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>WIDOWATI BROTONINGSIH</h4>
                <span>Teknisi &amp; Obvan</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                </div>
              </div>
            </div>
          </div>

 

        </div>

      </div>
    </section><!-- End Team Section -->

    

   


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>apps-obvan</span></strong>
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/ -->
        Designed by <a href="<?=base_url();?>">mrdinall</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="<?= base_url("/vendor-home/assets/vendor/purecounter/purecounter_vanilla.js"); ?>"></script>
  <script src="<?= base_url("/vendor-home/assets/vendor/aos/aos.js"); ?>"></script>
  <script src="<?= base_url("/vendor-home/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"); ?>"></script>
  <script src="<?= base_url("/vendor-home/assets/vendor/glightbox/js/glightbox.min.js"); ?>"></script>
  <script src="<?= base_url("/vendor-home/assets/vendor/swiper/swiper-bundle.min.js"); ?>"></script>
  <script src="<?= base_url("/vendor-home/assets/vendor/php-email-form/validate.js"); ?>"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url("/vendor-home/assets/js/main.js"); ?>"></script>

</body>

</html>