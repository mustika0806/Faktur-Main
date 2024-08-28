@extends('layouts.dashboard')

@section('title')
    Refrensi Nomor Faktur
@endsection

@section('body-class')
    services-details-page
@endsection

@section('main-content')
    <!-- Template Main Tabel CSS File -->
    <link href="/assets/landing/css/css_tabel.css" rel="stylesheet" />

    <section id="hero" class="hero">
        <div class="pagetitle">
            <h1>Refrensi Nomor Faktur</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Refrensi</a></li>
                    <li class="breadcrumb-item active">Refrensi Nomor Faktur</li>
                </ol>
            </nav>
        </div> <!--End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <div class="container-fluid p-0">
                    <div class="card">
                        <div class="card-header">

                            <!--Button Modal Tambah-->
                            <button class="btn" type="submit" data-bs-toggle="modal" data-bs-target="#modalRekam"
                                style="background-color: rgba(238, 129, 78, 1); color: rgb(255, 255, 255); font-family: 'Lato', sans-serif;"><i
                                    class="bi bi-plus"></i>
                                Rekam Range Nomor Faktur</button>

                            <!--Modal Tambah Database-->
                            <!-- The Modal -->
                            <div class="modal" id="modalRekam">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Rekam Refrensi Nomor Faktur</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <form class="row g-3" action="{{ route('AddRefrensiNomorFaktur') }}"
                                                method="POST"> @csrf
                                                <div class="col-sm-12">
                                                    <h5>Range Nomor Faktur</h5>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="" class="col-sm-2 col-form-label">Nomor Faktur
                                                        Awal <b class="text-danger">*</b></label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="no_faktur_awal"
                                                            id="fakturawal" placeholder="Masukan Nomor Faktur Awal" required
                                                            maxlength="14">
                                                    </div>
                                                </div>
                                                <script>
                                                    // Mendapatkan elemen input berdasarkan ID
                                                    var npwpInput = document.getElementById('fakturawal');

                                                    // Menambahkan event listener untuk memanipulasi input
                                                    npwpInput.addEventListener('input', function() {
                                                        // Menghapus karakter selain angka
                                                        var cleanedInput = this.value.replace(/\D/g, '');

                                                        // Memastikan input tidak melebihi panjang 14 karakter
                                                        if (cleanedInput.length > 14) {
                                                            cleanedInput = cleanedInput.slice(0, 14);
                                                        }

                                                        // Format dengan menambahkan tanda '-' tanpa titik di belakangnya
                                                        var formattedAWAL = cleanedInput.slice(0, 3) + '-' + cleanedInput.slice(3, 5) + '-' + cleanedInput
                                                            .slice(5, 13);

                                                        // Menetapkan nilai input
                                                        this.value = formattedAWAL;
                                                    });
                                                </script>

                                                <div class="row mb-3">
                                                    <label for="" class="col-sm-2 col-form-label">Nomor Faktur
                                                        Akhir <b class="text-danger">*</b></label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="no_faktur_akhir"
                                                            id="fakturakhir" placeholder="Masukan Nomor Faktur Akhir"
                                                            required maxlength="14">
                                                    </div>
                                                </div>
                                                <script>
                                                    // Mendapatkan elemen input berdasarkan ID
                                                    var npwpInput = document.getElementById('fakturakhir');

                                                    // Menambahkan event listener untuk memanipulasi input
                                                    npwpInput.addEventListener('input', function() {
                                                        // Menghapus karakter selain angka
                                                        var cleanedInput = this.value.replace(/\D/g, '');

                                                        // Memastikan input tidak melebihi panjang 14 karakter
                                                        if (cleanedInput.length > 14) {
                                                            cleanedInput = cleanedInput.slice(0, 14);
                                                        }

                                                        // Format dengan menambahkan tanda '-' tanpa titik di belakangnya
                                                        var formattedAWAL = cleanedInput.slice(0, 3) + '-' + cleanedInput.slice(3, 5) + '-' + cleanedInput
                                                            .slice(5, 13);

                                                        // Menetapkan nilai input
                                                        this.value = formattedAWAL;
                                                    });
                                                </script>
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button class="btn" type="submit" data-bs-toggle="modal"
                                                data-bs-target="#modalUpload"
                                                style="background-color: rgba(238, 129, 78, 1); color: rgb(255, 255, 255); font-family: 'Lato', sans-serif; width: 100%;">
                                                Rekam</button>
                                        </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            <!--End Modal -->
                            <div class="card-body">

                                <body>
                                    <div class="outer-wrapper">
                                        <div class="table-wrapper">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th>Nomor Faktur Awal</th>
                                                        <th>Nomor Faktur Akhir</th>
                                                        <th>Nomor Terakhir yang Dipakai</th>
                                                        <th>Tanggal Rekam</th>
                                                        <th>Tanggal Update</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                @foreach ($data as $item)
                                                    <tbody>
                                                        <tr>
                                                            <td>{{ $item->no_faktur_awal }}</td>
                                                            <td>{{ $item->no_faktur_akhir }}</td>
                                                            <td>{{ $item->nomor_terakhir }}</td>
                                                            <td>{{ $item->created_at }}</td>
                                                            <td>{{ $item->updated_at }}</td>
                                                            <td>
                                                                <form
                                                                    action="{{ route('refrensi-nomor-faktur.delete', $item->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="btn text-danger" type="button"
                                                                        onclick="confirmDelete(this.form)">
                                                                        <i class="bi bi-trash"></i>
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="d-flex align-items-center">
                                            <h6>Total Record: {{ $totalRecords }}</h6>
                                        </div>
                                </body>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </section>
        <script>
            function confirmDelete(form) {
                event.preventDefault(); // Prevent default form submission

                Swal.fire({
                    title: 'Apakah Anda yakin ingin menghapus item ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    cancelButtonText: 'Batal',
                    confirmButtonText: 'Ya, hapus!',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // If confirmed, submit the form
                        form.submit();
                    }
                });
            }
        </script>
    @endsection
