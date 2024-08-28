@extends('layouts.home')

@section('title')
    Regis User Lokal
@endsection

@section('body-class')
    services-details-page
@endsection


@section('main-content')
    <!-- Services Details Page Title & Breadcrumbs -->
    <div class="container-fluid background justify-content-center"></div>
    <section class="container-fluid ">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-xxl-10">
                    <div class="card border-light-subtle shadow-sm">
                        <div class="row g-0">
                            <div class="col-12 col-md-6 my-5 fade-in-left">
                                <img class="img-fluid rounded-start w-120 h-115 object-fit-cover" loading="lazy"
                                    src="/assets/Tax-amico.png" alt="Tax-amico" />
                            </div>
                            <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                                <div class="col-12 col-lg-11 col-xl-10 fade-in-right">
                                    <div class="card-body p-3 p-md-4 p-xl-5">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-5">
                                                    <div class="text-center mb-4">
                                                        <a href="landingpage.html">
                                                            <img src="/assets/logo-efaktur-remove.png" alt=""
                                                                width="150" height="auto" />
                                                        </a>
                                                    </div>
                                                    <h4 class="text-center"><strong>
                                                            Registrasi User Local</strong>
                                                    </h4>
                                                </div>
                                                <h6>Tipe User: Admin/Penandatanganan</h6>
                                            </div>
                                        </div>
                                        <form action="/auth/regis-user-lokal" method="POST"> @csrf

                                            <div class="row gy-3 overflow-hidden">
                                                <!--NPWP-->
                                                <div class="col-12">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" name="npwp" id="npwp" placeholder="NPWP" required maxlength="20">
                                                        <label for="npwp" class="form-label">NPWP</label>

                                                        {{-- Jika Ada error untuk Input NPWP --}}
                                                        @error('npwp')
                                                        <small class="text-sm text-danger">{{ $message }}</small>
                                                        @enderror

                                                    </div>
                                                </div>
                                                <script>
                                                    // Mendapatkan elemen input berdasarkan ID
                                                    var npwpInput = document.getElementById('npwp');

                                                    // Menambahkan event listener untuk memanipulasi input
                                                    npwpInput.addEventListener('input', function() {
                                                        // Menghapus karakter selain angka
                                                        var cleanedInput = this.value.replace(/\D/g, '');

                                                        // Memastikan input tidak melebihi panjang 20 karakter
                                                        if (cleanedInput.length > 20) {
                                                            cleanedInput = cleanedInput.slice(0, 20);
                                                        }

                                                        // Format NPWP dengan menambahkan tanda '-' tanpa titik di belakangnya
                                                        var formattedNPWP = cleanedInput.slice(0, 2) + '.' + cleanedInput.slice(2, 5) + '.' + cleanedInput.slice(5, 8) + '.' + cleanedInput.slice(8, 9) + '-' + cleanedInput.slice(9, 12) + '.' + cleanedInput.slice(12, 15) + cleanedInput.slice(15, 20);

                                                        // Menetapkan nilai input dengan format NPWP
                                                        this.value = formattedNPWP;
                                                    });
                                                </script>
                                                <!--Nama User-->
                                                <div class="col-12">
                                                    <div class="form-floating mb-3">
                                                        <input type="NamaUser" class="form-control @error('nama_user') is-invalid @enderror" name="nama_user"
                                                            id="NamaUser" placeholder="NamaUser" required />
                                                        <label for="NamaUser" class="form-label">Nama User</label>

                                                        {{-- Jika Ada error untuk Input Nama User --}}
                                                        @error('nama_user')
                                                        <small class="text-sm text-danger">{{ $message }}</small>
                                                        @enderror

                                                    </div>
                                                </div>
                                                <!--Nama Lengkap-->
                                                <div class="col-12">
                                                    <div class="form-floating mb-3">
                                                        <input type="NamaLengkap" class="form-control" name="nama_lengkap"
                                                            id="NamaLengkap" placeholder="NamaLengkap" required />


                                                        <label for="NamaLengkap" class="form-label">Nama Lengkap</label>
                                                    </div>
                                                </div>
                                                <!--Password-->
                                                <div class="col-12">
                                                    <div class="form-floating mb-3">
                                                        <input type="password" class="form-control" name="password"
                                                            id="password" value="" placeholder="Password" required />

                                                        <label for="password" class="form-label">Password</label>
                                                    </div>
                                                </div>
                                                <!--Ulangi Password-->
                                                <div class="col-12">
                                                    <div class="form-floating mb-3">
                                                        <input type="Password" class="form-control"
                                                            name="UlangiPassword" id="UlangiPassword" value=""
                                                            placeholder="UlangiPassword" required />

                                                        <label for="UlangiPassword" class="form-label">Ulangi
                                                            Password</label>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="d-grid">
                                                        <button class="btn btn-light btn-lg" type="submit"
                                                        style="background-color: rgba(238, 129, 78, 1); color: rgb(255, 255, 255); font-family: 'Lato', sans-serif;"
                                                        href="/auth/login/user-lokal">Daftarkan
                                                            User
                                                        </button>
                                                        <!--Setelah Daftarkan User, lalu masuk ke login Tax Invoice -->
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="row">
                                            <div class="col-10">
                                                <div
                                                    class="d-flex gap-1 gap-md-3 flex-column flex-md-row justify-content-md-center mt-1">
                                                    <h7>Sudah Punya Akun?</h7>
                                                    <a href="/auth/login/user-lokal"
                                                        class="link-secondary text-decoration-none">Login E-Tax Invoice</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
@endsection
