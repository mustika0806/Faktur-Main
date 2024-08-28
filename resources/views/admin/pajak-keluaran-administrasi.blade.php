@extends('layouts.dashboard')

@section('title')
    Administrasi Pajak Keluaran
@endsection

@section('body-class')
    services-details-page
@endsection

@section('main-content')
    <!-- Template Main Tabel CSS File -->
    <link href="/assets/landing/css/css_tabel.css" rel="stylesheet" />


    <section id="hero" class="hero">
        <div class="pagetitle">
            <h1>Pajak Keluaran</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Faktur</a></li>
                    <li class="breadcrumb-item active">Pajak Keluaran</li>
                </ol>
            </nav>
        </div> <!--End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <div class="container-fluid p-0">
                    <div class="card">
                        <div class="card-header">
                            <button class="btn" type="submit" data-bs-toggle="modal" data-bs-target="#myModal"
                                style="background-color: rgba(238, 129, 78, 1); color: rgb(255, 255, 255); font-family: 'Lato', sans-serif;"><i
                                    class="bi bi-plus"></i> Rekam Faktur</button>

                            <!--Modal Rekam Faktur -->
                            <!--Dokumen  Transaksi-->
                            <!-- The Modal -->
                            <div class="modal" id="myModal">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h5 class="modal-title">Dokumen Transaksi</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <form class="row g-3" action="{{ route('AddPajakKeluaran') }}" method="POST"
                                                id="myForm">
                                                @csrf

                                                <!-- Detail Transaksi -->
                                                <div class="row mb-3 my-3">
                                                    <div class="col-sm-2 col-form-label">
                                                        <label for="data" class="col-form-label">Detail
                                                            Transaksi</label>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <input type="text" name="kode_jenis_transaksi"
                                                            id="selected_value" class="form-control" readonly>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <select name="kode_jenis_transaksi" id="kode_jenis_transaksi"
                                                            class="form-select">
                                                            <option value=" ">- Pilih -</option>
                                                            @foreach ($additionalData['jenisTransaksi'] as $jenis)
                                                                <option value="{{ $jenis->kode_jenis }}"
                                                                    data-no-seri="{{ $jenis->no_seri }}">
                                                                    {{ $jenis->nama_jenis }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Keterangan Tambahan Faktur -->
                                                <div class="row mb-3" id="keteranganTambahanContainer"
                                                    style="display: none;">
                                                    <label for="" class="col-sm-5 col-form-label">Keterangan
                                                        Tambahan Faktur</label>
                                                    <div class="col-sm-20">
                                                        <select id="keterangan_id" class="form-control">
                                                            <option value=" ">- Pilih -</option>
                                                            <!-- Options akan diisi melalui JavaScript berdasarkan jenis transaksi yang dipilih -->
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- Script untuk menangani perubahan pada jenis transaksi -->
                                                <script>
                                                    var jenisTransaksiSelect = document.getElementById('kode_jenis_transaksi');
                                                    var keteranganTambahanContainer = document.getElementById('keteranganTambahanContainer');
                                                    var keteranganSelect = document.getElementById('keterangan_id');
                                                    var capFakturContainer = document.getElementById('capFakturContainer');
                                                    var capFakturElement = document.getElementById('cap_faktur');
                                                    var selectedValueElement = document.getElementById('selected_value');

                                                    jenisTransaksiSelect.addEventListener('change', function() {
                                                        var selectedOption = this.options[this.selectedIndex];

                                                        if (selectedOption.value === '7' || selectedOption.value === '8') {
                                                            keteranganTambahanContainer.style.display = 'block';
                                                            populateKeteranganOptions(selectedOption.value);
                                                        } else {
                                                            keteranganTambahanContainer.style.display = 'none';
                                                            capFakturContainer.style.display = 'none';
                                                        }

                                                        selectedValueElement.value = selectedOption.dataset.noSeri;
                                                    });



                                                    function populateKeteranganOptions(jenisTransaksi) {
                                                        var keteranganData;

                                                        if (jenisTransaksi === '7') {
                                                            keteranganData = @json($additionalData['keteranganTambahan7']);
                                                        } else if (jenisTransaksi === '8') {
                                                            keteranganData = @json($additionalData['keteranganTambahan8']);
                                                        }

                                                        keteranganSelect.innerHTML = '<option value=" ">- Pilih -</option>';

                                                        keteranganData.forEach(function(keterangan) {
                                                            var option = document.createElement('option');
                                                            option.value = keterangan.id;
                                                            option.text = keterangan.nama;
                                                            option.dataset.capFaktur = keterangan
                                                                .cap_faktur;
                                                            keteranganSelect.add(option);
                                                        });

                                                        keteranganSelect.addEventListener('change', function() {
                                                            var selectedOption = this.options[this.selectedIndex];

                                                            if (selectedOption.dataset.capFaktur) {
                                                                capFakturContainer.style.display = 'block';
                                                                capFakturElement.textContent = selectedOption.dataset.capFaktur;
                                                            } else {
                                                                capFakturContainer.style.display = 'none';
                                                            }
                                                        });
                                                    }
                                                </script>


                                                <!-- Jenis Faktur -->
                                                <div class="row mb-3">
                                                    <div class="col-sm-2 col-form-label">
                                                        <label for="data" class="col-form-label">Jenis Faktur</label>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <input type="text" name="id_faktur" id="selected_jenis"
                                                            class="form-control" readonly>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <select name="id" id="id" class="form-select">
                                                            <option value=" ">- Pilih -</option>
                                                            @foreach ($additionalData['jenisFaktur'] as $jenis)
                                                                <option value="{{ $jenis->id }}"
                                                                    data-noSeriAngka="{{ $jenis->noSeriAngka }}">
                                                                    {{ $jenis->nama }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Tanggal Dokumen -->
                                                <div class="row mb-3">
                                                    <div class="col-sm-2 col-form-label">
                                                        <label for="tanggal-dokumen" class="col-form-label">Tanggal
                                                            Dokumen</label>
                                                    </div>
                                                    <div class="col-auto">
                                                        <input type="date" id="tanggal-dokumen" name="tanggal_faktur"
                                                            class="form-control" placeholder="dd/mm/yyyy">
                                                    </div>
                                                    <!-- ... (script untuk masa pajak) ... -->
                                                    <script>
                                                        // Mendapatkan elemen input berdasarkan ID
                                                        var tanggalDokumenInput = document.getElementById('tanggal-dokumen');

                                                        // Menambahkan event listener untuk mengupdate masa pajak saat tanggal berubah
                                                        tanggalDokumenInput.addEventListener('change', function() {
                                                            // Mendapatkan tanggal dari input tanggal dokumen
                                                            var tanggalDokumen = new Date(this.value);

                                                            // Mendapatkan bulan dan tahun dari tanggal dokumen
                                                            var bulan = ('0' + (tanggalDokumen.getMonth() + 1)).slice(-2);
                                                            var tahun = tanggalDokumen.getFullYear();

                                                            // Menetapkan nilai Masa Pajak berdasarkan bulan
                                                            document.getElementById('masa-pajak-bulan').value = bulan;

                                                            // Menetapkan nilai Tahun Pajak berdasarkan tahun
                                                            document.getElementById('tahun-pajak').value = tahun;
                                                        });

                                                        // Inisialisasi nilai input dengan tanggal saat ini
                                                        var tanggalSaatIni = new Date();
                                                        tanggalDokumenInput.value = tanggalSaatIni.toISOString().slice(0, 10);
                                                    </script>
                                                </div>

                                                <!-- Masa Pajak -->
                                                <div class="row mb-3">
                                                    <div class="col-sm-2 col-form-label">
                                                        <label for="masa-pajak" class="col-form-label">Laporan SPT</label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="text" id="masa-pajak-bulan" name="masa_pajak"
                                                            class="form-control" placeholder="Masa Pajak" readonly>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="number" id="tahun-pajak" name="tahun_pajak"
                                                            class="form-control" placeholder="Tahun Pajak" min="2000"
                                                            max="2090" pattern="\d{4}"
                                                            title="Masukkan tahun dengan format empat digit"
                                                            minlength="4" maxlength="4"
                                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                                    </div>
                                                </div>

                                                <!-- Masukan Nomor Seri Faktur Pajak -->
                                                <div class="col-10">
                                                    <label for="" class="">Masukan Nomor Seri Faktur
                                                        Pajak</label>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-sm-2 col-form-label">
                                                        <label for="hp" class="col-form-label">Laporan SPT</label>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <input type="text" id="hp" name="no_seri"
                                                            class="form-control" readonly>

                                                        <script>
                                                            function updateNoSeri() {
                                                                // Mendapatkan nilai yang dipilih dari elemen jenis transaksi
                                                                var selectedJenisTransaksi = document.getElementById('kode_jenis_transaksi').value;

                                                                // Menambahkan angka 0 di bagian depan jika panjangnya kurang dari 2
                                                                selectedJenisTransaksi = selectedJenisTransaksi.padStart(2, '0');

                                                                // Mendapatkan nilai yang dipilih dari elemen jenis faktur
                                                                var selectedJenisFaktur = document.getElementById('id').value;

                                                                // Menentukan angka berdasarkan pilihan di id
                                                                var angkaTambahan = (selectedJenisFaktur === '1') ? '0' : ((selectedJenisFaktur === '2') ? '1' : '');




                                                                // Menggabungkan nilai kode_jenis_transaksi dan id dengan angka tambahan
                                                                var combinedNoSeri = selectedJenisTransaksi + angkaTambahan;

                                                                // Menetapkan nilai ke elemen input No Seri dan mengatur readonly
                                                                var noSeriInput = document.getElementById('hp');
                                                                noSeriInput.value = combinedNoSeri;
                                                                noSeriInput.readOnly = true;
                                                            }

                                                            // Pemicu peristiwa change untuk menginisialisasi nilai
                                                            document.getElementById('kode_jenis_transaksi').addEventListener('change', updateNoSeri);
                                                            document.getElementById('id').addEventListener('change', updateNoSeri);

                                                            // Panggil fungsi untuk menginisialisasi nilai
                                                            updateNoSeri();
                                                        </script>


                                                    </div>

                                                    <div class="col-md-1">
                                                        <input type="text" id="nama_input" name="nomor_faktur"
                                                            class="form-control"
                                                            value="{{ str_replace('-', '', substr($additionalData['refrensiNoFaktur'][0]->no_faktur_awal, 0, 3)) }}"
                                                            maxlength="3">
                                                    </div>

                                                    <div class="col-md-1">
                                                        <input type="text" id="nama_input_tahun" class="form-control">
                                                    </div>
                                                    <script>
                                                        // Mendapatkan elemen input berdasarkan ID
                                                        var inputNama = document.getElementById('nama_input_tahun');

                                                        // Menambahkan event listener untuk mengupdate nilai input saat tahun berubah
                                                        tanggalDokumenInput.addEventListener('change', function() {
                                                            // Mendapatkan tahun dari input tanggal dokumen
                                                            var tahun = new Date(this.value).getFullYear();

                                                            // Menetapkan nilai input dengan 2 angka belakang tahun
                                                            inputNama.value = String(tahun).slice(-2);
                                                        });

                                                        // Inisialisasi nilai input dengan tahun saat ini
                                                        inputNama.value = String(tanggalSaatIni.getFullYear()).slice(-2);
                                                    </script>



                                                    <div class="col-md-7">
                                                        <input type="text" id="nama_input" class="form-control"
                                                            value="{{ str_replace('-', '', substr($additionalData['refrensiNoFaktur'][0]->no_faktur_awal, 4, 10)) }}"
                                                            maxlength="9">
                                                    </div>

                                                </div>

                                                <!-- Refrensi Faktur -->
                                                <div class="row mb-3">
                                                    <label for="" class="col-sm-2 col-form-label">Refrensi
                                                        Faktur</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="#"
                                                            name="refrensi">
                                                    </div>
                                                </div>

                                                <div class="row mb-3" id="capFakturContainer" style="display: none;">
                                                    <label for="" class="col-sm-2 col-form-label">Cap
                                                        Faktur</label>
                                                    <div class="col-sm-10" id="capFakturDisplay">

                                                    </div>
                                                </div>
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                                data-bs-target="#lawanTransaksi" onclick="validateForm(this)">Lanjutkan<i
                                                    class="bi bi-skip-end"></i></button>

                                            {{-- <button type="submit" class="btn btn-secondary"
                                                data-bs-toggle="modal">Lanjutkan<i class="bi bi-skip-end"></i></button> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <script>
                                function validateForm(e) {
                                    // Mengambil semua input form
                                    // var inputs = document.getElementById("myForm").querySelectorAll("input");

                                    // // Memeriksa apakah semua input memiliki nilai
                                    // for (var i = 0; i < inputs.length; i++) {
                                    //     if (!inputs[i].value) {
                                    //         alert("Harap isi semua form sebelum melanjutkan.");
                                    //         return false;
                                    //     }
                                    // }

                                    console.log(e.value);
                                }
                            </script>
                            <!-- JavaScript untuk mengupdate nilai Detail Transaksi dan Jenis Faktur -->
                            <script>
                                // Menangkap perubahan pada elemen select Detail Transaksi
                                document.getElementById('kode_jenis_transaksi').addEventListener('change', function() {
                                    // Mendapatkan nilai yang dipilih
                                    var selectedValue = this.value;

                                    // Memasukkan nilai yang dipilih ke dalam elemen input Detail Transaksi
                                    document.getElementById('selected_value').value = selectedValue;
                                });

                                // Menangkap perubahan pada elemen select Jenis Faktur
                                document.getElementById('id').addEventListener('change', function() {
                                    // Mendapatkan nilai yang dipilih
                                    var selectedValue = this.value;

                                    // Memasukkan nilai yang dipilih ke dalam elemen input Jenis Faktur
                                    document.getElementById('selected_jenis').value = selectedValue;
                                });
                            </script>
                            <!--============================================================-->

                            <!--Modal Lawan Transaksi-->
                            <div class="modal" id="lawanTransaksi">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Lawan Transaksi</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <!--ISIS-->
                                            {{-- <form class="row g-3" action="{{ route('AddPajakKeluaran') }}"
                                                method="POST">
                                                @csrf --}}
                                            <div class="row mb-3">
                                                <label for="" class="col-sm-2 col-form-label">NPWP</label>
                                                <div class="col-sm-8">
                                                    <input type="text" style="padding: 4px; width: 80%;"
                                                        id="selectedNPWP" name="npwp" required maxlength="20"
                                                        value="{{ old('npwp') }}" readonly>
                                                    <!--Button Cari-->
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-toggle="modal" data-bs-target="#cariNPWP"><i
                                                            class="bi bi-search"></i>Cari NPWP</button>
                                                    <!--End Button Cari-->

                                                    <div class="col-10">
                                                        <label for="" class="">Masukan NPWP Untuk
                                                            Mencari
                                                            Lawan Transaki</label>
                                                    </div>
                                                </div>
                                                <script>
                                                    // Mendapatkan elemen input berdasarkan ID
                                                    var npwpInput = document.getElementById('selectedNPWP');

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
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-sm-2 col-form-label">
                                                    <label for="hp" class="col-form-label">Nama</label>
                                                </div>
                                                <div class="col-auto">
                                                    <input type="text" id="selectedNama" class="form-control"
                                                        readonly>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="" class="col-sm-2 col-form-label">Alamat</label>
                                                    <div class="col-sm-10">
                                                        <textarea id="selectedAlamat" class="form-control" aria-label="With textarea" placeholder="Alamat" readonly></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <script>
                                                function addToSelectedLawanTransaksi(npwp, nama, alamat) {
                                                    // Set nilai input dengan data yang dipilih
                                                    $("#selectedNama").val(nama);
                                                    $("#selectedAlamat").val(alamat);
                                                    $("#selectedNPWP").val(npwp);
                                                }
                                            </script>


                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                                    data-bs-target="#myModal"><i
                                                        class="bi bi-skip-start"></i>Kembali</button>
                                                <!--Button Footer-->
                                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                                    data-bs-target="#detailTransaksi">Lanjutkan<i
                                                        class="bi bi-skip-end"></i></button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--END MODAL LAWAN TRANSAKSI-->

                            <!--============================================================-->

                            <!--MULAI MODAL LAGI Detail Transaksi-->
                            <!-- The Modal -->
                            <div class="modal" id="detailTransaksi">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Detail Transaksi</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <!-- Modal body -->
                                        {{-- <form class="row g-3" action="{{ route('AddPajakKeluaran') }}" method="POST">
                                            @csrf --}}
                                        <div class="modal-body">
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-toggle="modal" data-bs-target="#rekamDetailTransaksi"><i
                                                            class="bi bi-life-preserver"></i> Rekam Transaksi</button>
                                                </div>
                                                <div class="col-sm-3">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-toggle="modal" data-bs-target="#ubahDetailTransaksi"><i
                                                            class="bi bi-pencil-square"></i> Ubah Transaksi</button>
                                                </div>
                                                <div class="col-sm-3">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-toggle="modal"><i class="bi bi-trash3"></i>
                                                        Hapus</button>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label for="searchFilter" class="col-form-label">Filter</label>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-2">
                                                    <select id="searchFilter" class="form-select">
                                                        <option selected>Nama Barang</option>
                                                        <option selected>Kode Barang</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2 col-form-label">
                                                    <label for="searchKeyword" class="col-form-label">Kata
                                                        Kunci</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" id="searchKeyword" class="form-control"
                                                        oninput="searchTable()">
                                                </div>
                                                <div class="col-md-2">
                                                    <button type="button" class="btn btn-secondary"
                                                        onclick="searchTable()">
                                                        <i class="bi bi-funnel"></i> Filter
                                                    </button>
                                                </div>
                                            </div>

                                            <table class="table">
                                                <thead class="table-dark">
                                                    <th></th>
                                                    <th>Nama</th>
                                                    <th>Jumlah Barang</th>
                                                    <th>DPP</th>
                                                    <th>PPN</th>
                                                    <th>PPnBM</th>
                                                </thead>
                                                <tbody>
                                                    @foreach ($additionalData['detailPenyerahanKeluaran'] as $detailPenyerahanKeluaran)
                                                        <tr id="row_{{ $detailPenyerahanKeluaran->id }}">
                                                            <td>
                                                                <input type="checkbox" name="selectedItems[]"
                                                                    value="{{ $detailPenyerahanKeluaran->id }}">
                                                            </td>
                                                            <td>
                                                                <!-- Mengakses data BarangJasa melalui relasi -->
                                                                {{ optional($detailPenyerahanKeluaran->barangJasa)->nama_brg_jasa }}
                                                            </td>
                                                            <td>{{ $detailPenyerahanKeluaran->jmlh_brg }}</td>
                                                            <td>{{ $detailPenyerahanKeluaran->dpp }}</td>
                                                            <td>{{ $detailPenyerahanKeluaran->ppn }}</td>
                                                            <!-- Perbaikan di baris ini -->
                                                            <td class="kode">{{ $detailPenyerahanKeluaran->ppnbm }}
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                    </tr>
                                                    <script>
                                                        function searchTable() {
                                                            var filter = $('#searchFilter').val().toLowerCase();
                                                            var keyword = $('#searchKeyword').val().toLowerCase();

                                                            // Saring tabel berdasarkan filter dan kata kunci
                                                            $('tbody tr').hide().filter(function() {
                                                                var text = $(this).find('td:eq(' + filterIndex(filter) + ')').text().toLowerCase();

                                                                // Periksa juga elemen input pada setiap baris
                                                                var inputs = $(this).find('input[type="text"]');
                                                                inputs.each(function() {
                                                                    text += $(this).val().toLowerCase();
                                                                });

                                                                return text.indexOf(keyword) !== -1;
                                                            }).show();
                                                        }

                                                        function filterIndex(filter) {
                                                            // Tentukan indeks kolom berdasarkan filter
                                                            switch (filter) {
                                                                case 'Nama Barang':
                                                                    return 1; // Ganti sesuai dengan indeks kolom Nama Barang
                                                                case 'Kode Barang':
                                                                    return 2; // Ganti sesuai dengan indeks kolom Kode Barang
                                                                default:
                                                                    return 1; // Jika filter tidak sesuai, gunakan indeks 1 sebagai default
                                                            }
                                                        }
                                                    </script>

                                                </tbody>
                                            </table>
                                            <!--Total-->
                                            <div class="col-sm-2">
                                                <h6>Total Record: {{ $totalDetailPenyerahanKeluaran }}</h6>
                                            </div>

                                            <!--Jika Seperti Dummy-->
                                            {{-- <div class="row mb-3">
                                                    <label for="dpp" class="col-sm-3 col-form-label">Dasar Pengenaan
                                                        Pajak (DPP) : </label>
                                                    <div class="col-sm-3">
                                                        @foreach ($additionalData['detailPenyerahanKeluaran'] as $detail)
                                                            <div class="col-sm-3">
                                                                {{ optional($detail)->dpp }}
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="dpp" class="col-sm-3 col-form-label">Pajak
                                                        Pertambahan
                                                        Nilai (PPN) : </label>
                                                    <div class="col-sm-3">
                                                        @foreach ($additionalData['detailPenyerahanKeluaran'] as $detail)
                                                            <div class="col-sm-3">
                                                                {{ optional($detail)->ppn }}
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="dpp" class="col-sm-3 col-form-label">Dasar Penjualan
                                                        Atas
                                                        Barang Mewah (PPnBM) : </label>
                                                    <div class="col-sm-3">
                                                        @foreach ($additionalData['detailPenyerahanKeluaran'] as $detail)
                                                            <div class="col-sm-3">
                                                                {{ optional($detail)->ppnbm }}
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div> --}}

                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" id="showUangMuka"> Uang Muka
                                                    </label>
                                                </div>

                                                <div class="col-md-2">
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" id="showPelunasan"> Pelunasan
                                                    </label>
                                                </div>
                                            </div>



                                            <div id="formContainer" style="display: none;">
                                                <!-- Form Input 1 -->
                                                <div class="row mb-3">
                                                    <label for="input1" class="col-sm-1 col-form-label">DPP</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" id="input1"
                                                            name="jumlah_dpp">
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="input2" class="col-sm-1 col-form-label">PPN</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" id="input2"
                                                            name="jumlah_ppn">
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="input3" class="col-sm-1 col-form-label">PPnBM</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" id="input3"
                                                            name="jumlah_ppnbm">
                                                    </div>
                                                </div>
                                            </div>


                                            <script>
                                                // Dapatkan elemen checkbox
                                                var checkboxUangMuka = document.getElementById('showUangMuka');
                                                var checkboxPelunasan = document.getElementById('showPelunasan');
                                                var formContainer = document.getElementById('formContainer');

                                                // Tambahkan event listener untuk mengubah tampilan form berdasarkan checkbox yang dicentang
                                                checkboxUangMuka.addEventListener('change', function() {
                                                    if (checkboxUangMuka.checked) {
                                                        checkboxPelunasan.checked = false; // Pastikan checkbox Pelunasan tidak dicentang
                                                        formContainer.style.display = 'block';
                                                    } else if (!checkboxPelunasan.checked) {
                                                        formContainer.style.display = 'none';
                                                    }
                                                });

                                                checkboxPelunasan.addEventListener('change', function() {
                                                    if (checkboxPelunasan.checked) {
                                                        checkboxUangMuka.checked = false; // Pastikan checkbox Uang Muka tidak dicentang
                                                        formContainer.style.display = 'block';
                                                    } else if (!checkboxUangMuka.checked) {
                                                        formContainer.style.display = 'none';
                                                    }
                                                });
                                            </script>


                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                                data-bs-target="#lawanTransaksi"><i
                                                    class="bi bi-skip-start"></i>Kembali</button>
                                            <!--Button Footer-->
                                            <button type="submit" class="btn btn-secondary" data-bs-toggle="modal"
                                                data-bs-target="#modalUpload">Simpan <i class="bi bi-floppy"></i></button>
                                        </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                            <!--END Modal Detail Transaksi-->

                            <!--============================================================-->
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
                                            <button type="button" class="btn btn-light" data-bs-toggle="modal"
                                                data-bs-target="#lawanTransaksi"><i
                                                    class="bi bi-box-arrow-left"></i></button>

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
                                                        <input type="text" id="keywordInput" name="#"
                                                            class="form-control">
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <button type="button" class="btn btn-secondary"
                                                            onclick="filterLawanTransaksi()">
                                                            <i class="bi bi-search"></i>Cari
                                                        </button>
                                                    </div>
                                                    <div class="col-10">
                                                        <label for="" class="">Masukan NPWP Lengkap Lawan
                                                            Transaksi</label>
                                                    </div>
                                                </div>
                                                <table id="carilawanTransaksiTable" class="table">
                                                    <thead class="table-dark">
                                                        <th></th>
                                                        <th>NPWP</th>
                                                        <th>Nama</th>
                                                        <th>Alamat</th>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($additionalData['lawanTransaksi'] as $lawanTransaksi)
                                                            <tr>
                                                                <td>
                                                                    <input type="checkbox" name="selectedItems[]"
                                                                        value="{{ $lawanTransaksi->npwp_lawan }}"
                                                                        onclick="addToSelectedLawanTransaksi('{{ $lawanTransaksi->npwp_lawan }}', '{{ $lawanTransaksi->nama_lawan }}', '{{ $lawanTransaksi->jalan }}, Blok {{ $lawanTransaksi->blok }}, {{ $lawanTransaksi->nomor }}, RT/RW {{ $lawanTransaksi->rt }}/{{ $lawanTransaksi->rw }}, {{ $lawanTransaksi->kelurahan }}, {{ $lawanTransaksi->kecamatan }}, {{ $lawanTransaksi->kabupaten }}, {{ $lawanTransaksi->provinsi }}, {{ $lawanTransaksi->kode_pos }}')">

                                                                </td>
                                                                <td>{{ $lawanTransaksi->npwp_lawan }}</td>
                                                                <td>{{ $lawanTransaksi->nama_lawan }}</td>
                                                                <td>{{ $lawanTransaksi->jalan }}, Blok
                                                                    {{ $lawanTransaksi->blok }},
                                                                    {{ $lawanTransaksi->nomor }}, RT/RW
                                                                    {{ $lawanTransaksi->rt }}/{{ $lawanTransaksi->rw }},
                                                                    {{ $lawanTransaksi->kelurahan }},
                                                                    {{ $lawanTransaksi->kecamatan }},
                                                                    {{ $lawanTransaksi->kabupaten }},
                                                                    {{ $lawanTransaksi->provinsi }},
                                                                    {{ $lawanTransaksi->kode_pos }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <script>
                                                        function addToLawanTransaksi(checkbox) {
                                                            if ($(checkbox).prop("checked")) {
                                                                // Mendapatkan nilai dari checkbox yang dicentang
                                                                var npwpValue = $(checkbox).val();

                                                                // Menambahkan data ke tabel Lawan Transaksi
                                                                var lawanTransaksiTable = $(
                                                                    "#lawanTransaksiTable tbody"); // pastikan ID sesuai dengan tabel lawan transaksi
                                                                var newRow = '<tr>' +
                                                                    '<td><input type="checkbox" name="lawanTransaksiItems[]" value="' + npwpValue + '" checked></td>' +
                                                                    '<td>' + npwpValue + '</td>' +
                                                                    '<td>' + $(checkbox).closest('tr').find("td:eq(2)").text() + '</td>' +
                                                                    '<td>' + $(checkbox).closest('tr').find("td:eq(3)").text() + '</td>' +
                                                                    '</tr>';

                                                                lawanTransaksiTable.append(newRow);
                                                            } else {
                                                                // Menghapus data dari tabel Lawan Transaksi jika checkbox tidak dicentang
                                                                var npwpValue = $(checkbox).val();
                                                                $("#lawanTransaksiTable tbody").find('input[value="' + npwpValue + '"]').closest('tr').remove();
                                                            }
                                                        }

                                                        function filterLawanTransaksi() {
                                                            var keyword = $('#keywordInput').val().toLowerCase();

                                                            // Loop through each row in the table
                                                            $('#carilawanTransaksiTable tbody tr').each(function() {
                                                                var npwp = $(this).find('td:nth-child(2)').text().toLowerCase();
                                                                var nama = $(this).find('td:nth-child(3)').text().toLowerCase();
                                                                var alamat = $(this).find('td:nth-child(4)').text().toLowerCase();

                                                                // Check if the keyword is present in NPWP, Nama, or Alamat
                                                                if (npwp.includes(keyword) || nama.includes(keyword) || alamat.includes(keyword)) {
                                                                    $(this).show();
                                                                } else {
                                                                    $(this).hide();
                                                                }
                                                            });
                                                        }
                                                    </script>


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
                            <!--============================================================-->

                            <!-- The Modal -->
                            <!--Modal Rekam Detail Transaksi-->
                            <div class="modal" id="rekamDetailTransaksi">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Detail Barang / Jasa</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <button type="button" class="btn btn-light" data-bs-toggle="modal"
                                                data-bs-target="#detailTransaksi"><i
                                                    class="bi bi-box-arrow-left"></i></button>
                                            <form class="row g-3" action="{{ route('AddDetailPenyerahan') }}"
                                                method="POST"> @csrf
                                                <div class="row mb-3">
                                                    <div class="col-sm-2">
                                                        <label for="npwp1" class="col-form-label">Kode</label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control"
                                                            id="selectedKode_brg_jasa" name="kode_brg"
                                                            style="padding: 4px; width: 100%;" readonly>
                                                    </div>
                                                    <div class="col-sm-2">

                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-toggle="modal" data-bs-target="#cariBarang"><i
                                                                class="bi bi-search"></i> Cari Barang / Jasa</button>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-sm-2">
                                                        <label for="npwp2" class="col-form-label">Nama</label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control"
                                                            id="selectedNama_brg_jasa" name="#"
                                                            style="padding: 4px; width: 100%;" readonly>
                                                    </div>
                                                </div>
                                                <hr>

                                                <div class="row mb-3">
                                                    <label for="" class="col-sm-2 col-form-label">Harga Satuan
                                                        (Rp)</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" id="selectedHarga" name="#"
                                                            class="form-control" readonly>
                                                    </div>
                                                </div>

                                                <script>
                                                    // Function to calculate total price
                                                    function calculateTotalPrice() {
                                                        var hargaSatuan = parseFloat($("#selectedHarga").val()) || 0;
                                                        var jumlahBarang = parseFloat($("#jumlahBarang").val()) || 0;

                                                        // Calculate total price
                                                        var totalHarga = hargaSatuan * jumlahBarang;

                                                        // Display the result in the total price input field
                                                        $("#totalHarga").val(totalHarga.toFixed(2)); // You can adjust the number of decimal places as needed
                                                    }

                                                    // Event listener for changes in unit price or quantity
                                                    $("#selectedHarga, #jumlahBarang").on("input", calculateTotalPrice);

                                                    function addToSelectedDetailTransaksi(kode, nama, harga) {
                                                        // Set nilai input dengan data yang dipilih
                                                        $("#selectedKode_brg_jasa").val(kode);
                                                        $("#selectedNama_brg_jasa").val(nama);
                                                        $("#selectedHarga").val(harga);

                                                        // Tambahkan data ke tabel di modal rekamDetailTransaksi
                                                        var detailTransaksiTable = $("#detailTransaksiTable tbody");
                                                        var newRow =
                                                            '<tr>' +
                                                            '<td><input type="checkbox" name="detailTransaksiItems[]" value="' + kode + '" checked></td>' +
                                                            '<td>' + kode + '</td>' +
                                                            '<td>' + nama + '</td>' +
                                                            '<td>' + harga + '</td>' +
                                                            '</tr>';

                                                        detailTransaksiTable.append(newRow);

                                                        // Trigger calculation when a new item is added
                                                        calculateTotalPrice();
                                                    }

                                                    // Function to remove from selected detail transaksi
                                                    function removeFromSelectedDetailTransaksi(kode) {
                                                        // Hapus data dari tabel atau lakukan tindakan lainnya
                                                        // ...

                                                        // Trigger calculation when an item is removed
                                                        calculateTotalPrice();
                                                    }
                                                </script>

                                                <div class="row mb-3">
                                                    <label for="" class="col-sm-2 col-form-label">Jumlah
                                                        Barang</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="jumlahBarang"
                                                            name="jmlh_brg" oninput="calculateTotalPrice()">
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="" class="col-sm-2 col-form-label">Harga Total
                                                        (Rp)</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="totalHarga"
                                                            name="harga_total" readonly>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="" class="col-sm-2 col-form-label">Diskon
                                                        (Rp)</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="diskon"
                                                            name="diskon" oninput="calculateFinalPrice()">
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="col-sm-3">PPN</label>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="" class="col-sm-2 col-form-label">Dasar Pengenaan
                                                        Pajak</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="hargaAkhir"
                                                            name="dpp" readonly>
                                                    </div>
                                                </div>

                                                <script>
                                                    // Function to calculate final price after applying discount
                                                    function calculateFinalPrice() {
                                                        var totalHarga = parseFloat($("#totalHarga").val()) || 0;
                                                        var diskon = parseFloat($("#diskon").val()) || 0;

                                                        // Calculate final price after applying discount
                                                        var hargaAkhir = totalHarga - (diskon);

                                                        // Display the result in the final price input field
                                                        $("#hargaAkhir").val(hargaAkhir.toFixed(2)); // You can adjust the number of decimal places as needed

                                                        // Calculate PPN based on the final price
                                                        calculatePPN();
                                                    }

                                                    // Event listener for changes in the discount input field
                                                    $("#diskon").on("input", calculateFinalPrice);

                                                    // Function to calculate PPN based on the final price
                                                    function calculatePPN() {
                                                        var hargaAkhir = parseFloat($("#hargaAkhir").val()) || 0;
                                                        var ppnRate = 10; // PPN rate is 11%

                                                        // Calculate PPN
                                                        var ppn = (hargaAkhir * ppnRate) / 100;

                                                        // Display the result in the PPN input field
                                                        $("#ppn").val(ppn.toFixed(2)); // You can adjust the number of decimal places as needed
                                                    }
                                                </script>

                                                <div class="row mb-3">
                                                    <label for="" class="col-sm-2 col-form-label">Pajak
                                                        Pertambahan Nilai</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="ppn"
                                                            name="ppn" readonly>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="" class="col-sm-2 col-form-label">Tarif PPnBM
                                                        (%)</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="tarifPPnBM"
                                                            name="ppnbm" oninput="calculatePPnBM()">
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="" class="col-sm-2 col-form-label">Pajak Penjualan
                                                        Atas Barang Mewah (PPnBM)</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="ppnbm"
                                                            name="pajak_ppnbm" readonly>
                                                    </div>
                                                </div>

                                                <!-- Add this script to calculate PPnBM -->
                                                <script>
                                                    // Function to calculate PPnBM based on the DPP and Tarif PPnBM
                                                    function calculatePPnBM() {
                                                        var dpp = parseFloat($("#hargaAkhir").val()) || 0; // Assuming "hargaAkhir" is the DPP
                                                        var tarifPPnBM = parseFloat($("#tarifPPnBM").val()) || 0;

                                                        // Calculate PPnBM
                                                        var ppnbm = (dpp * tarifPPnBM) / 100;

                                                        // Display the result in the PPnBM input field
                                                        $("#ppnbm").val(ppnbm.toFixed(2)); // You can adjust the number of decimal places as needed
                                                    }

                                                    // Event listener for changes in the Tarif PPnBM input field
                                                    $("#tarifPPnBM").on("input", calculatePPnBM);
                                                </script>
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" onclick="simpanData()"
                                                data-bs-toggle="modal" data-bs-target="#detailTransaksi">
                                                <i class="bi bi-floppy"></i> Simpan
                                            </button>
                                        </div>
                                        </form>

                                        <script>
                                            // Check if the 'openModal' flag is set
                                            @if (session('openModal'))
                                                // Open the modal when the page loads
                                                window.onload = function() {
                                                    var modal = new bootstrap.Modal(document.getElementById('detailTransaksi'));
                                                    modal.show();
                                                };
                                            @endif

                                            function simpanData() {
                                                // Assuming you have logic to save the data here

                                                // Redirect back after saving data
                                                window.location.href = '{{ url()->previous() }}';
                                            }
                                        </script>


                                    </div>
                                </div>
                            </div>
                            <!--End Modal Rekam detail Transaksi-->
                            <!--============================================================-->

                            <!-- The Modal -->
                            <!--ModalUbah detail Transaksi-->
                            <div class="modal" id="ubahDetailTransaksi">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Detail Barang/Jasa</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <button type="button" class="btn btn-light" data-bs-toggle="modal"
                                                data-bs-target="#detailTransaksi"><i
                                                    class="bi bi-box-arrow-left"></i></button>
                                            {{-- <form class=""
                                                action="{{ route('detail-penyerahan.update', $detailPenyerahanKeluaran->id) }}"
                                                method="POST">
                                                @csrf --}}
                                            <div class="row mb-3">
                                                <div class="col-sm-2">
                                                    <label for="" class="col-form-label">Kode</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="kode"
                                                        name="search" style="padding: 4px; width: 100%;">
                                                </div>
                                                <div class="col-sm-2">
                                                    <button type="button" class="btn btn-secondary" data-bs-toggle="#"
                                                        data-bs-target="#">
                                                        <i class="bi bi-search"></i> Cari Barang / Jasa
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-sm-2">
                                                    <label for="npwp2" class="col-form-label">Nama</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="nama"
                                                        name="search" style="padding: 4px; width: 100%;">
                                                </div>
                                            </div>
                                            <hr>

                                            <div class="row mb-3">
                                                <label for="" class="col-sm-2 col-form-label">Harga
                                                    Satuan</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="refrensiFaktur">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="" class="col-sm-2 col-form-label">Jumlah
                                                    Barang</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="refrensiFaktur">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="" class="col-sm-2 col-form-label">Harga
                                                    Total</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="refrensiFaktur">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="" class="col-sm-2 col-form-label">Diskon</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="refrensiFaktur">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="col-sm-3">PPN</label>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="" class="col-sm-2 col-form-label">Dasar Pengenaan
                                                    Pajak</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="refrensiFaktur">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="" class="col-sm-2 col-form-label">Pajak
                                                    Pertambahan
                                                    Nilai</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="refrensiFaktur">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="" class="col-sm-2 col-form-label">Tarif
                                                    PPnBM</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="refrensiFaktur">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="" class="col-sm-2 col-form-label">Pajak Penjualan
                                                    Atas
                                                    Barang Mewah (PPnBM)</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="refrensiFaktur">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><i
                                                    class="bi bi-floppy"></i> Simpan</button>
                                        </div>

                                        </form>

                                    </div>
                                </div>
                            </div>


                            <!--End Modal Ubah Detail Transaksi-->
                            <!--============================================================-->

                            <div class="card-body">

                                <body>
                                    <div class="outer-wrapper">
                                        <div class="table-wrapper">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>NPWP</th>
                                                        <th>Nama</th>
                                                        <th>Nomor Faktur</th>
                                                        <th>Tanggal Faktur</th>
                                                        <th>Masa</th>
                                                        <th>Tahun</th>
                                                        <th>Status Faktur</th>
                                                        <th>DPP</th>
                                                        <th>PPN</th>
                                                        <th>PPnBM</th>
                                                        <th>Status Approval</th>
                                                        <th>Tanggal Approval</th>
                                                        <th>Keterangan</th>
                                                        <th>Penandatangan</th>
                                                        <th>Refrensi</th>
                                                        <th>User Perekam</th>
                                                        <th>Tanggal Rekam</th>
                                                        <th>User Pengubah</th>
                                                        <th>Tanggal Ubah</th>
                                                    </tr>
                                                </thead>
                                                @foreach ($data as $item)
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="checkbox" name="selectedItems[]"
                                                                    value="{{ $item->id }}">
                                                            </td>
                                                            <td>{{ $item->npwp }}</td>
                                                            <!-- Mengakses data BarangJasa melalui relasi -->
                                                            <td>
                                                                {{ optional($item->lawanTransaksi)->nama_lawan }}
                                                            </td>
                                                            <td>{{ $item->nomor_seri_faktur }}</td>
                                                            <td>{{ $item->tanggal_faktur }}</td>
                                                            <td>{{ $item->masa_pajak }}</td>
                                                            <td>{{ $item->tahun_pajak }}</td>
                                                            <td></td>
                                                            <td>{{ $item->jumlah_dpp }}</td>
                                                            <td>{{ $item->jumlah_ppn }}</td>
                                                            <td>{{ $item->jumlah_ppnbm }}</td>
                                                            <td> </td>
                                                            <td> </td>
                                                            <td> </td>
                                                            <td> </td>
                                                            <td>{{ $item->refrensi }}</td>
                                                            <td>{{ Auth::user()->nama_user }}</td>
                                                            <td>{{ $item->created_at }}</td>
                                                            <td>{{ Auth::user()->nama_user }}</td>
                                                            <td>{{ $item->updated_at }}</td>
                                                        </tr>
                                                    </tbody>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                    <div>
                                        <button type="btn" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#modalDelete"><i class="bi bi-trash"></i> Delete</button>
                                        <button type="btn" class="btn btn-success"><i class="bi bi-pen"></i>
                                            Edit</button>
                                        <button class="btn" type="submit" data-bs-toggle="modal"
                                            {{-- data-bs-target="#modalUpload" --}}
                                            style="background-color: rgba(238, 129, 78, 1); color: rgb(255, 255, 255); font-family: 'Lato', sans-serif;"><i
                                                class="bi bi-upload"></i>
                                            Upload</button>
                                        <button type="btn" class="btn btn-warning"><i class="bi bi-eye"></i>
                                            Preview</button>
                                        <button type="btn" class="btn btn-info" data-bs-toggle="modal"
                                            data-bs-target="#modalPrint"><i class="bi bi-printer"></i> Print</button>
                                    </div>
                            </div>

                            <!--Modal Cari Barang Jasa -->
                            <!--The Modal-->
                            <div class="modal" id="cariBarang">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Cari Refrensi Barang Jasa</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <button type="button" class="btn btn-light" data-bs-toggle="modal"
                                                data-bs-target="#rekamDetailTransaksi"><i
                                                    class="bi bi-box-arrow-left"></i></button>

                                            <form class="row g-3 my-2" action="">
                                                <div class="row mb-3">
                                                    <div class="col-sm-2 col-form-label">
                                                        <label for="filter" class="col-form-label">Filter</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <select name="" id="searchFilter" class="form-select">
                                                            <option selected>Kode Barang</option>
                                                            <option selected>Nama</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-2 col-form-label">
                                                        <label for="kata_kunci" class="col-form-label">Kata Kunci</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="text" id="keywordInput" name="#"
                                                            class="form-control">
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <button type="button" class="btn btn-secondary"
                                                            onclick="filterDetailTransaksi()">
                                                            <i class="bi bi-search"></i>Cari
                                                        </button>
                                                    </div>
                                                    <div class="col-10">
                                                        <label for="" class="">Masukan Kode Barang yang akan
                                                            dicari</label>
                                                    </div>
                                                </div>
                                                <table id="caridetailTransaksiTable" class="table">
                                                    <thead class="table-dark">
                                                        <th></th>
                                                        <th>ID</th>
                                                        <th>Kode</th>
                                                        <th>Nama</th>
                                                        <th>Harga Satuan</th>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($additionalData['barangJasa'] as $barangJasa)
                                                            <tr id="row_{{ $barangJasa->id }}">
                                                                <td>
                                                                    <input type="checkbox" name="selectedItems[]"
                                                                        value="{{ $barangJasa->id }}"
                                                                        onclick="addToSelectedBarangJasa(this)">
                                                                </td>
                                                                <td>{{ $barangJasa->id }}</td>
                                                                <td>{{ $barangJasa->kode_brg_jasa }}</td>
                                                                <td>{{ $barangJasa->nama_brg_jasa }}</td>
                                                                <td>{{ $barangJasa->harga }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <script>
                                                        function addToSelectedBarangJasa(checkbox) {
                                                            if ($(checkbox).prop("checked")) {
                                                                var idValue = $(checkbox).val(); // Menggunakan id sebagai nilai
                                                                var namaValue = $(checkbox).closest('tr').find("td:eq(3)").text();
                                                                var hargaValue = $(checkbox).closest('tr').find("td:eq(4)").text();

                                                                // Panggil fungsi di modal rekamDetailTransaksi
                                                                addToSelectedDetailTransaksi(idValue, namaValue, hargaValue);
                                                            } else {
                                                                // Dapatkan data yang perlu dihapus
                                                                var idValue = $(checkbox).val();
                                                                // Panggil fungsi di modal rekamDetailTransaksi untuk menghapus data
                                                                removeFromSelectedDetailTransaksi(idValue);
                                                            }
                                                        }

                                                        function filterDetailTransaksi() {
                                                            var keyword = $('#keywordInput').val().toLowerCase();
                                                            $('#caridetailTransaksiTable tbody tr').each(function() {
                                                                var kode = $(this).find('td:nth-child(2)').text().toLowerCase();
                                                                var nama = $(this).find('td:nth-child(3)').text().toLowerCase();
                                                                var harga = $(this).find('td:nth-child(4)').text().toLowerCase();
                                                                if (kode.includes(keyword) || nama.includes(keyword) || harga.includes(keyword)) {
                                                                    $(this).show();
                                                                } else {
                                                                    $(this).hide();
                                                                }
                                                            });
                                                        }
                                                    </script>

                                                </table>
                                            </form>

                                        </div>

                                        <!-- Modal footer -->
                                        {{-- <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Close</button>
                                        </div> --}}

                                    </div>
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
                                            Anda akan menghapus 1 Faktur Pajak Keluaran, Apakah Anda yakin ingin menghapus
                                            ini?
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
                            {{-- <div class="modal" id="modalUpload">
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
                            </div> --}}
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

        <script>
            @if (session('modal'))
                // Open the Add Admin modal
                $(document).ready(function() {
                    $('#{{ session('modal') }}').modal('show');
                });
            @endif
        </script>
    @endsection
