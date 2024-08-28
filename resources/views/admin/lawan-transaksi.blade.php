@extends('layouts.dashboard')

@section('title')
    lawan Transaksi
@endsection

@section('body-class')
    services-details-page
@endsection

@section('main-content')
    <!-- Template Main Tabel CSS File -->
    <link href="/assets/landing/css/css_tabel.css" rel="stylesheet" />

    <section id="hero" class="hero">
        <div class="pagetitle">
            <h1>Lawan Transaksi</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Refrensi</a></li>
                    <li class="breadcrumb-item active">Lawan Transaksi</li>
                </ol>
            </nav>
        </div> <!--End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <div class="container-fluid p-0">
                    <div class="card">
                        <div class="card-header">
                            <button class="btn" type="submit"
                                style="background-color: rgba(238, 129, 78, 1); color: rgb(255, 255, 255); font-family: 'Lato', sans-serif;"><i
                                    class="bi bi-search"></i>
                                Filter</button>
                            <!--Input-->
                            <input type="text" style="padding: 4px; width: 90%;" name="search">
                        </div>
                        <div class="card-body">

                            <body>
                                <div class="card-body">

                                    <body>
                                        <div class="outer-wrapper">
                                            <div class="table-wrapper">
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th>NPWP</th>
                                                            <th>Nama</th>
                                                            <th>Alamat</th>
                                                            <th>Telepon</th>
                                                            <th>User Perekam</th>
                                                            <th>Tanggal Rekam</th>
                                                            <th>User Pengubah</th>
                                                            <th>Tanggal Ubah</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    @foreach ($data as $item)
                                                        <tbody>
                                                            <tr>
                                                                <td>{{ $item->npwp_lawan }}</td>
                                                                <td>{{ $item->nama_lawan }}</td>
                                                                <td>{{ $item->jalan }}, Blok {{ $item->blok }},
                                                                    {{ $item->nomor }}, RT/RW
                                                                    {{ $item->rt }}/{{ $item->rw }},
                                                                    {{ $item->kelurahan }}, {{ $item->kecamatan }},
                                                                    {{ $item->kabupaten }}, {{ $item->provinsi }},
                                                                    {{ $item->kode_pos }}</td>
                                                                <td>{{ $item->no_tlp }}</td>
                                                                <td>{{ Auth::user()->nama_user }}</td>
                                                                <td>{{ $item->created_at }}</td>
                                                                <td>{{ Auth::user()->nama_user }}</td>
                                                                <td>{{ $item->updated_at }}</td>
                                                                <td>
                                                                    <div style="display: flex; gap: 10px;">
                                                                        <button class="btn text-warning" type="submit"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#modalEdit"><i
                                                                                class="bi bi-pen"></i></button>

                                                                        <form
                                                                            action="{{ route('lawan-transaksi.delete', $item->npwp_lawan) }}"
                                                                            method="post">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button class="btn text-danger" type="button"
                                                                                onclick="confirmDelete(this.form)">
                                                                                <i class="bi bi-trash"></i>
                                                                            </button>

                                                                        </form>
                                                                    </div>
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
                                                <button type="button" class="btn btn-light ms-auto"
                                                    style="background-color: rgba(238, 129, 78, 1); color: rgb(255, 255, 255); font-family: 'Lato', sans-serif;"
                                                    data-bs-toggle="modal" data-bs-target="#modalLawan"><i
                                                        class="bi bi-plus"></i>
                                                    Tambah</button>
                                            </div>
                                            <!--Modal Tambah-->
                                            <!-- The Modal -->
                                            <div class="modal" id="modalLawan">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Refrensi Lawan Transaksi</h4>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                            <form class="row g-3" action="{{ route('AddLawanTrans') }}"
                                                                method="POST"> @csrf
                                                                @if (session('success'))
                                                                    <div class="alert alert-success">
                                                                        {{ session('success') }}
                                                                    </div>
                                                                @endif

                                                                <div class="row mb-3">
                                                                    <label for=""
                                                                        class="col-sm-2 col-form-label">NPWP <b
                                                                            class="text-danger">*</b></label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control"
                                                                            name="npwp_lawan" id="npwp_lawan"
                                                                            placeholder="Masukan NPWP" required
                                                                            maxlength="20">
                                                                    </div>
                                                                </div>
                                                                <script>
                                                                    // Mendapatkan elemen input berdasarkan ID
                                                                    var npwpInput = document.getElementById('npwp_lawan');

                                                                    // Menambahkan event listener untuk memanipulasi input
                                                                    npwpInput.addEventListener('input', function() {
                                                                        // Menghapus karakter selain angka
                                                                        var cleanedInput = this.value.replace(/\D/g, '');

                                                                        // Memastikan input tidak melebihi panjang 20 karakter
                                                                        if (cleanedInput.length > 20) {
                                                                            cleanedInput = cleanedInput.slice(0, 20);
                                                                        }

                                                                        // Format NPWP dengan menambahkan tanda '-' tanpa titik di belakangnya
                                                                        var formattedNPWP = cleanedInput.slice(0, 2) + '.' + cleanedInput.slice(2, 5) + '.' + cleanedInput
                                                                            .slice(5, 8) + '.' + cleanedInput.slice(8, 9) + '-' + cleanedInput.slice(9, 12) + '.' + cleanedInput
                                                                            .slice(12, 15) + cleanedInput.slice(15, 20);

                                                                        // Menetapkan nilai input dengan format NPWP
                                                                        this.value = formattedNPWP;
                                                                    });
                                                                </script>


                                                                <div class="row mb-3">
                                                                    <label for=""
                                                                        class="col-sm-2 col-form-label">Nama <b
                                                                            class="text-danger">*</b></label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control"
                                                                            id="nama_lawan" name="nama_lawan"
                                                                            placeholder="Masukan Nama">
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row mb-3">
                                                                    <label for=""
                                                                        class="col-sm-2 col-form-label">Alamat <b
                                                                            class="text-danger">*</b></label>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for=""
                                                                        class="col-sm-2 col-form-label">Jalan</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control"
                                                                            id="jalan" name="jalan"
                                                                            placeholder="Masukan Jalan">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <div class="col-sm-2"></div>
                                                                    <div class="col-sm-10">
                                                                        <div class="row">
                                                                            <div class="col-md-3 mb-3">
                                                                                <label for=""
                                                                                    class="col-form-label">Blok</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="blok" name="blok"
                                                                                    placeholder="Masukan Blok">
                                                                            </div>
                                                                            <div class="col-md-3 mb-3">
                                                                                <label for=""
                                                                                    class="col-form-label">Nomor</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="nomor" name="nomor"
                                                                                    placeholder="Masukan Nomor">
                                                                            </div>
                                                                            <div class="col-md-3 mb-3">
                                                                                <label for=""
                                                                                    class="col-form-label">RT</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="rt" name="rt"
                                                                                    placeholder="Masukan RT">
                                                                            </div>
                                                                            <div class="col-md-3 mb-3">
                                                                                <label for=""
                                                                                    class="col-form-label">RW</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="rw" name="rw"
                                                                                    placeholder="Masukan RW">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <div class="col-sm-2 col-form-label">
                                                                        <label for="Keluarahan"
                                                                            class="col-form-label">Kelurahan</label>
                                                                    </div>
                                                                    <div class="col-auto">
                                                                        <input type="text" id="kelurahan"
                                                                            name="kelurahan" class="form-control"
                                                                            placeholder="Masukan Kelurahan">
                                                                    </div>
                                                                    <div class="col-sm-2 col-form-label">
                                                                        <label for="Kecamatan"
                                                                            class="col-form-label">Kecamatan</label>
                                                                    </div>
                                                                    <div class="col-auto">
                                                                        <input type="text" id="kecamatan"
                                                                            name="kecamatan" class="form-control"
                                                                            placeholder="Masukan Kecamatan">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <div class="col-sm-2 col-form-label">
                                                                        <label for="kabupaten"
                                                                            class="col-form-label">Kabupaten/Kota</label>
                                                                    </div>
                                                                    <div class="col-auto">
                                                                        <input type="text" id="kabupaten"
                                                                            name="kabupaten" class="form-control"
                                                                            placeholder="Masukan Kabupaten/Kota">
                                                                    </div>
                                                                    <div class="col-sm-2 col-form-label">
                                                                        <label for="provinsi"
                                                                            class="col-form-label">Provinsi</label>
                                                                    </div>
                                                                    <div class="col-auto">
                                                                        <input type="text" id="provinsi"
                                                                            name="provinsi" class="form-control"
                                                                            placeholder="Masukan Provinsi">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <div class="col-sm-2 col-form-label">
                                                                        <label for="kode_pos" class="col-form-label">Kode
                                                                            Pos</label>
                                                                    </div>
                                                                    <div class="col-auto">
                                                                        <input type="text" id="kode_pos"
                                                                            name="kode_pos" class="form-control"
                                                                            placeholder="Masukan Kode Pos">
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row mb-3">
                                                                    <div class="col-sm-2 col-form-label">
                                                                        <label for="no_tlp" class="col-form-label">Nomer
                                                                            Telfon <b class="text-danger">*</b></label>
                                                                    </div>
                                                                    <div class="col-auto">
                                                                        <input type="text" id="no_tlp"
                                                                            name="no_tlp" class="form-control"
                                                                            placeholder="Masukan Nomor Telfon">
                                                                    </div>
                                                                </div>

                                                        </div>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="reset" class="btn btn-secondary">
                                                                <i class="bi bi-stars"></i> Bersihkan Form
                                                            </button>
                                                            <button class="btn btn-primary" type="submit"
                                                                data-bs-toggle="modal" data-bs-target="#modalUpload"><i
                                                                    class="bi bi-floppy"></i> Simpan</button>
                                                        </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                            <!--End Modal-->

                                            <!--Modal Editor-->
                                            <!-- The Modal -->
                                            <div class="modal" id="modalEdit">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit Refrensi Lawan Transaksi</h4>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                            <form class="row g-3"
                                                                action="{{ route('lawan-transaksi.update', $item->npwp_lawan) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                @if (session('success'))
                                                                    <div class="alert alert-success">
                                                                        {{ session('success') }}
                                                                    </div>
                                                                @endif

                                                                <div class="row mb-3">
                                                                    <label for=""
                                                                        class="col-sm-2 col-form-label">NPWP</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control"
                                                                            name="npwp_lawan" id="npwp_lawan"
                                                                            placeholder="Masukan NPWP" required
                                                                            maxlength="20" value="<?php echo $item['npwp_lawan']; ?>">
                                                                    </div>
                                                                </div>

                                                                <script>
                                                                    // Mendapatkan elemen input berdasarkan ID
                                                                    var npwpInput = document.getElementById('npwp_lawan');

                                                                    // Menambahkan event listener untuk memanipulasi input
                                                                    npwpInput.addEventListener('input', function() {
                                                                        // Menghapus karakter selain angka
                                                                        var cleanedInput = this.value.replace(/\D/g, '');

                                                                        // Memastikan input tidak melebihi panjang 20 karakter
                                                                        if (cleanedInput.length > 20) {
                                                                            cleanedInput = cleanedInput.slice(0, 20);
                                                                        }

                                                                        // Format NPWP dengan menambahkan tanda '-' tanpa titik di belakangnya
                                                                        var formattedNPWP = cleanedInput.slice(0, 2) + '.' + cleanedInput.slice(2, 5) + '.' + cleanedInput
                                                                            .slice(5, 8) + '.' + cleanedInput.slice(8, 9) + '-' + cleanedInput.slice(9, 12) + '.' + cleanedInput
                                                                            .slice(12, 15) + cleanedInput.slice(15, 20);

                                                                        // Menetapkan nilai input dengan format NPWP
                                                                        this.value = formattedNPWP;
                                                                    });
                                                                </script>


                                                                <div class="row mb-3">
                                                                    <label for=""
                                                                        class="col-sm-2 col-form-label">Nama</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control"
                                                                            id="nama_lawan" name="nama_lawan"
                                                                            placeholder="Masukan Nama"
                                                                            value="<?php echo $item['nama_lawan']; ?>">
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row mb-3">
                                                                    <label for=""
                                                                        class="col-sm-2 col-form-label">Alamat</label>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for=""
                                                                        class="col-sm-2 col-form-label">Jalan</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control"
                                                                            id="jalan" name="jalan"
                                                                            placeholder="Masukan Jalan"
                                                                            value="<?php echo $item['jalan']; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <div class="col-sm-2"></div>
                                                                    <div class="col-sm-10">
                                                                        <div class="row">
                                                                            <div class="col-md-3 mb-3">
                                                                                <label for=""
                                                                                    class="col-form-label">Blok</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="blok" name="blok"
                                                                                    placeholder="Masukan Blok"
                                                                                    value="<?php echo $item['blok']; ?>">
                                                                            </div>
                                                                            <div class="col-md-3 mb-3">
                                                                                <label for=""
                                                                                    class="col-form-label">Nomor</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="nomor" name="nomor"
                                                                                    placeholder="Masukan Nomor"
                                                                                    value="<?php echo $item['nomor']; ?>">
                                                                            </div>
                                                                            <div class="col-md-3 mb-3">
                                                                                <label for=""
                                                                                    class="col-form-label">RT</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="rt" name="rt"
                                                                                    placeholder="Masukan RT"
                                                                                    value="<?php echo $item['rt']; ?>">
                                                                            </div>
                                                                            <div class="col-md-3 mb-3">
                                                                                <label for=""
                                                                                    class="col-form-label">RW</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="rw" name="rw"
                                                                                    placeholder="Masukan RW"
                                                                                    value="<?php echo $item['rw']; ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <div class="col-sm-2 col-form-label">
                                                                        <label for="Keluarahan"
                                                                            class="col-form-label">Kelurahan</label>
                                                                    </div>
                                                                    <div class="col-auto">
                                                                        <input type="text" id="kelurahan"
                                                                            name="kelurahan" class="form-control"
                                                                            placeholder="Masukan Kelurahan"
                                                                            value="<?php echo $item['kelurahan']; ?>">
                                                                    </div>
                                                                    <div class="col-sm-2 col-form-label">
                                                                        <label for="Kecamatan"
                                                                            class="col-form-label">Kecamatan</label>
                                                                    </div>
                                                                    <div class="col-auto">
                                                                        <input type="text" id="kecamatan"
                                                                            name="kecamatan" class="form-control"
                                                                            placeholder="Masukan Kecamatan"
                                                                            value="<?php echo $item['kecamatan']; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <div class="col-sm-2 col-form-label">
                                                                        <label for="kabupaten"
                                                                            class="col-form-label">Kabupaten/Kota</label>
                                                                    </div>
                                                                    <div class="col-auto">
                                                                        <input type="text" id="kabupaten"
                                                                            name="kabupaten" class="form-control"
                                                                            placeholder="Masukan Kabupaten/Kota"
                                                                            value="<?php echo $item['kabupaten']; ?>">
                                                                    </div>
                                                                    <div class="col-sm-2 col-form-label">
                                                                        <label for="provinsi"
                                                                            class="col-form-label">Provinsi</label>
                                                                    </div>
                                                                    <div class="col-auto">
                                                                        <input type="text" id="provinsi"
                                                                            name="provinsi" class="form-control"
                                                                            placeholder="Masukan Provinsi"
                                                                            value="<?php echo $item['provinsi']; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <div class="col-sm-2 col-form-label">
                                                                        <label for="kode_pos" class="col-form-label">Kode
                                                                            Pos</label>
                                                                    </div>
                                                                    <div class="col-auto">
                                                                        <input type="text" id="kode_pos"
                                                                            name="kode_pos" class="form-control"
                                                                            placeholder="Masukan Kode Pos"
                                                                            value="<?php echo $item['kode_pos']; ?>">
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row mb-3">
                                                                    <div class="col-sm-2 col-form-label">
                                                                        <label for="no_tlp" class="col-form-label">Nomer
                                                                            Telfon</label>
                                                                    </div>
                                                                    <div class="col-auto">
                                                                        <input type="text" id="no_tlp"
                                                                            name="no_tlp" class="form-control"
                                                                            placeholder="Masukan Nomor Telfon"
                                                                            value="<?php echo $item['no_tlp']; ?>">
                                                                    </div>
                                                                </div>

                                                        </div>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="reset" class="btn btn-secondary">
                                                                <i class="bi bi-stars"></i> Bersihkan Form
                                                            </button>
                                                            <button class="btn btn-primary" type="submit"
                                                                data-bs-toggle="modal" data-bs-target="#modalUpload"><i
                                                                    class="bi bi-floppy"></i> Simpan</button>
                                                        </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                            <!--End Modal -->
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
