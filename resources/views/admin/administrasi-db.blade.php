@extends('layouts.dashboard')

@section('title')
    Administrasi DB
@endsection

@section('body-class')
    services-details-page
@endsection

@section('main-content')
    <!-- Template Main Tabel CSS File -->
    <link href="/assets/landing/css/css_tabel.css" rel="stylesheet" />

    <section id="hero" class="hero">
        <div class="pagetitle">
            <h1>Administrasi Database</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">File</a></li>
                    <li class="breadcrumb-item active">Administrasi DB</li>
                </ol>
            </nav>
        </div> <!--End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <div class="container-fluid p-0">
                    <div class="card">
                        <div class="card-header">
                            <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#myModal"
                            style="background-color: rgba(238, 129, 78, 1); color: rgb(255, 255, 255); font-family: 'Lato', sans-serif;"
                            ><i
                                    class="bi bi-plus"></i>
                                Buat Database Baru</button>
                            <!-- The Modal -->
                            <div class="modal" id="myModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header d-flex justify-content-center">
                                            <h4 class="modal-title text-center">Buat Database Baru</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <form>
                                                <div class="mb-2 d-flex">
                                                    <input type="text" class="form-control" id="inputData"
                                                        placeholder="Ketikan nama database" style="width: 80%;">
                                                    <button type="button"
                                                    style="background-color: rgba(238, 129, 78, 1); color: rgb(255, 255, 255); font-family: 'Lato', sans-serif;"><i
                                                            class="bi bi-plus"></i>Tambah</button></button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Modal-->
                        <div class="modal" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!--modal header-->
                                    <div class="modal-header"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <body>
                                <h3 style="text-align: center;">Administrasi Database</h3>
                                <table class="table">
                                    <thead class="table-dark" style="text-align: center;">
                                        <td>Nama Database</td>
                                        <td>Aksi</td>
                                    </thead>
                                    <tbody>
                                        <td>PT Hawk</td>
                                        <td class="text-center">
                                            <button class="btn" type="submit"
                                            style="background-color: rgba(238, 129, 78, 1); color: rgb(255, 255, 255); font-family: 'Lato', sans-serif;">Koneksi
                                                Database</button>
                                        </td>
                                    </tbody>
                                </table>
                        </div>

                    </div>
        </section>
    @endsection
