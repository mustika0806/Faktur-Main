@extends('layouts.dashboard')

@section('title')
Administrasi User
@endsection

@section('body-class')
services-details-page
@endsection

@section('main-content')
<!-- Template Main Tabel CSS File -->
<link href="/assets/landing/css/css_tabel.css" rel="stylesheet" />

<section id="hero" class="hero">
    <div class="pagetitle">
        <h1>Administrasi User</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('DashboardAdmin') }}">Dashboard</a></li>
                <li class="breadcrumb-item">Referensi</li>
                <li class="breadcrumb-item active">Administrasi User</li>
            </ol>
        </nav>
    </div>
    <!--End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <div class="container-fluid p-0">
                <div class="card">
                    <div class="card-header">
                        <button class="btn" type="submit" data-bs-toggle="modal" data-bs-target="#modalTambahAdmin"
                            style="background-color: rgba(238, 129, 78, 1); color: rgb(255, 255, 255); font-family: 'Lato', sans-serif;"><i
                                class="bi bi-plus"></i>
                            Tambah Admin</button>
                        <button class="btn" type="submit" data-bs-toggle="modal" data-bs-target="#modalTambahPerekam"
                            style="background-color: rgba(238, 129, 78, 1); color: rgb(255, 255, 255); font-family: 'Lato', sans-serif;"><i
                                class="bi bi-plus"></i>
                            Tambah Perekam</button>
                        <!--Modal-->
                    </div>

                    <!-- The Modal -->
                    <!--Modal Tambah Admin-->
                    <div class="modal" id="modalTambahAdmin">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Tambah Admin</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form class="row g-3" action="{{ route('AddAdmin') }}" method="POST"> @csrf
                                        <div class="col-sm-4">
                                            <h5>Tipe User: Admin/Penandatanganan</h5>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="" class="col-sm-2 col-form-label">NPWP <b
                                                    class="text-danger">*</b></label>
                                            <div class="col-sm-10">
                                                <input type="text"
                                                    class="form-control @error('admin_tambah_npwp_pkp') is-invalid @enderror"
                                                    name="admin_tambah_npwp_pkp" value="{{ Auth::user()->npwp_pkp }}"
                                                    id="#" onclick="return false" readonly>
                                                @error('admin_tambah_npwp_pkp') <small class="invalid-feedback">{{
                                                    $message }}</small> @enderror

                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="" class="col-sm-2 col-form-label">Nama User <b
                                                    class="text-danger">*</b></label>
                                            <div class="col-sm-10">
                                                <input type="text"
                                                    class="form-control @error('admin_tambah_nama_user') is-invalid @enderror"
                                                    id="#" name="admin_tambah_nama_user"
                                                    value="{{ old('admin_tambah_nama_user') }}">

                                                @error('admin_tambah_nama_user') <small class="invalid-feedback">{{
                                                    $message }}</small> @enderror

                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="" class="col-sm-2 col-form-label">Nama
                                                Lengkap <b class="text-danger">*</b></label>
                                            <div class="col-sm-10">
                                                <input type="text"
                                                    class="form-control @error('admin_tambah_name') is-invalid @enderror"
                                                    id="#" name="admin_tambah_name"
                                                    value="{{ old('admin_tambah_name') }}">

                                                @error('admin_tambah_name') <small class="invalid-feedback">{{
                                                    $message }}</small> @enderror

                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="" class="col-sm-2 col-form-label">Password <b
                                                    class="text-danger">*</b></label>
                                            <div class="col-sm-10">
                                                <input type="password"
                                                    class="form-control @error('admin_tambah_password') is-invalid @enderror"
                                                    id="#" name="admin_tambah_password"
                                                    value="{{ old('admin_tambah_password') }}">

                                                @error('admin_tambah_password') <small class="invalid-feedback">{{
                                                    $message }}</small> @enderror

                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="" class="col-sm-2 col-form-label">Ulangi
                                                Password <b class="text-danger">*</b></label>
                                            <div class="col-sm-10">
                                                <input type="password"
                                                    class="form-control @error('admin_tambah_ulangi_password') is-invalid @enderror"
                                                    id="#" name="admin_tambah_ulangi_password"
                                                    value="{{ old('admin_tambah_ulangi_password') }}">

                                                @error('admin_tambah_ulangi_password') <small
                                                    class="invalid-feedback">{{ $message }}</small> @enderror

                                            </div>
                                        </div>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button class="btn btn-block" type="submit" data-bs-toggle="modal"
                                        data-bs-target="#modalUpload"
                                        style="background-color: rgba(238, 129, 78, 1); color: rgb(255, 255, 255); font-family: 'Lato', sans-serif; width: 100%;">
                                        Daftarkan Admin</button>
                                </div>

                                </form>


                            </div>
                        </div>
                    </div>
                    <!--End-->

                    <!--Modal Tambah Perekam-->
                    <!-- The Modal -->
                    <div class="modal" id="modalTambahPerekam">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Tambah Perekam</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form class="row g-3" action="{{ route('AddPerekam') }}" method="POST"> @csrf
                                        <div class="col-sm-4">
                                            <h5>Tipe User: User Lokal / Input Data</h5>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="" class="col-sm-2 col-form-label">NPWP <b
                                                    class="text-danger">*</b></label>
                                            <div class="col-sm-10">
                                                <input type="text"
                                                    class="form-control @error('perekam_tambah_npwp_pkp') is-invalid @enderror"
                                                    id="#" name="perekam_tambah_npwp_pkp" onclick="return false"
                                                    value="{{ Auth::user()->npwp_pkp }}" readonly>

                                                @error('perekam_tambah_npwp_pkp') <small class="invalid-feedback">{{
                                                    $message }}</small> @enderror


                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="" class="col-sm-2 col-form-label">Nama User <b
                                                    class="text-danger">*</b></label>
                                            <div class="col-sm-10">
                                                <input type="text"
                                                    class="form-control @error('perekam_tambah_nama_user') is-invalid @enderror"
                                                    id="#" name="perekam_tambah_nama_user"
                                                    value="{{ old('perekam_tambah_nama_user') }}">

                                                @error('perekam_tambah_nama_user') <small class="invalid-feedback">{{
                                                    $message }}</small> @enderror

                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="" class="col-sm-2 col-form-label">Nama
                                                Lengkap <b class="text-danger">*</b></label>
                                            <div class="col-sm-10">
                                                <input type="text"
                                                    class="form-control @error('perekam_tambah_name') is-invalid @enderror"
                                                    id="#" name="perekam_tambah_name"
                                                    value="{{ old('perekam_tambah_name') }}">

                                                @error('perekam_tambah_name') <small class="invalid-feedback">{{
                                                    $message }}</small> @enderror

                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="" class="col-sm-2 col-form-label">Password <b
                                                    class="text-danger">*</b></label>
                                            <div class="col-sm-10">
                                                <input type="password"
                                                    class="form-control @error('perekam_tambah_password') is-invalid @enderror"
                                                    id="#" name="perekam_tambah_password"
                                                    value="{{ old('perekam_tambah_password') }}">

                                                @error('perekam_tambah_password') <small class="invalid-feedback">{{
                                                    $message }}</small> @enderror


                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="" class="col-sm-2 col-form-label">Ulangi
                                                Password <b class="text-danger">*</b></label>
                                            <div class="col-sm-10">
                                                <input type="password"
                                                    class="form-control @error('perekam_tambah_ulangi_password') is-invalid @enderror"
                                                    id="#" name="perekam_tambah_ulangi_password"
                                                    value="{{ old('perekam_tambah_ulangi_password') }}">

                                                @error('perekam_tambah_ulangi_password') <small
                                                    class="invalid-feedback">{{ $message }}</small> @enderror

                                            </div>
                                        </div>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button class="btn" type="submit" data-bs-toggle="modal"
                                        data-bs-target="#modalUpload"
                                        style="background-color: rgba(238, 129, 78, 1); color: rgb(255, 255, 255); font-family: 'Lato', sans-serif; width: 100%;">
                                        Daftarkan Perekam</button>
                                </div>

                                </form>


                            </div>
                        </div>
                    </div>
                    <!--End Modal Tambah Perekam-->
                    <div class="card-body">
                        <div class="outer-wrapper">
                            <div class="table-wrapper">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Nama User</th>
                                            <th>Nama Lengkap</th>
                                            <th>Role</th>
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
                                            <td>{{ $item->nama_user }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->user_local->role ?? 'Admin' }}</td>
                                            <td>{{ $item->nama_user }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>{{ $item->nama_user }}</td>
                                            <td>{{ $item->updated_at }}</td>
                                            <td>
                                                <div style="display: flex; gap: 10px;">


                                                    @if ( $item->user_local && $item->user_local->role == 'Pegawai' )
                                                    <button class="btn text-warning" type="submit"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modalEditPegawai{{ $item->id }}"><i
                                                            class="bi bi-pen"></i></button>

                                                    @else
                                                    <button class="btn text-warning" type="submit"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modalEditAdmin{{ $item->id }}"><i
                                                            class="bi bi-pen"></i></button>

                                                    @endif

                                                    <form action="{{ route('administrasi-user.delete', $item->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        {{-- <button class="btn" type="submit"
                                                            onclick="return confirm('Apakah Anda yakin ingin menghapus item ini?')">
                                                            <i class="bi bi-trash"></i>
                                                        </button> --}}

                                                        <button class="btn text-danger" type="button"
                                                            onclick="confirmDelete(this.form)">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>


                                        @if ( $item->user_local && $item->user_local->role == 'Pegawai' )
                                        <div class="modal" id="modalEditPegawai{{ $item->id }}">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Ubah Registrasi User</h4>

                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"></button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <form class="row g-3"
                                                            action="{{ route('UpdatePegawai', $item->id) }}"
                                                            method="POST"> @csrf @method('PUT')
                                                            <div class="col-sm-4">
                                                                <h5>Tipe User: User Lokal / Input Data</h5>
                                                            </div>

                                                            <input type="hidden" name="old_username"
                                                                value="{{ $item->nama_user }}" />
                                                            <div class="row mb-3">
                                                                <label for="" class="col-sm-2 col-form-label">NPWP <b
                                                                        class="text-danger">*</b></label>
                                                                <div class="col-sm-10">
                                                                    <input type="text"
                                                                        class="form-control @error('pegawai_update_' .$item->id. '_npwp_pkp') is-invalid @enderror"
                                                                        name="pegawai_update_{{ $item->id }}_npwp_pkp"
                                                                        value="{{ Auth::user()->npwp_pkp }}" id="#"
                                                                        onclick="return false" readonly>
                                                                    @error('pegawai_update_' .$item->id. '_npwp_pkp')
                                                                    <small class="invalid-feedback">{{
                                                                        $message }}</small> @enderror

                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="" class="col-sm-2 col-form-label">Nama User
                                                                    <b class="text-danger">*</b></label>
                                                                <div class="col-sm-10">
                                                                    <input type="text"
                                                                        class="form-control @error('pegawai_update_' .$item->id. '_nama_user') is-invalid @enderror"
                                                                        id="#"
                                                                        name="pegawai_update_{{ $item->id }}_nama_user"
                                                                        value="{{ old('pegawai_update_' .$item->id. '_nama_user', $item->nama_user) }}">

                                                                    @error('pegawai_update_' .$item->id. '_nama_user')
                                                                    <small class="invalid-feedback">{{
                                                                        $message }}</small> @enderror

                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="" class="col-sm-2 col-form-label">Nama
                                                                    Lengkap <b class="text-danger">*</b></label>
                                                                <div class="col-sm-10">
                                                                    <input type="text"
                                                                        class="form-control @error('pegawai_update_' .$item->id. '_name') is-invalid @enderror"
                                                                        id="#" name="pegawai_update_{{ $item->id }}_name"
                                                                        value="{{ old('pegawai_update_' .$item->id. '_name', $item->name ) }}">

                                                                    @error('pegawai_update_' .$item->id. '_name') <small
                                                                        class="invalid-feedback">{{
                                                                        $message }}</small> @enderror

                                                                </div>
                                                            </div>


                                                            <div class="row mb-3">

                                                                <label for="" class="col-sm-2 col-form-label">Ganti
                                                                    Password <b class="text-danger">*</b></label>
                                                                <div class="col-sm-10">

                                                                    <div class="form-check form-switch">

                                                                        <input type="hidden" value="0"
                                                                            name="pegawai_update_{{ $item->id }}_ganti_password" />
                                                                        <input class="form-check-input" value="1"
                                                                            type="checkbox"
                                                                            id="pegawai_update_{{ $item->id }}_ganti_password"
                                                                            onclick="ganti_password({{ $item->id }})"
                                                                            name="pegawai_update_{{ $item->id }}_ganti_password"
                                                                            {{ ( old( 'pegawai_update_' .$item->id.
                                                                        '_ganti_password' ) == 1 ) ? 'checked' : '' }}>
                                                                        {{-- <label class="form-check-label"
                                                                            for="flexSwitchCheckDefault">Ganti
                                                                            Password</label> --}}
                                                                    </div>
                                                                </div>

                                                            </div>


                                                            <div class="row mb-3 ganti-password-{{ $item->id }} d-none">
                                                                <label for="" class="col-sm-2 col-form-label">Password
                                                                    <b class="text-danger">*</b></label>
                                                                <div class="col-sm-10">
                                                                    <input type="password"
                                                                        class="form-control @error('pegawai_update_' .$item->id. '_password') is-invalid @enderror"
                                                                        id="#"
                                                                        name="pegawai_update_{{ $item->id }}_password"
                                                                        value="{{ old('pegawai_update_' .$item->id. '_password') }}">

                                                                    @error('pegawai_update_'.$item->id.'_password')
                                                                    <small class="invalid-feedback">{{
                                                                        $message }}</small> @enderror

                                                                </div>
                                                            </div>
                                                            <div class="row mb-3 ganti-password-{{ $item->id }} d-none">
                                                                <label for="" class="col-sm-2 col-form-label">Ulangi
                                                                    Password <b class="text-danger">*</b></label>
                                                                <div class="col-sm-10">
                                                                    <input type="password"
                                                                        class="form-control @error('pegawai_update_'.$item->id.'_ulangi_password') is-invalid @enderror"
                                                                        id="#"
                                                                        name="pegawai_update_{{ $item->id }}_ulangi_password"
                                                                        value="{{ old('pegawai_update_'.$item->id.'_ulangi_password') }}">

                                                                    @error('pegawai_update_'.$item->id.'_ulangi_password')
                                                                    <small class="invalid-feedback">{{ $message
                                                                        }}</small>
                                                                    @enderror

                                                                </div>
                                                            </div>


                                                    </div>



                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button class="btn btn-block" type="submit"
                                                            data-bs-toggle="modal" data-bs-target="#modalUpload"
                                                            style="background-color: rgba(238, 129, 78, 1); color: rgb(255, 255, 255); font-family: 'Lato', sans-serif; width: 100%;">
                                                            Ubah Pegawai</button>
                                                    </div>

                                                    </form>


                                                </div>
                                            </div>
                                        </div>

                                        @else
                                        <div class="modal" id="modalEditAdmin{{ $item->id }}">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Ubah Registrasi User</h4>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"></button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <form class="row g-3"
                                                            action="{{ route('UpdateAdmin', $item->id) }}"
                                                            method="POST"> @csrf @method('PUT')
                                                            <div class="col-sm-4">
                                                                <h5>Tipe User: Admin/Penandatanganan</h5>
                                                            </div>

                                                            <input type="hidden" name="old_username"
                                                                value="{{ $item->nama_user }}" />
                                                            <div class="row mb-3">
                                                                <label for="" class="col-sm-2 col-form-label">NPWP <b
                                                                        class="text-danger">*</b></label>
                                                                <div class="col-sm-10">
                                                                    <input type="text"
                                                                        class="form-control @error('admin_update_' .$item->id. '_npwp_pkp') is-invalid @enderror"
                                                                        name="admin_update_{{ $item->id }}_npwp_pkp"
                                                                        value="{{ Auth::user()->npwp_pkp }}" id="#"
                                                                        onclick="return false" readonly>
                                                                    @error('admin_update_' .$item->id. '_npwp_pkp')
                                                                    <small class="invalid-feedback">{{
                                                                        $message }}</small> @enderror

                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="" class="col-sm-2 col-form-label">Nama User
                                                                    <b class="text-danger">*</b></label>
                                                                <div class="col-sm-10">
                                                                    <input type="text"
                                                                        class="form-control @error('admin_update_' .$item->id. '_nama_user') is-invalid @enderror"
                                                                        id="#"
                                                                        name="admin_update_{{ $item->id }}_nama_user"
                                                                        value="{{ old('admin_update_' .$item->id. '_nama_user', $item->nama_user) }}">

                                                                    @error('admin_update_' .$item->id. '_nama_user')
                                                                    <small class="invalid-feedback">{{
                                                                        $message }}</small> @enderror

                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="" class="col-sm-2 col-form-label">Nama
                                                                    Lengkap <b class="text-danger">*</b></label>
                                                                <div class="col-sm-10">
                                                                    <input type="text"
                                                                        class="form-control @error('admin_update_' .$item->id. '_name') is-invalid @enderror"
                                                                        id="#" name="admin_update_{{ $item->id }}_name"
                                                                        value="{{ old('admin_update_' .$item->id. '_name', $item->name ) }}">

                                                                    @error('admin_update_' .$item->id. '_name') <small
                                                                        class="invalid-feedback">{{
                                                                        $message }}</small> @enderror

                                                                </div>
                                                            </div>


                                                            <div class="row mb-3">

                                                                <label for="" class="col-sm-2 col-form-label">Ganti
                                                                    Password <b class="text-danger">*</b></label>
                                                                <div class="col-sm-10">

                                                                    <div class="form-check form-switch">

                                                                        <input type="hidden" value="0"
                                                                            name="admin_update_{{ $item->id }}_ganti_password" />
                                                                        <input class="form-check-input" value="1"
                                                                            type="checkbox"
                                                                            id="admin_update_{{ $item->id }}_ganti_password"
                                                                            onclick="ganti_password({{ $item->id }})"
                                                                            name="admin_update_{{ $item->id }}_ganti_password"
                                                                            {{ ( old( 'admin_update_' .$item->id.
                                                                        '_ganti_password' ) == 1 ) ? 'checked' : '' }}>
                                                                        {{-- <label class="form-check-label"
                                                                            for="flexSwitchCheckDefault">Ganti
                                                                            Password</label> --}}
                                                                    </div>
                                                                </div>

                                                            </div>


                                                            <div class="row mb-3 ganti-password-{{ $item->id }} d-none">
                                                                <label for="" class="col-sm-2 col-form-label">Password
                                                                    <b class="text-danger">*</b></label>
                                                                <div class="col-sm-10">
                                                                    <input type="password"
                                                                        class="form-control @error('admin_update_' .$item->id. '_password') is-invalid @enderror"
                                                                        id="#"
                                                                        name="admin_update_{{ $item->id }}_password"
                                                                        value="{{ old('admin_update_' .$item->id. '_password') }}">

                                                                    @error('admin_update_'.$item->id.'_password')
                                                                    <small class="invalid-feedback">{{
                                                                        $message }}</small> @enderror

                                                                </div>
                                                            </div>
                                                            <div class="row mb-3 ganti-password-{{ $item->id }} d-none">
                                                                <label for="" class="col-sm-2 col-form-label">Ulangi
                                                                    Password <b class="text-danger">*</b></label>
                                                                <div class="col-sm-10">
                                                                    <input type="password"
                                                                        class="form-control @error('admin_update_'.$item->id.'_ulangi_password') is-invalid @enderror"
                                                                        id="#"
                                                                        name="admin_update_{{ $item->id }}_ulangi_password"
                                                                        value="{{ old('admin_update_'.$item->id.'_ulangi_password') }}">

                                                                    @error('admin_update_'.$item->id.'_ulangi_password')
                                                                    <small class="invalid-feedback">{{ $message
                                                                        }}</small>
                                                                    @enderror

                                                                </div>
                                                            </div>


                                                    </div>



                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button class="btn btn-block" type="submit"
                                                            data-bs-toggle="modal" data-bs-target="#modalUpload"
                                                            style="background-color: rgba(238, 129, 78, 1); color: rgb(255, 255, 255); font-family: 'Lato', sans-serif; width: 100%;">
                                                            Ubah Admin</button>
                                                    </div>

                                                    </form>


                                                </div>
                                            </div>
                                        </div>
                                        @endif



                                        @empty

                                        <tr>
                                            <td colspan="100%">Tidak ada data yang ditemukan !</td>
                                        </tr>
                                        @endforelse
                                    </tbody>

                                </table>
                            </div>
                        </div>

                    </div>

                </div>

    </section>

    <script src="/assets/landing/js/jquery-3.6.4.min.js"></script>

    <script>
        function ganti_password(itemId) {
            // Get the checkbox value by checking if the checkbox is checked
            var checkboxValue = $('#admin_update_' + itemId + '_ganti_password').prop('checked');

            if ( checkboxValue ) {
                checkboxValue = checkboxValue;
            } else {
                checkboxValue = $('#pegawai_update_' + itemId + '_ganti_password').prop('checked');
            }

            console.log(checkboxValue, itemId);

            // Toggle a class to show or hide the password input fields based on the item ID
            $('.ganti-password-' + itemId).toggleClass('d-none', !checkboxValue);
        }
    </script>




    <script>
        function confirmDelete(form) {
            event.preventDefault(); // Prevent default form submission

            Swal.fire({
                title: 'Apakah Anda yakin ingin menghapus item ini?'
                , icon: 'warning'
                , showCancelButton: true
                , confirmButtonColor: '#d33'
                , cancelButtonColor: '#3085d6'
                , cancelButtonText: 'Batal'
                , confirmButtonText: 'Ya, hapus!'
            , }).then((result) => {
                if (result.isConfirmed) {
                    // If confirmed, submit the form
                    form.submit();
                }
            });
        }


        @if(session('modalTambahAdmin') === 'open')
        // Open the Add Admin modal
        $(document).ready(function() {
            $('#modalTambahAdmin').modal('show');
        });
        @endif


        @if(session('modalTambahPerekam') === 'open')
        // Open the Add Admin modal
        $(document).ready(function() {
            $('#modalTambahPerekam').modal('show');
        });
        @endif


        @if(session('modalEditAdmin'))
        // Open the Add Admin modal
        $(document).ready(function() {
    $('#modalEditAdmin{{ session('modalEditAdmin') }}').modal('show');

    ganti_password({{ session('modalEditAdmin') }});
});
@endif


@if(session('modalEditPegawai'))
        // Open the Add Admin modal
        $(document).ready(function() {
    $('#modalEditPegawai{{ session('modalEditPegawai') }}').modal('show');

    ganti_password({{ session('modalEditPegawai') }});
});



@endif

    </script>




    @endsection