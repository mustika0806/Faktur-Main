@extends('layouts.dashboard')

@section('title')
    Upload Faktur
@endsection

@section('body-class')
    services-details-page
@endsection

@section('main-content')
    <!-- Template Main Tabel CSS File -->
    <link href="/assets/landing/css/css_tabel.css" rel="stylesheet" />

    <section id="hero" class="hero">
        <div class="pagetitle">
            <h1>Upload Faktur / Retur</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Management Upload</a></li>
                    <li class="breadcrumb-item active">Upload Faktur / Retur</li>
                </ol>
            </nav>
        </div> <!--End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <div class="container-fluid p-0">
                    <div class="card">
                        <div class="card-header">
                            <button class="btn" type="submit" data-bs-toggle="modal" data-bs-target="#myModal"
                            style="background-color: rgba(238, 129, 78, 1); color: rgb(255, 255, 255); font-family: 'Lato', sans-serif;"
                            ></i>
                                Faktur Pajak Keluaran</button>

                            <button class="btn" type="submit" data-bs-toggle="modal" data-bs-target="#myModal"
                            style="background-color: rgba(238, 129, 78, 1); color: rgb(255, 255, 255); font-family: 'Lato', sans-serif;"
                            ></i>
                                Faktur Pajak Masukan</button>

                            <button class="btn" type="submit" data-bs-toggle="modal" data-bs-target="#myModal"
                            style="background-color: rgba(238, 129, 78, 1); color: rgb(255, 255, 255); font-family: 'Lato', sans-serif;"
                            ></i>
                                Retur Pajak Keluaran</button>

                            <button class="btn" type="submit" data-bs-toggle="modal" data-bs-target="#myModal"
                            style="background-color: rgba(238, 129, 78, 1); color: rgb(255, 255, 255); font-family: 'Lato', sans-serif;"
                            ></i>
                                Retur Pajak Masukan</button>
                        </div>
                        <div class="card-body">

                            <body>
                                <h5>Faktur Pajak</h5>
                                <div>
                                    <!-- Isi Konten -->
                                </div>
                                <div class="d-flex mt-3">
                                    <button type="button" class="btn btn-secondary">Process Quene</button>
                                    <button type="button" class="btn btn-secondary ms-2">Log</button>
                                </div>
                                <table class="table">
                                    <thead>
                                        <br><!--ISIS -->
                                    </thead>
                                    <tbody>
                                        <br><!--ISIS -->
                                    </tbody>
                                </table>
                                <div class="d-flex mt-3">
                                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                        data-bs-target="#modalStart">Start Uploader</button>
                                    <button type="button" class="btn btn-secondary ms-2">Stop Uploader</button>
                                </div>
                                <!--Modal start-->
                                <div class="modal" id="modalStart">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <img src="/assets/logo-efaktur-remove.png" alt="Logo" class="mr-2"
                                                    style="max-width: 120px; max-height: 120px;">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <form class="row g-3">
                                                    <div class="col-sm-12 text-center">
                                                        <strong>
                                                            <h4>Login User PKP</h4>
                                                        </strong>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="#"
                                                                placeholder="CAPTCHA">
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <button type="button" class="btn btn-secondary"
                                                            style="background-color: rgba(238, 129, 78, 1); color: rgb(255, 255, 255); font-family: 'Lato', sans-serif;"
                                                            >Refresh</button>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="#"
                                                                placeholder="Password Enofa">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button class="btn" type="submit"
                                                style="background-color: rgba(238, 129, 78, 1); color: rgb(255, 255, 255); font-family: 'Lato', sans-serif; width: 100%;">
                                                    Submit</button>
                                            </div>


                                        </div>
                                    </div>
                                </div>

                            </body>
                        </div>
                    </div>

                </div>

            </div>
        </section>
    </section>
@endsection
