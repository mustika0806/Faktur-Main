@extends('layouts.dashboard')

@section('title')
    Administrasi Pajak Masukan
@endsection

@section('body-class')
    services-details-page
@endsection

@section('main-content')
    <!-- Template Main Tabel CSS File -->
    <link href="/assets/landing/css/css_tabel.css" rel="stylesheet" />

    <section id="hero" class="hero">
        <div class="pagetitle">
            <h1>Pajak Masukan</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Faktur</a></li>
                    <li class="breadcrumb-item active">Pajak Masukan</li>
                </ol>
            </nav>
        </div> <!--End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <div class="container-fluid p-0">
                    <div class="card">
                        <div class="card-header">
                            <button class="btn" type="submit" data-bs-toggle="modal" data-bs-target="#modalRekam"
                            style="background-color: rgba(238, 129, 78, 1); color: rgb(255, 255, 255); font-family: 'Lato', sans-serif;"><i
                                    class="bi bi-plus"></i>
                                Rekam Faktur</button>
                        </div>
                        <!--Modal-->
                        <!--Modal Rekam-->
                        <!-- The Modal -->
                        <div class="modal" id="modalRekam">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Rekam Faktur Pajak Masukan</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <form class="row g-3 my-2">
                                            <div class="row mb-3">
                                                <h3>Lawan Transaksi</h3>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="" class="col-sm-2 col-form-label">Nomor Faktur</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="#">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="" class="col-sm-2 col-form-label">NPWP Lawan
                                                    Transaksi</label>
                                                <div class="col-sm-8">
                                                    <input type="text" style="padding: 4px; width: 80%;" name="search">
                                                    <!--Button Cari-->
                                                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                                        data-bs-target="#cariNPWP"><i class="bi bi-search"></i>Cari
                                                        NPWP</button>
                                                    <!--End Button Cari-->

                                                    <div class="col-10">
                                                        <label for="" class="">Masukan NPWP Untuk
                                                            Melanjutkan</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="" class="col-sm-2 col-form-label">Nama Lawan
                                                    Transaksi</label>
                                                <div class="col-sm-8 col-form-label">
                                                    <input type="text" style="padding: 4px; width: 80%;">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-2 col-form-label">
                                                    <label for="hp" class="col-form-label">Tanggal Faktur</label>
                                                </div>
                                                <div class="col-auto">
                                                    <input type="date" id="hp" class="form-control"
                                                        placeholder="dd/mm/yyyy">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="col-sm-3">
                                                <h4>Pelaporan SPT</h4>
                                                <p>Masa Pelaporan Faktur Pajak Masukan</p>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-2 col-form-label">
                                                    <label for="hp" class="col-form-label">Masa Pajak</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="number" id="hp" class="form-control" placeholder="Masa Pajak" min="1" max="12" pattern="\d{1,2}" title="Masukkan angka antara 1 dan 12">
                                                </div>
                                                <div class="col-sm-2 col-form-label">
                                                    <label for="hp" class="col-form-label">Tahun Pajak</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="number" id="hp" class="form-control" placeholder="Tahun Pajak" min="2000" max="2090" pattern="\d{4}" title="Masukkan tahun dengan format empat digit" minlength="4" maxlength="4" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                                </div>
                                            </div>
                                            <div class="col-10">
                                                <label for="fakturPajakMasukan" class="form-label">Apakah Faktur Pajak
                                                    Masukan ini dapat dikreditkan?</label>
                                                <div class="row">
                                                    <div class="col-sm-3 text-center">
                                                        <label for="ya">Ya</label>
                                                        <input type="radio" id="ya" name="pilihan" value="ya">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label for="tidak">Tidak</label>
                                                        <input type="radio" id="tidak" name="pilihan" value="tidak">
                                                    </div>
                                                </div>
                                            </div>


                                            <hr>
                                            <div class="col-sm-3">
                                                <h4>Nilai Faktur Pajak</h4>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="" class="col-sm-2 col-form-label">Jumlah DPP</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="#"
                                                        placeholder="0">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="" class="col-sm-2 col-form-label">Jumlah PPN</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="#"
                                                        placeholder="0">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="" class="col-sm-2 col-form-label">Jumlah PPnBm</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="#"
                                                        placeholder="0">
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><i
                                                class="bi bi-floppy"></i> Simpan</button>
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i
                                                class="bi bi-x-circle"></i> Tutup</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--End Modal-->
                        <!--Modal Cari NPWP Lawan Transaki-->
                        <div class="modal" id="cariNPWP">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Cari Lawan Transaksi</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <form class="row g-3 my-2">
                                            <div class="row mb-3">
                                                <div class="col-sm-2 col-form-label">
                                                    <label for="hp" class="col-form-label">Filter</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <select name="" id="" class="form-select">
                                                        <option selected>NPWP</option>
                                                        <option selected>Nama</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-2 col-form-label">
                                                    <label for="hp" class="col-form-label">Kata Kunci</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" id="hp" class="form-control">
                                                </div>
                                                <div class="col-sm-2">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal"><i class="bi bi-search"></i>Cari</button>
                                                </div>
                                                <div class="col-10">
                                                    <label for="" class="">Masukan NPWP Lengkap Lawan
                                                        Transaksi</label>
                                                </div>
                                            </div>
                                            <table class="table">
                                                <thead class="table-dark">
                                                    <th>NPWP</th>
                                                    <th>Nama</th>
                                                    <th>Alamat</th>
                                                </thead>
                                                <tbody>
                                                    <td>6042301006</td>
                                                    <td>Velik Erlangga</td>
                                                    <td>Tulis Batang Jawa Tengah</td>
                                                </tbody>
                                            </table>
                                        </form>
                                    </div>
                                    <!-- Modal footer -->
                                    <!--   <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div> -->
                                </div>
                            </div>
                        </div>
                        <!--End Modal Cari NPWP Lawan Transaki-->
                        <div class="card-body">

                            <body>

                                <div class="outer-wrapper">
                                    <div class="table-wrapper">
                                        <table>
                                            <tr>
                                                <th>NPWP</th>
                                                <th>Nama</th>
                                                <th>Nomor Faktur</th>
                                                <th>Tanggal Faktur</th>
                                                <th>Masa</th>
                                                <th>Tahun</th>
                                                <th>Status Faktur</th>
                                                <th>Dapat Dikreditkan</th>
                                                <th>DPP</th>
                                                <th>PPN</th>
                                                <th>PPnBM</th>
                                                <th>Status Approval</th>
                                                <th>Tanggal Approval</th>
                                                <th>Keterangan</th>
                                                <th>User Perekam</th>
                                                <th>Tanggal Rekam</th>
                                                <th>User Pengubah</th>
                                                <th>Tanggal Ubah</th>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>1</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div>
                                    <button type="btn" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalDelete"><i class="bi bi-trash"></i> Delete</button>
                                    <button type="btn" class="btn btn-success"><i class="bi bi-pen"></i>
                                        Edit</button>
                                    <button class="btn" type="submit" data-bs-toggle="modal"
                                        data-bs-target="#modalUpload"
                                        style="background-color: rgba(238, 129, 78, 1); color: rgb(255, 255, 255); font-family: 'Lato', sans-serif;"><i
                                            class="bi bi-upload"></i>
                                        Upload</button>
                                    <button type="btn" class="btn btn-warning"><i class="bi bi-eye"></i>
                                        Preview</button>
                                    <button type="btn" class="btn btn-info" data-bs-toggle="modal"
                                        data-bs-target="#modalPrint"><i class="bi bi-printer"></i> Print</button>
                                </div>
                        </div>

                        <!-- The Modal -->
                        <!--Modal Delete-->
                        <div class="modal" id="modalDelete">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <!--<h4 class="modal-title">Modal Heading</h4>-->
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        Anda akan menghapus 1 Faktur Pajak Masukan, Apakah Anda yakin ingin menghapus ini?
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer" style="display: flex; justify-content: center;">
                                        <button type="button" class="btn btn-primary"
                                            data-bs-dismiss="modal">Yes</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">No</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--End Modal Delete-->
                        <!--Modal Upload-->
                        <div class="modal" id="modalUpload">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <!--<h4 class="modal-title">Modal Heading</h4>-->
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        Faktur yang sudah siap diupload tidak dapat diubah lagi. Apakah Anda yakin ingin
                                        mengupload Faktur?
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer" style="display: flex; justify-content: center;">
                                        <button type="button" class="btn btn-primary"
                                            data-bs-dismiss="modal">Yes</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">No</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--End Modal Delete-->
                        <!--Modal Upload-->
                        <div class="modal" id="modalPrint">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <!--<h4 class="modal-title">Modal Heading</h4>-->
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        Faktur pajak berhasil diunduh
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer" style="display: flex; justify-content: center;">
                                        <button type="button" class="btn btn-success" data-bs-dismiss="modal"><i
                                                class="bi bi-check-circle"></i> </button>

                                    </div>
                                </div>
                            </div>
                            <!--END Modal -->
                            </body>
                        </div>
        </section>
    @endsection
