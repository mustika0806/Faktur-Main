<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <meta name="theme-color" content="#F5821F" />

    <title>@yield('title', 'Home') | {{ env('APP_NAME') }}</title>

    <link rel="canonical" href="{{ url('/') }}" />

    <!-- Meta for SEO Friendly -->
    <meta name="description" content="{{ env('APP_DESCRIPTION') }}" />
    <meta name="keywords" content="{{ env('APP_KEYWORDS') }}" />
    <meta name="author" content="{{ env('APP_AUTHOR') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <meta name="robots" content="index, follow" />


    <!-- Meta for Security -->
    <!-- <meta http-equiv="Content-Security-Policy" content="default-src https: 'unsafe-eval' 'unsafe-inline'; object-src 'none'" /> -->


    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="/assets/landing/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/assets/landing/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="/assets/landing/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
    <link href="/assets/landing/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />
    <link href="/assets/landing/vendor/aos/aos.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="/assets/landing/css/main.css" rel="stylesheet" />

    <!-- =======================================================
  * Pertukaran Mahasiswa Merdeka 3
  * Template Name: Append
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/append-bootstrap-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="@yield('body-class', 'index-page')" data-bs-spy="scroll" data-bs-target="#navmenu">

    @include('sweetalert::alert')


    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center mb-2">
        <div class="container-fluid d-flex align-items-center justify-content-between">

            <a href="/" class="logo d-flex align-items-center me-auto me-xl-0">
                <span class="d-none d-lg-block">
                    <img src="/assets/logo-efaktur-remove-fix.png" alt="LOGO_efaktur">
                </span>
            </a>

            <!-- Nav Menu -->
            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="/" class="active">Home</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Blog</a></li>

                    @auth
                    <li><a href="{{ route('DashboardAdmin') }}" class="">Dashboard</a></li>

                    @else
                    <li class="dropdown has-dropdown"><a href="#"><span>PKP</span> <i
                                class="bi bi-chevron-down"></i></a>
                        <ul class="dd-box-shadow">
                            <li><a href="/auth/regis/user-pkp">Registrasi E-Tax Invoice</a></li>
                        </ul>
                    </li>
                    @endauth

                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav><!-- End Nav Menu -->

            <!-- Button Samping
                 <a class="btn-getstarted" href="/auth/login/user-lokal">Login User</a> -->

        </div>

    </header><!-- End Header -->

    <main id="main">

        @yield('main-content')

    </main>

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-about">
                    <a href="/" class="logo d-flex align-items-center">
                        <span>
                            <h1>E-Faktur</h1>
                            <span>Bantu Pajak</span>
                        </span>
                    </a>
                    <p>{{ env('APP_DESCRIPTION') }}</p>
                    <div class="social-links d-flex mt-4">
                        <a href="https://www.twitter.com/polibatam "><i class="bi bi-twitter"></i></a>
                        <a href="https://www.facebook.com/PolibatamOfficial/"><i class="bi bi-facebook"></i></a>
                        <a href="https://www.instagram.com/polibatamofficial/"><i class="bi bi-instagram"></i></a>
                        <a href="https://www.youtube.com/channel/UCxKsDnDYt30bMdXyakD_ZCw"><i
                                class="bi bi-youtube"></i></a>
                    </div>
                    <div class="col-lg-10 mt-3">
                        <p><strong>For Your Goals Beyond Horizon</strong></p>
                    </div>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Services</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><a href="#">E-Filling</a></li>
                        <li><a href="#">E-Form</a></li>
                        <li><a href="#">E-Bupot</a></li>
                        <li><a href="#">E-Faktur</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                    <h4>Contact Us</h4>
                    <p><strong>Tax Center Politeknik Negeri Batam</strong></p>
                    <p><strong>Alamat:</strong> Ruang Tax Center Polibatam Lantai Dasar<br>Gedung Perkuliahan Tower A<br>Politeknik Negeri Batam</p>
                    <p><strong>Phone:</strong> <span>+62-813-7802-1623</span></p>
                    <p><strong>Gmail:</strong> <span>taxcenter@polibatam.ac.id</span></p>
                    <p><strong>Situs:</strong> <a href="https://taxcenter-polibatam.id/">Tax Center Polibatam</a></p>
                </div>

            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>&copy; <span>Copyright</span> <strong class="px-1">E-Faktur Versi Edukasi</strong> <span>All Rights
                    Reserved</span></p>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you've purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                Designed by <a href="#">PBL IF-26</a>
            </div>
        </div>

    </footer><!-- End Footer -->

    <!-- Scroll Top Button -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>

    <!-- Vendor JS Files -->
    <script src="/assets/landing/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/landing/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/assets/landing/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="/assets/landing/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/assets/landing/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/assets/landing/vendor/aos/aos.js"></script>
    <script src="/assets/landing/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="/assets/landing/js/main.js"></script>

</body>

</html>
