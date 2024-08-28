@extends('layouts.home')

@section('title')
    Regis User PKP
@endsection

@section('body-class')
    services-details-page
@endsection


@section('main-content')
    <!-- Services Details Page Title & Breadcrumbs -->
    <div class="container-fluid background justify-content-center"></div>
    <section class="container-fluid">
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
                                                    <h4 class="text-center">
                                                        <strong> Registrasi E-Tax Invoice</strong>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                        <form action="" method="POST"> @csrf
                                            <div class="row gy-3 overflow-hidden">
                                                <!--NPWP-->
                                                <div class="col-12">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" name="npwp"
                                                            id="npwp" placeholder="NPWP" required maxlength="20">
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
                                                        var formattedNPWP = cleanedInput.slice(0, 2) + '.' + cleanedInput.slice(2, 5) + '.' + cleanedInput
                                                            .slice(5, 8) + '.' + cleanedInput.slice(8, 9) + '-' + cleanedInput.slice(9, 12) + '.' + cleanedInput
                                                            .slice(12, 15) + cleanedInput.slice(15, 20);

                                                        // Menetapkan nilai input dengan format NPWP
                                                        this.value = formattedNPWP;
                                                    });
                                                </script>
                                                <!--Sertifikat User-->
                                                <div class="col-9">
                                                    <div class="form-floating mb-3">
                                                        <input type="SertifikatUser" class="form-control"
                                                            name="SertifikatUser" id="SertifikatUser"
                                                            placeholder="SertifikatUser" required />
                                                        <label for="SertifikatUser" class="form-label">Sertifikat
                                                            User</label>
                                                    </div>
                                                </div>
                                                <!--Open-->
                                                <div class=" col-3 py-2">
                                                    <button type="button" class="btn btn-light btn-lg"
                                                        style="background-color: rgba(238, 129, 78, 1); color: rgb(255, 255, 255); font-family: 'Lato', sans-serif;">Open</button>
                                                </div>
                                                <!--Kode Aktivasi-->
                                                <div class="col-12">
                                                    <div class="form-floating mb-3">
                                                        <input type="KodeAktivasi" class="form-control" name="KodeAktivasi"
                                                            id="KodeAktivasi" placeholder="KodeAktivasi" required />

                                                        <label for="KodeAktivasi" class="form-label">Kode Aktivasi</label>
                                                    </div>
                                                </div>
                                                <!--Password Enofa
                                                                                                        <div class="col-12">
                                                                                                            <div class="form-floating mb-3">
                                                                                                                <input type="password" class="form-control" name="password"
                                                                                                                    id="password" value="" placeholder="Password" required />

                                                                                                                <label for="password" class="form-label">Password</label>
                                                                                                            </div>
                                                                                                        </div> -->

                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="d-grid">
                                                        <button class="btn btn-light btn-lg" type="submit"
                                                            data-bs-toggle="modal" data-bs-target="#modalLoginPKP"
                                                            style="background-color: rgba(238, 129, 78, 1); color: rgb(255, 255, 255); font-family: 'Lato', sans-serif;">
                                                            Daftar Sekarang!
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- The Modal -->
                                            <!--Modal Login PKP-->
                                            <div class="modal" id="modalLoginPKP">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <img src="/assets/logo-efaktur-remove.png" alt="Logo"
                                                                class="mr-2" style="max-width: 120px; max-height: 120px;">
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                            <form class="row g-3 my-2" method="post"
                                                                action="{{ url('captcha-validation') }}">
                                                                @csrf
                                                                <div class="col-sm-12 text-center">
                                                                    <strong>
                                                                        <h4>Login User PKP</h4>
                                                                    </strong>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <div class="form-group mt-4 mb-4">
                                                                        <div class="captcha">
                                                                            <span>{!! captcha_img() !!}</span>
                                                                            <button type="button" class="btn btn-danger"
                                                                                class="reload" id="reload">
                                                                                &#x21bb;
                                                                            </button>
                                                                        </div>
                                                                        <script type="text/javascript">
                                                                            $('#reload').click(function() {
                                                                                $.ajax({
                                                                                    type: 'GET',
                                                                                    url: 'reload-captcha',
                                                                                    success: function(data) {
                                                                                        $(".captcha span").html(data.captcha);
                                                                                    }
                                                                                });
                                                                            });
                                                                        </script>
                                                                        <div class="row mb-3">
                                                                            <div class="col-sm-12">
                                                                                <input type="text" class="form-control"
                                                                                    id="#"
                                                                                    placeholder="Enter CAPTCHA">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                            <div class="col-sm-12">
                                                                                <input type="text" class="form-control"
                                                                                    id="#"
                                                                                    placeholder="Password Enofa">
                                                                            </div>
                                                                        </div>
                                                            </form>
                                                        </div>
                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <a href="{{ url('/auth/regis/user-lokal') }}" class="btn"
                                                                style="background-color: rgba(238, 129, 78, 1); color: rgb(255, 255, 255); font-family: 'Lato', sans-serif; width: 100%;">
                                                                Submit
                                                            </a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!--End Modal Content-->

                                        </form>
                                        <div class="row">
                                            <div class="col-12">
                                                <div
                                                    class="d-flex gap-1 gap-md-2 flex-column flex-md-row justify-content-md-center mt-1">
                                                    <a href="/auth/regis/user-lokal"
                                                        class="link-secondary text-decoration-none">Registrasi User
                                                        Local<a>
                                                            <a href="/auth/login/user-lokal"
                                                                class="link-secondary text-decoration-none">Login E-Tax
                                                                Invoice</a>
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
@endsection
