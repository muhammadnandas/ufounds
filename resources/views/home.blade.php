<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>UFound UNSRI</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="https://example.com/favicon.png" rel="icon">
  <link href="https://example.com/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css"
    rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/glightbox/3.2.0/css/glightbox.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/10.2.0/swiper-bundle.min.css" rel="stylesheet">

  <style>
    /* Base Styles */
    body {
      font-family: 'Open Sans', sans-serif;
      color: #333;
      background-color: #f8f9fa;
      line-height: 1.6;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      font-family: 'Poppins', sans-serif;
      margin-bottom: 15px;
    }

    a {
      color: #0056b3;
      text-decoration: none;
    }

    .section-title h2 {
      font-size: 36px;
      font-weight: bold;
      text-align: center;
      color: #343a40;
      margin-bottom: 20px;
    }

    .section-title p {
      text-align: center;
      margin-bottom: 40px;
    }

    /* Top Bar Styles */
    #topbar {
      background-color: #343a40;
      color: #fff;
      padding: 10px 0;
      font-size: 14px;
      position: relative;
      z-index: 999;
    }

    #topbar .contact-info {
      margin-right: 20px;
    }

    #topbar .contact-info i {
      margin-right: 5px;
    }

    #topbar .contact-info a {
      margin-right: 10px;
      color: #fff;
      transition: color 0.1s;
    }

    #topbar .contact-info a:hover {
      color: #0056b3;
    }

    #topbar .social-links a {
      font-size: 18px;
      margin-left: 10px;
      color: #fff;
      transition: color 0.1s;
    }

    #topbar .social-links a:hover {
      color: #0056b3;
    }


    @media (max-width: 768px) {
      #topbar .social-links {
        display: none;
      }
    }

    /* Header Styles */
    #header {
      background-color: #fff;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      transition: all 0.3s;
      padding: 20px 0;
    }

    #header .logo {
      font-size: 32px;
      font-weight: 700;
      text-transform: uppercase;
    }

    #header .navbar ul {
      display: flex;
      list-style: none;
      margin: 0;
      padding: 0;
    }

    #header .navbar ul li {
      margin-right: 20px;
    }

    #header .navbar ul li:last-child {
      margin-right: 0;
    }

    #header .navbar ul li a {
      color: #333;
      font-size: 16px;
      font-weight: 500;
      text-decoration: none;
      transition: color 0.1s;
    }

    #header .navbar ul li a:hover {
      color: #007bff;
    }

    #header .mobile-nav-toggle {
      font-size: 24px;
      cursor: pointer;
      color: #333;
      display: none;
    }

    @media (max-width: 768px) {
      #header {
        padding: 15px 0;
      }

      #header .navbar ul {
        display: none;
        flex-direction: column;
        background-color: #fff;
        position: absolute;
        top: 70px;
        left: -150px;
        width: 200px;
        padding: 15px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        z-index: 998;
      }

      #header .navbar ul.active {
        display: flex;
      }

      #header .mobile-nav-toggle {
        display: block;
      }
    }

    /* Hero Section */
    #hero {
      width: 100%;
      height: 100vh;
      background-size: cover;
      position: relative;
    }

    #hero .carousel-inner {
      height: 100vh;
    }

    #hero .carousel-item {
      position: relative;
      height: 100vh;
      background: no-repeat center center;
      background-size: cover;
    }

    #hero .carousel-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    /* Featured Services Section */
    .featured-services {
      padding: 60px 0;
      background: #fff;
    }

    .featured-services .icon-box {
      text-align: center;
      padding: 30px;
      background: #f9f9f9;
      transition: 0.1s;
    }

    .featured-services .icon-box .icon {
      margin-bottom: 10px;
    }

    .featured-services .icon-box .icon i {
      font-size: 48px;
      color: #0056b3;
    }

    .featured-services .icon-box h4 {
      font-size: 24px;
      margin: 20px 0 10px 0;
      font-weight: bold;
    }

    .featured-services .icon-box h4 a {
      color: #0056b3;
    }

    .featured-services .icon-box:hover {
      background: #0056b3;
      color: #fff;
    }

    .featured-services .icon-box:hover .icon i {
      color: #fff;
    }

    .featured-services .icon-box:hover h4 a {
      color: #fff;
    }

    /* About Us Section */
    .about .section-title {
      text-align: center;
      margin-bottom: 40px;
    }

    .about .content {
      padding-top: 20px;
    }

    .about .content h4 {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 20px;
    }

    .about .content ul {
      list-style: none;
      padding: 0;
    }

    .about .content ul li {
      padding: 10px 0;
    }

    .about .content ul li i {
      color: #0056b3;
      margin-right: 8px;
    }

    /* Why Us Section */
    .why-us .content-item {
      background: #fff;
      padding: 30px;
      margin-bottom: 15px;
      transition: 0.1s;
      text-align: center;
      color: #0056b3;
    }

    .why-us .content-item:hover {
      background: #0056b3;
      color: #fff;
    }

    /* Services Section */
    .services {
      padding: 60px 0;
      background: #fff;
    }

    .services .icon-box {
      text-align: center;
      padding: 30px;
      background: #f9f9f9;
      transition: 0.1s;
    }

    .services .icon-box .icon {
      margin-bottom: 10px;
    }

    .services .icon-box .icon i {
      font-size: 48px;
      color: #0056b3;
    }

    .services .icon-box h4 {
      font-size: 24px;
      margin: 20px 0 10px 0;
      font-weight: bold;
    }

    .services .icon-box h4 a {
      color: #0056b3;
    }

    .services .icon-box:hover {
      background: #0056b3;
      color: #fff;
    }

    .services .icon-box:hover .icon i {
      font-size: 48px;
      color: #fff;
    }

    .services .icon-box:hover h4 a {
      color: #fff;
    }

    /* Career Section */
    .karir {
      padding: 60px 0;
      background: #f8f9fa;
    }

    .karir .icon-box {
      text-align: center;
      padding: 30px;
      background: #fff;
      transition: 0.1s;
    }

    .karir .icon-box .icon {
      margin-bottom: 10px;
    }

    .karir .icon-box .icon i {
      font-size: 48px;
      color: #0056b3;
    }

    .karir .icon-box h4 {
      font-size: 24px;
      margin: 20px 0 10px 0;
      font-weight: bold;
    }

    .karir .icon-box:hover {
      background: #0056b3;
      color: #fff;
    }

    /* Contact Section */
    .contact {
      padding: 60px 0;
    }

    .contact .info {
      margin-bottom: 20px;
    }

    .contact .info i {
      font-size: 20px;
      color: #0056b3;
      margin-right: 10px;
    }

    .contact .info h4 {
      font-size: 20px;
      font-weight: bold;
      margin: 0 0 10px 0;
    }

    .contact .info p {
      font-size: 14px;
      margin: 0;
    }

    .contact .php-email-form {
      width: 100%;
      background: #fff;
      padding: 30px;
      box-shadow: 0px 0 30px rgba(0, 0, 0, 0.1);
    }

    .contact .php-email-form .form-group {
      margin-bottom: 20px;
    }

    .contact .php-email-form button[type="submit"] {
      background: #0056b3;
      border: 0;
      padding: 10px 24px;
      color: #fff;
      transition: 0.4s;
      border-radius: 4px;
    }

    .contact .php-email-form button[type="submit"]:hover {
      background: #00376d;
    }

    /* Footer */
    #footer {
      background: #343a40;
      padding: 30px 0;
      color: #fff;
    }

    #footer .copyright {
      text-align: center;
      margin-top: 15px;
    }

    /* Responsive Styles */
    @media (max-width: 992px) {
      .contact .info {
        text-align: center;
      }
    }

    .carousel-item {
      position: relative;
    }

    .overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      /* Warna overlay dengan opasitas 50% */
    }
  </style>
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope-fill"></i><a href="mailto:">ufoundunsri@gmail.com</a>
        <i class="bi bi-phone-fill phone-icon"></i> 0896-0378-6772
      </div>
      <div class="social-links d-none d-md-block">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center sticky-top">
    <div class="container d-flex align-items-center">
      <h1 class="logo me-auto my-3"><a href="{{ url('/') }}">UFound</a></h1>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
          <li><a class="nav-link scrollto" href="#about">Tentang Kami</a></li>
          <li><a class="nav-link scrollto" href="#contact">Kontak Kami</a></li>
          <li><a class="nav-link scrollto" href="{{ route('login') }}">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="scrolled-offset">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active" style="background-image: url({{ asset('assets/img/uf.png') }})">
          <div class="overlay"></div> <!-- Overlay div added here -->
          <div class="carousel-container">
            <div class="container text-center position-relative">
              <h1 class="display-5 fw-bold text-white position-absolute bottom-0 start-50 translate-middle">UFound
                Universitas Sriwijaya</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services section-bg">
      <div class="container">
        <div class="row no-gutters">


          <div class="col-lg-4 col-md-6 mt-4">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-bag-fill"></i></div>
              <h4 class="title">Tas & Backpack</h4>
              <p>Tas, ransel, atau barang pribadi yang hilang di area kampus.</p>
              <a href="{{ route('login') }}" class="btn btn-primary mt-3">
                <i class="bi bi-clipboard-check"></i> Ajukan Klaim
              </a>
            </div>
          </div>

          <!-- Card 2 -->
          <div class="col-lg-4 col-md-6 mt-4">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-laptop"></i></div>
              <h4 class="title">Elektronik</h4>
              <p>Handphone, laptop, charger, earphone, dan perangkat elektronik lainnya.</p>
              <a href="{{ route('login') }}" class="btn btn-primary mt-3">
                <i class="bi bi-clipboard-check"></i> Ajukan Klaim
              </a>
            </div>
          </div>

          <!-- Card 3 -->
          <div class="col-lg-4 col-md-6 mt-4">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-wallet2"></i></div>
              <h4 class="title">Dompet & Aksesoris</h4>
              <p>Dompet, KTP, kartu mahasiswa, kunci, jam tangan, dll.</p>
              <a href="{{ route('login') }}" class="btn btn-primary mt-3">
                <i class="bi bi-clipboard-check"></i> Ajukan Klaim
              </a>
            </div>
          </div>

        </div>
      </div>
    </section><!-- End Featured Services Section -->

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container my-5">
        <div class="section-title">
          <h2>Tentang Kami</h2>
          <p align="justify">U-Found hadir sebagai solusi sederhana untuk masalah yang sering terjadi di lingkungan
            kampus: kehilangan dan menemukan barang. Kami percaya bahwa setiap barang yang hilang memiliki peluang untuk
            kembali kepada pemiliknya, selama ada sistem yang tepat untuk menghubungkan orang-orang yang terlibat.
            Melalui platform ini, pengguna dapat saling membantu dengan melaporkan barang temuan maupun mencari barang
            yang hilang, tanpa perlu berbagi informasi pribadi secara langsung. Dengan sistem verifikasi yang aman dan
            terstruktur, U-Found berupaya menciptakan lingkungan kampus yang lebih peduli, tertib, dan saling terhubung.
          </p>
        </div>
      </div>
      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us py-5" style="background-color: #f8f9fa;">
      <div class="container">

        <!-- Judul Section -->
        <div class="text-center mb-5">
          <h2><b>Manfaat Sistem</b></h2>
          <p>Mengapa sistem ini penting untuk lingkungan kampus?</p>
        </div>

        <!-- Isi Manfaat -->
        <div class="row text-start">

          <div class="col-md-6 mb-4">
            <h5>🔍 Mempermudah Pencarian</h5>
            <p>Mahasiswa dapat dengan cepat menemukan barang yang hilang tanpa harus mencarinya secara manual.</p>
          </div>

          <div class="col-md-6 mb-4">
            <h5>🤝 Membantu Pengembalian</h5>
            <p>Barang yang ditemukan dapat segera dikembalikan kepada pemiliknya dengan sistem yang terstruktur.</p>
          </div>

          <div class="col-md-6 mb-4">
            <h5>📉 Mengurangi Kehilangan</h5>
            <p>Meminimalisir kasus kehilangan tanpa solusi di lingkungan kampus.</p>
          </div>

          <div class="col-md-6 mb-4">
            <h5>❤️ Meningkatkan Kepedulian</h5>
            <p>Mendorong rasa kepedulian dan tanggung jawab antar mahasiswa.</p>
          </div>

        </div>

      </div>
    </section>>

    <!-- ======= Services Section ======= -->
    <section class="py-5" style="background:#f8f9fa;">
      <div class="container text-center">

        <!-- Judul -->
        <h2 class="fw-bold mb-3">Cara Kerja U-Found</h2>
        <p class="text-muted mb-5">
          Temukan dan kembalikan barang dengan langkah yang mudah dan terstruktur
        </p>

        <div class="row g-4">

          <!-- Step 1 -->
          <div class="col-md-2 col-6">
            <div class="step-card p-4">
              <div class="step-number">1</div>
              <i class="bi bi-box-arrow-in-down step-icon"></i>
              <h6 class="mt-3 fw-bold">Laporkan</h6>
              <p class="small text-muted">Laporkan barang yang ditemukan</p>
            </div>
          </div>

          <!-- Step 2 -->
          <div class="col-md-2 col-6">
            <div class="step-card p-4">
              <div class="step-number">2</div>
              <i class="bi bi-search step-icon"></i>
              <h6 class="mt-3 fw-bold">Cari</h6>
              <p class="small text-muted">Cari barang yang hilang</p>
            </div>
          </div>

          <!-- Step 3 -->
          <div class="col-md-2 col-6">
            <div class="step-card p-4">
              <div class="step-number">3</div>
              <i class="bi bi-file-earmark-check step-icon"></i>
              <h6 class="mt-3 fw-bold">Klaim</h6>
              <p class="small text-muted">Ajukan kepemilikan barang</p>
            </div>
          </div>

          <!-- Step 4 -->
          <div class="col-md-2 col-6">
            <div class="step-card p-4">
              <div class="step-number">4</div>
              <i class="bi bi-calendar-check step-icon"></i>
              <h6 class="mt-3 fw-bold">Atur Jadwal</h6>
              <p class="small text-muted">Tentukan waktu & lokasi</p>
            </div>
          </div>

          <!-- Step 5 -->
          <div class="col-md-2 col-12 mx-auto">
            <div class="step-card p-4">
              <div class="step-number">5</div>
              <i class="bi bi-check-circle step-icon"></i>
              <h6 class="mt-3 fw-bold">Selesai</h6>
              <p class="small text-muted">Barang kembali ke pemilik</p>
            </div>
          </div>

        </div>
      </div>
    </section>


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">
        <div class="section-title">
          <h2>Kontak Kami</h2>
        </div>
        <div class="row">
          <div class="col-lg-6 mt-4">
            <div class="info">
              <div class="address mb-3">
                <i class="bi bi-geo-alt fs-3"></i>
                <h4>Lokasi:</h4>
                <p>Jln. Srijaya Negara, Palembang, Sumatera Selatan</p>
              </div>
              <div class="email mb-3">
                <i class="bi bi-envelope fs-3"></i>
                <h4>Email:</h4>
                <p>ufoundunsri@gmail.com</p>
              </div>
              <div class="phone mb-3">
                <i class="bi bi-phone fs-3"></i>
                <h4>Telepon:</h4>
                <p>0896-0378-6772</p>
              </div>
            </div>
          </div>
          <div class="col-lg-6 mt-4">
            <form action="" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="nama">Nama</label>
                  <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                </div>
              </div>
              <div class="form-group mt-3 mt-md-0">
                <label for="subjek">Subjek</label>
                <input type="text" class="form-control" name="subjek" id="subjek" placeholder="Subjek" required>
              </div>
              <div class="form-group mt-3">
                <label for="pesan">Pesan</label>
                <textarea class="form-control" name="pesan" id="pesan" rows="5" placeholder="Pesan" required></textarea>
              </div>
              <div class="text-center"><button type="submit">Kirim Pesan</button></div>
            </form>
          </div>
        </div>
      </div>
    </section><!-- End Contact Section -->
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span>UFound Unsri 2026</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->

  <!-- Vendor JS Files -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/glightbox/3.2.0/glightbox.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/10.2.0/swiper-bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/noframework.waypoints.min.js"></script>

  <!-- Template Main JS File -->

  <script>
    const navToggle = document.querySelector('.mobile-nav-toggle');
    const navbar = document.querySelector('#navbar ul');

    navToggle.addEventListener('click', () => {
      navbar.classList.toggle('active');
    });

    // Tutup navigasi saat salah satu menu diklik (opsional)
    navbar.querySelectorAll('a').forEach(item => {
      item.addEventListener('click', () => {
        navbar.classList.remove('active');
      });
    });
  </script>
</body>

</html>