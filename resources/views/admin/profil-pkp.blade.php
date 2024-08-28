@extends('layouts.dashboard')

@section('title')
    Profil PKP
@endsection

@section('body-class')
    services-details-page
@endsection

@section('main-content')
    <!-- Template Main Tabel CSS File -->
    <link href="/assets/landing/css/css_tabel.css" rel="stylesheet" />

    <section id="hero" class="hero">
        <div class="pagetitle">
            <h1>Profil PKP</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Management Upload</a></li>
                    <li class="breadcrumb-item active">Profil PKP</li>
                </ol>
            </nav>
        </div> <!--End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <div class="container-fluid p-0">
                    <div class="card">
                        <div class="card-header">
                            <h6>Ubah Profil PKP</h6>
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
                                <form class="row g-3" action="{{ route('AddProfilPkp') }}"method="post">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="" class="col-sm-2 col-form-label">Nama PKP</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="#" name="nama_pkp"
                                                value="{{ old('user_lokal.npwp', Auth::user()->pkp()->nama_pkp) }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="" class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="#" name="alamat" aria-label="With textarea"></textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="" class="col-sm-2 col-form-label">Kode Pos</label>
                                        <div class="col-sm-10">
                                            <div class="input-view-container">
                                                <input type="text" class="form-control" id="#" name="kode_pos">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="" class="col-sm-2 col-form-label">Nomer Telpon</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="#" name="nomer_telfon">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-2 col-form-label">
                                            <label for="hp" class="col-form-label">HP</label>
                                        </div>
                                        <div class="col-auto">
                                            <input type="text" id="#" name="hp" class="form-control">
                                        </div>
                                        <div class="col-sm-2 col-form-label">
                                            <label for="hp" class="col-form-label">Fax</label>
                                        </div>
                                        <div class="col-auto">
                                            <input type="text" id="#" name="fax" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-2 col-form-label">
                                            <label for="hp" class="col-form-label">Penandatanganan</label>
                                        </div>
                                        <div class="col-auto">
                                            <input type="text" id="#" name="penandatangan" class="form-control">
                                        </div>
                                        <div class="col-sm-2 col-form-label">
                                            <label for="hp" class="col-form-label">Jabatan</label>
                                        </div>
                                        <div class="col-auto">
                                            <input type="text" id="#" name="jabatan" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-2 col-form-label">
                                            <label for="hp" class="col-form-label">Tahun Buku</label>
                                        </div>
                                        <div class="col-md-1">
                                            <input type="text" id="#" name="tahun_buku_awal" class="form-control">
                                        </div>
                                        <div class="col-sm-1 col-form-label-sm">
                                            <label for="hp" class="col-form-label-sm">s/d</label>
                                        </div>
                                        <div class="col-md-1">
                                            <input type="text" id="#" name="tahun_buku_akhir" class="form-control">
                                        </div>
                                    </div>
                                    <div class="d-grid gap-3 d-md-flex justify-content-md-end">
                                        <button class="btn btn-primary" type="submit"><i class="bi bi-floppy"></i>
                                            Simpan</button>

                                    </div>

                        </div>
                    </div>
                    </form>
                </div>
            </div>

            </div>

            </div>
        </section>
    @endsection
