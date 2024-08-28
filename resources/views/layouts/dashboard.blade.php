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
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assets/NiceAdmin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/NiceAdmin/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/NiceAdmin/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/assets/NiceAdmin/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="/assets/NiceAdmin/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="/assets/NiceAdmin/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/assets/NiceAdmin/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/assets/NiceAdmin/assets/css/style.css" rel="stylesheet" />

    <!-- =======================================================
  * Template Name: NiceAdmin Kampus Merdeka
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Pertukaran Mahasiswa Merdeka 3
  * PMM3 Instagram: https://instagram.com/velikhawk/
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <script src="/assets/landing/js/jquery-3.6.4.min.js"></script>

    @include('sweetalert::alert')

    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a class="sidebar-brand" href="{{ route('DashboardAdmin') }}">
                <span class="d-none d-lg-block"> <img src="/assets/logo-efaktur-remove.png" alt="LOGO_efaktur" style="width: 120px;height: 120px ;">
                </span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="/assets/landing/img/team/team-1.jpg" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ Auth::user()->name }}</h6>
                            <span>Database Administrator</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-gear"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class="bi bi-question-circle"></i>
                                <span>Need Help?</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>

                            <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <!-- Other form fields go here if needed -->
                            </form>

                            <a href="#" onclick="document.getElementById('logoutForm').submit();"
                                class="dropdown-item d-flex align-items-center">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('DashboardAdmin') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#File" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>File</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="File" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/admin/administrasi-db">
                            <i class="bi bi-circle"></i><span>Administrasi DB</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End File Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#faktur" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-journal-text"></i><span>Faktur</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="faktur" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <!--Dropdown Bertingkat-->
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse"
                            data-bs-target="#pajakkeluaran" aria-expanded="false" aria-controls="pajakkeluaran">

                            <i class="bi bi-circle"></i><span>Pajak Keluaran</span><i
                                class="bi bi-chevron-down ms-auto"></i></a>
                        <ul id="pajakkeluaran" class="sidebar-dropdown list-unstyled collapse">
                            <li class="sidebar-item">
                                <a href="/admin/pajak-keluaran" class="sidebar-link"><i
                                        class="bi bi-caret-right-fill"></i><span>Administrasi Faktur</span></a>
                            </li>
                        </ul>
                        <ul id="pajakkeluaran" class="sidebar-dropdown list-unstyled collapse">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link" data-bs-toggle="modal"
                                    data-bs-target="#exportPajakK"><i
                                        class="bi bi-caret-right-fill"></i><span>Export</span></a>
                            </li>
                        </ul>
                        <ul id="pajakkeluaran" class="sidebar-dropdown list-unstyled collapse">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link" data-bs-toggle="modal"
                                    data-bs-target="#importPajakK"><i
                                        class="bi bi-caret-right-fill"></i><span>Import</span></a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse"
                            data-bs-target="#pajakmasukan" aria-expanded="false" aria-controls="pajakmasukan">
                            <i class="bi bi-circle"></i><span>Pajak Masukan</span><i
                                class="bi bi-chevron-down ms-auto"></i>
                        </a>
                        <ul id="pajakmasukan" class="sidebar-dropdown list-unstyled collapse">
                            <li class="sidebar-item">
                                <a href="/admin/pajak-masukan" class="sidebar-link"><i
                                        class="bi bi-caret-right-fill"></i><span>Administrasi Faktur</span></a>
                            </li>
                        </ul>
                        <ul id="pajakmasukan" class="sidebar-dropdown list-unstyled collapse">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link" data-bs-toggle="modal"
                                    data-bs-target="#exportPajakM"><i
                                        class="bi bi-caret-right-fill"></i><span>Export</span></a>
                            </li>
                        </ul>
                        <ul id="pajakmasukan" class="sidebar-dropdown list-unstyled collapse">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-item" data-bs-toggle="modal"
                                    data-bs-target="#importPajakM"><i
                                        class="bi bi-caret-right-fill"></i><span>Import</span></a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse"
                            data-bs-target="#returkeluaran" aria-expanded="false" aria-controls="returkeluaran">
                            <i class="bi bi-circle"></i><span>Retur Pajak Keluaran</span><i
                                class="bi bi-chevron-down ms-auto"></i>
                        </a>
                        <ul id="returkeluaran" class="sidebar-dropdown list-unstyled collapse">
                            <li class="sidebar-item">
                                <a href="/admin/retur-pajak-keluaran" class="sidebar-link"><i
                                        class="bi bi-caret-right-fill"></i><span>Administrasi Nota Retur</span></a>
                            </li>
                        </ul>
                        <ul id="returkeluaran" class="sidebar-dropdown list-unstyled collapse">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link" data-bs-toggle="modal"
                                    data-bs-target="#exportReturK"><i
                                        class="bi bi-caret-right-fill"></i><span>Export</span></a>
                            </li>
                        </ul>
                        <ul id="returkeluaran" class="sidebar-dropdown list-unstyled collapse">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-item" data-bs-toggle="modal"
                                    data-bs-target="#importReturK"><i
                                        class="bi bi-caret-right-fill"></i><span>Import</span></a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse"
                            data-bs-target="#returmasukan" aria-expanded="false" aria-controls="returmasukan">
                            <i class="bi bi-circle"></i><span>Retur Pajak Masukan</span><i
                                class="bi bi-chevron-down ms-auto"></i>
                        </a>
                        <ul id="returmasukan" class="sidebar-dropdown list-unstyled collapse">
                            <li class="sidebar-item">
                                <a href="/admin/retur-pajak-masukan" class="sidebar-link"><i
                                        class="bi bi-caret-right-fill"></i><span>Administrasi Nota Retur</span></a>
                            </li>
                        </ul>
                        <ul id="returmasukan" class="sidebar-dropdown list-unstyled collapse">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link" data-bs-toggle="modal"
                                    data-bs-target="#exportReturM"><i
                                        class="bi bi-caret-right-fill"></i><span>Export</span></a>
                            </li>
                        </ul>
                        <ul id="returmasukan" class="sidebar-dropdown list-unstyled collapse">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-item" data-bs-toggle="modal"
                                    data-bs-target="#importReturM"><i
                                        class="bi bi-caret-right-fill"></i><span>Import</span></a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </li><!-- Faktur -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#dokumenlain" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Dokumen Lain</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="dokumenlain" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="#">
                            <i class="bi bi-circle"></i><span>Pajak Keluaran</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="bi bi-circle"></i><span>Retur Dokumen Lain Pajak Keluaran</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="bi bi-circle"></i><span>Pajak Masukan</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="bi bi-circle"></i><span>Retur Dokumen Lain Pajak Masukan</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="bi bi-circle"></i><span>Faktur Pajak VAT Refund</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse"
                            data-bs-target="#importdata" aria-expanded="false" aria-controls="importdata">
                            <i class="bi bi-circle"></i><span>Import Data</span><i
                                class="bi bi-chevron-down ms-auto"></i>
                        </a>
                        <ul id="importdata" class="sidebar-dropdown list-unstyled collapse">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link"><i class="bi bi-caret-right-fill"></i><span>Dokumen
                                        Lain</span></a>
                            </li>
                        </ul>
                        <ul id="importdata" class="sidebar-dropdown list-unstyled collapse">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link"><i class="bi bi-caret-right-fill"></i><span>Retur
                                        Dokumen Lain</span></a>
                            </li>
                        </ul>
                        <ul id="importdata" class="sidebar-dropdown list-unstyled collapse">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-item"><i class="bi bi-caret-right-fill"></i><span>Faktur
                                        Pajak VAT Refund</span></a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </li><!-- End DOKUMEN LAIN Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#SPT" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-bar-chart"></i><span>SPT</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="SPT" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="#">
                            <i class="bi bi-circle"></i><span>Posting</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="bi bi-circle"></i><span>Buka SPT</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse"
                            data-bs-target="#formlampiran" aria-expanded="false" aria-controls="formlampiran">
                            <i class="bi bi-circle"></i><span>Formulir Lampiran</span><i
                                class="bi bi-chevron-down ms-auto"></i>
                        </a>
                        <ul id="formlampiran" class="sidebar-dropdown list-unstyled collapse">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link"><i
                                        class="bi bi-caret-right-fill"></i><span>A1</span></a>
                            </li>
                        </ul>
                        <ul id="formlampiran" class="sidebar-dropdown list-unstyled collapse">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link"><i
                                        class="bi bi-caret-right-fill"></i><span>A2</span></a>
                            </li>
                        </ul>
                        <ul id="formlampiran" class="sidebar-dropdown list-unstyled collapse">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-item"><i
                                        class="bi bi-caret-right-fill"></i><span>B1</span></a>
                            </li>
                        </ul>
                        <ul id="formlampiran" class="sidebar-dropdown list-unstyled collapse">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-item"><i
                                        class="bi bi-caret-right-fill"></i><span>B2</span></a>
                            </li>
                        </ul>
                        <ul id="formlampiran" class="sidebar-dropdown list-unstyled collapse">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-item"><i
                                        class="bi bi-caret-right-fill"></i><span>B3</span></a>
                            </li>
                        </ul>
                        <ul id="formlampiran" class="sidebar-dropdown list-unstyled collapse">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-item"><i
                                        class="bi bi-caret-right-fill"></i><span>1111AB</span></a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#forminduk"
                            aria-expanded="false" aria-controls="forminduk">
                            <i class="bi bi-circle"></i><span>Formulir Induk</span><i
                                class="bi bi-chevron-down ms-auto"></i>
                        </a>
                        <ul id="forminduk" class="sidebar-dropdown list-unstyled collapse">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link"><i
                                        class="bi bi-caret-right-fill"></i><span>1111</span></a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </li><!-- End SPT Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#refrensi" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-collection"></i><span>Referensi</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="refrensi" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse"
                            data-bs-target="#lawantransaksi" aria-expanded="false" aria-controls="lawantransaksi">
                            <i class="bi bi-circle"></i><span>Lawan Transaksi</span><i
                                class="bi bi-chevron-down ms-auto"></i>
                        </a>
                        <ul id="lawantransaksi" class="sidebar-dropdown list-unstyled collapse">
                            <li class="sidebar-item">
                                <a href="/admin/lawan-transaksi" class="sidebar-link"><i
                                        class="bi bi-caret-right-fill"></i><span>Administrasi Lawan
                                        Transaksi</span></a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link"><i
                                        class="bi bi-caret-right-fill"></i><span>Export</span></a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link"><i
                                        class="bi bi-caret-right-fill"></i><span>Import</span></a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse"
                            data-bs-target="#barangjasa" aria-expanded="false" aria-controls="barangjasa">
                            <i class="bi bi-circle"></i><span>Barang / Jasa</span><i
                                class="bi bi-chevron-down ms-auto"></i>
                        </a>
                        <ul id="barangjasa" class="sidebar-dropdown list-unstyled collapse">
                            <li class="sidebar-item">
                                <a href="/admin/barang-jasa" class="sidebar-link"><i
                                        class="bi bi-caret-right-fill"></i><span>Administrasi Barang / Jasa</span></a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link"><i
                                        class="bi bi-caret-right-fill"></i><span>Export</span></a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link"><i
                                        class="bi bi-caret-right-fill"></i><span>Import</span></a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="/admin/refrensi-nomor-faktur">
                            <i class="bi bi-circle"></i><span>Referensi Nomor Faktur</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="bi bi-circle"></i><span>Administrasi Sertifikat</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/administrasi-user">
                            <i class="bi bi-circle"></i><span>Administrasi User</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="bi bi-circle"></i><span>Setting Aplikasi</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Refrensi Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#managementupload" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-cloud-arrow-up-fill"></i><span>Management Upload</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="managementupload" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/admin/upload-faktur-retur">
                            <i class="bi bi-circle"></i><span>Upload Faktur / Retur</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/profil-pkp">
                            <i class="bi bi-circle"></i><span>Profil PKP</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="bi bi-circle"></i><span>Upload Log</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Management Upload Nav -->

            <li class="nav-heading">Pages</li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#">
                    <i class="bi bi-question-circle"></i>
                    <span>Help</span>
                </a>
            </li><!-- End HELP Page Nav -->
        </ul>
    </aside><!-- End Sidebar-->

    <!--MAIN MENU-->
    <main id="main">

        @yield('main-content')

    </main>
    <!-- END MAIN MENU-->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer" style="background-color: #fff">

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
                    <div class="social-links mt-3">
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

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="/assets/NiceAdmin/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="/assets/NiceAdmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/NiceAdmin/assets/vendor/chart.js/chart.umd.js"></script>
    <script src="/assets/NiceAdmin/assets/vendor/echarts/echarts.min.js"></script>
    <script src="/assets/NiceAdmin/assets/vendor/quill/quill.min.js"></script>
    <script src="/assets/NiceAdmin/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="/assets/NiceAdmin/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="/assets/NiceAdmin/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="/assets/NiceAdmin/assets/js/main.js"></script>

    <!-- The Modal EXPORT-->
    <!--Modal ExPort Pajak Keluaran-->
    <div class="modal" id="exportPajakK">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Export Pajak Keluaran</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form class="row g-3">
                        <div class="row mb-3">
                            <div class="col-sm-2">
                                <label for="npwp1" class="col-form-label">File</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="npwp1" name="search"
                                    style="padding: 4px; width: 100%;">
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                    data-bs-target="#cariNPWP">
                                    <i class="bi bi-floppy"></i> Save File
                                </button>
                            </div>
                        </div>
                </div>

                <!-- Modal footer
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div> -->

            </div>
        </div>
    </div>
    <!--END MODAL EXPORT PAJAK KELUARAN-->

    <!--Modal ExPort Pajak Masukan-->
    <div class="modal" id="exportPajakM">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Export Pajak Masukan</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form class="row g-3">
                        <div class="row mb-3">
                            <div class="col-sm-2">
                                <label for="npwp1" class="col-form-label">File</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="npwp1" name="search"
                                    style="padding: 4px; width: 100%;">
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                    data-bs-target="#cariNPWP">
                                    <i class="bi bi-floppy"></i> Save File
                                </button>
                            </div>
                        </div>
                </div>

                <!-- Modal footer
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div> -->

            </div>
        </div>
    </div>
    <!--END MODAL EXPORT PAJAK Masukan-->

    <!--Modal ExPort Retur Keluaran-->
    <div class="modal" id="exportReturK">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Export Retur Pajak Keluaran</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form class="row g-3">
                        <div class="row mb-3">
                            <div class="col-sm-2">
                                <label for="npwp1" class="col-form-label">File</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="npwp1" name="search"
                                    style="padding: 4px; width: 100%;">
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                    data-bs-target="#cariNPWP">
                                    <i class="bi bi-floppy"></i> Save File
                                </button>
                            </div>
                        </div>
                </div>

                <!-- Modal footer
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div> -->

            </div>
        </div>
    </div>
    <!--END MODAL EXPORT Retur PAJAK KELUARAN-->

    <!--Modal ExPort Retur Pajak Masukan-->
    <div class="modal" id="exportReturM">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Export Retur Pajak Masukan</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form class="row g-3">
                        <div class="row mb-3">
                            <div class="col-sm-2">
                                <label for="npwp1" class="col-form-label">File</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="npwp1" name="search"
                                    style="padding: 4px; width: 100%;">
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                    data-bs-target="#cariNPWP">
                                    <i class="bi bi-floppy"></i> Save File
                                </button>
                            </div>
                        </div>
                </div>

                <!-- Modal footer
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div> -->

            </div>
        </div>
    </div>
    <!--END MODAL EXPORT Retur PAJAK Masukan-->

    <!--Modal Import-->
    <!-- The Modal Import Pajak Keluaran -->
    <div class="modal" id="importPajakK">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Import Faktur Pajak Keluaran</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form class="row g-3">
                        <div class="row mb-3">
                            <div class="col-sm-2">
                                <label for="npwp1" class="col-form-label">File</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="npwp1" name="search"
                                    style="padding: 4px; width: 100%;">
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                    data-bs-target="#cariNPWP">
                                    <i class="bi bi-search"></i> Open File
                                </button>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-2">
                                <label for="npwp1" class="col-form-label">Karakter Pemisah</label>
                            </div>
                            <div class="col-md-1">
                                <input type="text" id="hp" class="form-control" placeholder=",">
                            </div>
                            <div class="col-10">
                                <label for="" class="">Ganti Karakter Pemisah jika File CSV anda
                                    memiliki format pemisah karakter lain</label>
                            </div>
                        </div>
                        <table>

                        </table>
                        <div class="col-10">
                            <label for="" class="">Total Record:</label>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer d-flex justify-content-center">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Proses
                                Import</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--End Modal-->

    <!-- The Modal -->
    <!-- The Modal Import Pajak Masukan -->
    <div class="modal" id="importPajakM">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Import Faktur Pajak Masukan</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form class="row g-3">
                        <div class="row mb-3">
                            <div class="col-sm-2">
                                <label for="npwp1" class="col-form-label">File</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="npwp1" name="search"
                                    style="padding: 4px; width: 100%;">
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                    data-bs-target="#cariNPWP">
                                    <i class="bi bi-search"></i> Open File
                                </button>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-2">
                                <label for="npwp1" class="col-form-label">Karakter Pemisah</label>
                            </div>
                            <div class="col-md-1">
                                <input type="text" id="hp" class="form-control" placeholder=",">
                            </div>
                            <div class="col-10">
                                <label for="" class="">Ganti Karakter Pemisah jika File CSV anda
                                    memiliki format pemisah karakter lain</label>
                            </div>
                        </div>
                        <table>

                        </table>
                        <div class="col-10">
                            <label for="" class="">Total Record:</label>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer d-flex justify-content-center">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Proses
                                Import</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--End Modal Import Pajak Masukan-->

    <!-- The Modal -->
    <!-- The Modal Import Pajak Masukan -->
    <div class="modal" id="importReturK">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Import Retur Faktur Pajak Keluaran</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form class="row g-3">
                        <div class="row mb-3">
                            <div class="col-sm-2">
                                <label for="npwp1" class="col-form-label">File</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="npwp1" name="search"
                                    style="padding: 4px; width: 100%;">
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                    data-bs-target="#cariNPWP">
                                    <i class="bi bi-search"></i> Open File
                                </button>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-2">
                                <label for="npwp1" class="col-form-label">Karakter Pemisah</label>
                            </div>
                            <div class="col-md-1">
                                <input type="text" id="hp" class="form-control" placeholder=",">
                            </div>
                            <div class="col-10">
                                <label for="" class="">Ganti Karakter Pemisah jika File CSV anda
                                    memiliki format pemisah karakter lain</label>
                            </div>
                        </div>
                        <table>

                        </table>
                        <div class="col-10">
                            <label for="" class="">Total Record:</label>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer d-flex justify-content-center">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Proses
                                Import</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--End Modal Import Retur Pajak Keluaran-->

    <!-- The Modal -->
    <!-- The Modal Import Pajak Masukan -->
    <div class="modal" id="importReturM">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Import Retur Faktur Pajak Masukan</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form class="row g-3">
                        <div class="row mb-3">
                            <div class="col-sm-2">
                                <label for="npwp1" class="col-form-label">File</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="npwp1" name="search"
                                    style="padding: 4px; width: 100%;">
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                    data-bs-target="#cariNPWP">
                                    <i class="bi bi-search"></i> Open File
                                </button>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-2">
                                <label for="npwp1" class="col-form-label">Karakter Pemisah</label>
                            </div>
                            <div class="col-md-1">
                                <input type="text" id="hp" class="form-control" placeholder=",">
                            </div>
                            <div class="col-10">
                                <label for="" class="">Ganti Karakter Pemisah jika File CSV anda
                                    memiliki format pemisah karakter lain</label>
                            </div>
                        </div>
                        <table>

                        </table>
                        <div class="col-10">
                            <label for="" class="">Total Record:</label>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer d-flex justify-content-center">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Proses
                                Import</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--End Modal Import Retur Pajak Masukan-->

    <script src="/assets/landing/js/sweetalert2@10.js"></script>
    <script src="/assets/landing/js/jquery-3.6.4.min.js"></script>

</body>

</html>
