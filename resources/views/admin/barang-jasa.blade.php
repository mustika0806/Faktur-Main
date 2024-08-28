@extends('layouts.dashboard')

@section('title')
    Barang Jasa
@endsection

@section('body-class')
    services-details-page
@endsection

@section('main-content')
    <!-- Template Main Tabel CSS File -->
    <link href="/assets/landing/css/css_tabel.css" rel="stylesheet" />




    <section id="hero" class="hero">
        <div class="pagetitle">
            <h1>Barang / Jasa</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Refrensi</a></li>
                    <li class="breadcrumb-item active">Barang / Jasa</li>
                </ol>
            </nav>
        </div>
        <!--End Page Title -->

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


                            <div class="outer-wrapper">
                                <div class="table-wrapper">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Kode</th>
                                                <th>Nama Barang</th>
                                                <th>Harga Satuan</th>
                                                <th>User Perekam</th>
                                                <th>Tanggal Rekam</th>
                                                <th>User Pengubah</th>
                                                <th>Tanggal Ubah</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            @forelse ($data as $key => $item)
                                                <tr>
                                                    <td>{{ $item->kode_brg_jasa }}</td>
                                                    <td>{{ $item->nama_brg_jasa }}</td>
                                                    <td>{{ $item->harga }}</td>
                                                    <td>{{ $item->createdBy() }}</td>
                                                    <td>{{ $item->created_at }}</td>
                                                    <td>{{ $item->updatedBy() }}</td>
                                                    <td>{{ $item->updated_at ?? '-' }}</td>
                                                    <td>
                                                        <div style="display: flex; gap: 10px;">
                                                            <button class="btn text-warning" type="submit"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#modalEdit{{ $item->id }}"><i
                                                                    class="bi bi-pen"></i></button>

                                                            <form
                                                                action="{{ route('barang-jasa.delete', $item->kode_brg_jasa) }}"
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


                                                <!--Modal Tambah-->
                                                <!-- The Modal -->
                                                <div class="modal" id="modalEdit{{ $item->id }}">
                                                    <div class="modal-dialog modal-xl">
                                                        <div class="modal-content">

                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Ubah Referensi Barang / Jasa</h4>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"></button>
                                                            </div>

                                                            <!-- Modal body -->
                                                            <div class="modal-body">
                                                                {{-- @foreach ($data as $item) --}}
                                                                <form class=""
                                                                    action="{{ route('barang-jasa.update', $item->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <div class="row mb-3">
                                                                        <label for=""
                                                                            class="col-sm-2 col-form-label">Kode
                                                                            Barang / Jasa <b
                                                                                class="text-danger">*</b></label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" class="form-control"
                                                                                id="kode_brg_jasa_{{ $item->id }}"
                                                                                name="kode_brg_jasa_{{ $item->id }}"
                                                                                value="{{ old("kode_brg_jasa_$item->id", $item->kode_brg_jasa) }}">
                                                                            <div class="col-10">
                                                                                <label for=""
                                                                                    class="">Kosongkan Jika Tidak
                                                                                    Memiliki Kode Barang
                                                                                    Atau Jasa</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <label for=""
                                                                            class="col-sm-2 col-form-label">Nama
                                                                            <b class="text-danger">*</b></label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" class="form-control"
                                                                                id="nama_brg_jasa_{{ $item->id }}"
                                                                                name="nama_brg_jasa_{{ $item->id }}"
                                                                                value="{{ old("nama_brg_jasa_$item->id", $item->nama_brg_jasa) }}">
                                                                        </div>
                                                                    </div>


                                                                    <div class="row mb-3">
                                                                        <label for=""
                                                                            class="col-sm-2 col-form-label">Harga
                                                                            Jual
                                                                            Barang / Jasa</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" class="form-control"
                                                                                id="harga_asli_{{ $item->id }}"
                                                                                name="harga_asli_{{ $item->id }}"
                                                                                onkeyup="hitungPPNEdit( '{{ $item->id }}' )"
                                                                                value="{{ old("harga_asli_$item->id") }}" />
                                                                            <label for="" class="">Sebagai
                                                                                Nilai
                                                                                Inisialisasi Untuk Harga Satuan Di Faktur
                                                                                Pajak</label>
                                                                            <div class="form-check mt-2">

                                                                                <input type="hidden" class="form-control"
                                                                                    name="ppn_{{ $item->id }}"
                                                                                    value="0" />

                                                                                <input class="form-check-input"
                                                                                    type="checkbox"
                                                                                    id="checkboxValue_{{ $item->id }}"
                                                                                    name="ppn_{{ $item->id }}"
                                                                                    value="1"
                                                                                    {{ old("ppn_$item->id") == 1 ? 'selected' : '' }}
                                                                                    onchange="handleCheckboxChangeEdit('{{ $item->id }}')">
                                                                                <label class="form-check-label"
                                                                                    for="checkboxValue_{{ $item->id }}">
                                                                                    Termasuk PPN
                                                                                </label>
                                                                            </div>

                                                                            <div class="mt-2"
                                                                                id="formInput_{{ $item->id }}"
                                                                                style="display: none;">
                                                                                <label for="inputPPN_{{ $item->id }}"
                                                                                    class="form-label">Harga
                                                                                    Jual
                                                                                    Barang/Jasa Termasuk PPN</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="inputPPN_{{ $item->id }}"
                                                                                    name="harga_ppn_{{ $item->id }}"
                                                                                    value="{{ old("harga_ppn_$item->id") }}">
                                                                            </div>


                                                                        </div>
                                                                    </div>

                                                                    <!-- Modal footer -->
                                                                    <div class="modal-footer">
                                                                        <button type="reset" class="btn btn-secondary">
                                                                            <i class="bi bi-stars"></i> Bersihkan Form
                                                                        </button>
                                                                        <button class="btn btn-primary" type="submit"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#modalUpload"><i
                                                                                class="bi bi-floppy"></i>
                                                                            Ubah</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--End Modal-->




                                            @empty
                                                <tr>
                                                    <td colspan="100%"><b>Tidak ada data yang ditemukan !</b></td>
                                                </tr>
                                            @endforelse
                                        </tbody>

                                    </table>
                                </div>
                            </div>

                            <div class="d-flex align-items-center">
                                <h6>Total Record: {{ $totalRecords }} </h6>
                                <button type="button" class="btn btn-light ms-auto"
                                    style="background-color: rgba(238, 129, 78, 1); color: rgb(255, 255, 255); font-family: 'Lato', sans-serif;"
                                    data-bs-toggle="modal" data-bs-target="#modalTambah"><i class="bi bi-plus"></i>
                                    Tambah</button>
                            </div>
                            <!--Modal Tambah-->
                            <!-- The Modal -->
                            <div class="modal" id="modalTambah">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Referensi Barang / Jasa</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            {{-- @foreach ($data as $item) --}}
                                            <form class="" action="{{ route('barang-jasa.add') }}" method="POST">
                                                @csrf
                                                <div class="row mb-3">
                                                    <label for="" class="col-sm-2 col-form-label">Kode
                                                        Barang / Jasa <b class="text-danger">*</b></label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="kode_brg_jasa"
                                                            name="kode_brg_jasa" value="{{ old('kode_brg_jasa') }}">
                                                        <div class="col-10">
                                                            <label for="" class="">Kosongkan Jika Tidak
                                                                Memiliki Kode Barang
                                                                Atau Jasa</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="" class="col-sm-2 col-form-label">Nama
                                                        <b class="text-danger">*</b></label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="nama_brg_jasa"
                                                            name="nama_brg_jasa" value="{{ old('nama_brg_jasa') }}">
                                                    </div>
                                                </div>


                                                <div class="row mb-3">
                                                    <label for="" class="col-sm-2 col-form-label">Harga
                                                        Jual
                                                        Barang / Jasa</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="harga_asli"
                                                            name="harga_asli" onkeyup="hitungPPN()"
                                                            value="{{ old('harga_asli') }}" />
                                                        <label for="" class="">Sebagai
                                                            Nilai
                                                            Inisialisasi Untuk Harga Satuan Di Faktur
                                                            Pajak</label>
                                                        <div class="form-check mt-2">

                                                            <input type="hidden" class="form-control" name="ppn"
                                                                value="0" />

                                                            <input class="form-check-input" type="checkbox"
                                                                id="checkboxValue" name="ppn" value="1"
                                                                {{ old('ppn') == 1 ? 'selected' : '' }}
                                                                onchange="handleCheckboxChange()">
                                                            <label class="form-check-label" for="checkboxValue">
                                                                Termasuk PPN
                                                            </label>
                                                        </div>

                                                        <div class="mt-2" id="formInput" style="display: none;">
                                                            <label for="inputPPN" class="form-label">Harga
                                                                Jual
                                                                Barang/Jasa Termasuk PPN</label>
                                                            <input type="text" class="form-control" id="inputPPN"
                                                                name="harga_ppn" value="{{ old('harga_ppn') }}">
                                                        </div>


                                                    </div>
                                                </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="reset" class="btn btn-secondary">
                                                        <i class="bi bi-stars"></i> Bersihkan Form
                                                    </button>
                                                    <button class="btn btn-primary" type="submit" data-bs-toggle="modal"
                                                        data-bs-target="#modalUpload"><i class="bi bi-floppy"></i>
                                                        Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End Modal-->
                        </div>
                    </div>
                </div>
            </div>



        </section>

        <script src="/assets/landing/js/jquery-3.6.4.min.js"></script>

        <script>
            function hitungPPN() {
                var data = document.getElementById('harga_asli').value;
                var inputPPN = document.getElementById('inputPPN');

                var nilai_ppn = data * 1.11; // Increase by 11%-
                // Convert to integer using Math.floor

                inputPPN.value = Math.floor(nilai_ppn);
            }

            function hitungPPNEdit(loop = 0) {
                var data = document.getElementById('harga_asli_' + loop).value;
                var inputPPN = document.getElementById('inputPPN_' + loop);

                var nilai_ppn = data * 1.11; // Increase by 11%-
                // Convert to integer using Math.floor

                inputPPN.value = Math.floor(nilai_ppn);
            }

            function handleCheckboxChangeEdit(loop = 0) {
                // Ambil elemen checkbox dan formulir input tambahan
                var checkbox = document.getElementById('checkboxValue_' + loop);
                var formInput = document.getElementById('formInput_' + loop);


                if (checkbox.checked) {
                    formInput.style.display = 'block';
                } else {
                    // Jika checkbox tidak dicentang, sembunyikan formulir input
                    formInput.style.display = 'none';
                }
            }




            function handleCheckboxChange() {
                // Ambil elemen checkbox dan formulir input tambahan
                var checkbox = document.getElementById('checkboxValue');
                var formInput = document.getElementById('formInput');


                if (checkbox.checked) {
                    formInput.style.display = 'block';
                } else {
                    // Jika checkbox tidak dicentang, sembunyikan formulir input
                    formInput.style.display = 'none';
                }
            }
        </script>


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

            @if (session('modalTambah') === 'open')
                // Open the Add Admin modal
                $(document).ready(function() {
                    $('#modalTambah').modal('show');
                    hitungPPN();
                    handleCheckboxChange();
                });
            @endif
        </script>
    @endsection
