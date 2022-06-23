<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>{{ config('app.name') }} - Tutorial</title>

    <!-- Favicons -->
    <link href="{{ asset('vendor/gheptech/img/new-icon.ico') }}" rel="icon">

    <!-- Google Fonts -->
    {{-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet"> --}}
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('vendor/gheptech/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/gheptech/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/gheptech/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/gheptech/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/gheptech/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/gheptech/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/gheptech/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('vendor/gheptech/css/style.css') }}" rel="stylesheet">

    {{-- CSS External --}}
    @stack('css-external')
    {{-- CSS Internal --}}
    @stack('css-internal')

    <!-- =======================================================
    * Template Name: Arsha - v4.7.1
    * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top header-inner-pages">
        <div class="container d-flex align-items-center">

        <!-- <h1 class="logo me-auto"><a href="index.html">Arsha</a></h1> -->
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="index.html" class="logo me-auto"><img src="{{ asset('vendor/gheptech/img/logo.png') }}" alt="" class="img-fluid"></a>

        <nav id="navbar" class="navbar">
            <ul>
            <li><a class="nav-link scrollto active" href="{{ route('gheptech.home') }}">Home</a></li>
            <li><a class="nav-link scrollto" href="{{ route('product.index') }}">Shop</a></li>
            <li><a class="nav-link scrollto" href="{{ route('tutorial.index') }}">Tutorial</a></li>
            <li class="dropdown"><a href="#services"><span>Layanan</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                <li><a href="#">Website <span class="badge bg-danger">HOT</span></a></li>
                <li><a href="#">Desain Logo</a></li>
                <li><a href="#">Mobile App</a></li>
                <li><a href="#">SEO</a></li>
                </ul>
            </li>
            <li><a class="nav-link   scrollto" href="#portfolio">Portfolio <span class="badge bg-info">New</span></a></li>
            <li><a class="nav-link   scrollto" href="#portfolio">Team</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">
                <div class="row d-flex">
                    <ol class="col-lg-8">
                        {{-- <li>{{ Breadcrumbs::render('shops') }}</li> --}}
                    </ol>
                    <div class="col-lg-4">
                        <input class="form-control"  placeholder="search product...">
                    </div>
                </div>
                
            </div>
        </section><!-- End Breadcrumbs -->
        
        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="portfolio-info">
                            <h3>KATEGORI</h3>
                            <ul class="list-group">
                                
                            </ul>
                        </div>
                        <div class="portfolio-info">
                            <h3>Tag</h3>
                            <div class="d-flex">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. <span class="badge bg-primary">Rp 120.000</span></p>
                                <img src="https://source.unsplash.com/300x300/?e-book javascript" class="card-img-top" alt="..." style="width: 80px; height: 70px;">
                            </div>
                            <div class="d-flex">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. <span class="badge bg-primary">Rp 120.000</span></p>
                                <img src="https://source.unsplash.com/300x300/?e-book javascript" class="card-img-top" alt="..." style="width: 80px; height: 70px;">
                            </div>
                            <div class="d-flex">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. <span class="badge bg-primary">Rp 120.000</span></p>
                                <img src="https://source.unsplash.com/300x300/?e-book javascript" class="card-img-top" alt="..." style="width: 80px; height: 70px;">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                            <h5>
                                <a href="/tutorial/{{ $tutorial->slug }}">{{ $tutorial->title }}</a>
                            </h5>
                            <p>
                                {{ $tutorial->excerpt }}
                            </p>
                            <p>
                                {!! $tutorial->body !!}
                            </p>
                    </div>
                </div>
            </div>
        </section><!-- End Portfolio Details Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-newsletter">
        <div class="container">
            <div class="row justify-content-center">
            <div class="col-lg-6">
                <h4>Join Our Newsletter</h4>
                <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
                <form action="" method="post">
                <input type="email" name="email"><input type="submit" value="Subscribe">
                </form>
            </div>
            </div>
        </div>
        </div>

        <div class="footer-top">
            <div class="container">
            <div class="row">
    
                <div class="col-lg-3 col-md-6 footer-contact">
                <h3><a href="index.html" class="logo me-auto"><img src="{{ asset('vendor/gheptech/img/logo.png') }}" alt="" class="img-fluid"></a></h3>
                <p>
                    Jl.Arumba No.31 <br>
                    Malang, 58167<br>
                    Jawa Timur <br><br>
                    <strong>Phone:</strong> +62 85203568748<br>
                    <strong>Email:</strong> info@gheptech.com<br>
                </p>
                </div>
    
                <div class="col-lg-3 col-md-6 footer-links">
                <h4>Menu</h4>
                <ul>
                    <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                </ul>
                </div>
    
                <div class="col-lg-3 col-md-6 footer-links">
                <h4>Layanan</h4>
                <ul>
                    <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
                </ul>
                </div>
    
                <div class="col-lg-3 col-md-6 footer-links">
                <h4>Social Media</h4>
                <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
                <div class="social-links mt-3">
                    <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                    <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                    <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                    <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                </div>
                </div>
    
            </div>
            </div>
        </div>

        <div class="container footer-bottom clearfix">
        <div class="copyright">
            &copy; Copyright <strong><span>Gheptech 2022</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('vendor/gheptech/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('vendor/gheptech/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/gheptech/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('vendor/gheptech/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('vendor/gheptech/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/gheptech/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('vendor/gheptech/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('vendor/gheptech/js/main.js') }}"></script>

</body>

</html>