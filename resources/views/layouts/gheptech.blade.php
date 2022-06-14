<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@yield('description')">

    <title>{{ config('app.name') }} - @yield('title')</title>

    <!-- Favicons -->
    <link href="{{ asset('vendor/gheptech/img/new-icon.ico') }}" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center">
            <!-- <h1 class="logo me-auto"><a href="index.html">Arsha</a></h1> -->
            <!-- Uncomment below if you prefer to use an image logo -->
            <a href="{{ route('gheptech.home') }}" class="logo me-auto"><img src="{{ asset('vendor/gheptech/img/logo-new.png') }}" alt="" class="img-fluid"></a>

            <!-- Navigation:start -->
            @include('layouts._gheptech._navbar')
            <!-- Navigation:end -->
        </div>
    </header><!-- End Header -->

    <!-- content:start -->
    @yield('content')
    <!-- content:end -->

    <!-- Footer:start -->
    @include('layouts._gheptech._footer')
    <!-- Footer:end -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- jquery -->
    <script src="{{ asset('vendor/jquery/jquery-3.6.0.min.js') }}"></script>
    
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