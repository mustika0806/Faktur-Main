<?php

use App\Models\ProfilPkp;
use App\Models\PajakKeluaran;
use App\Models\LawanTransaksi;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfilPkpController;
use App\Http\Controllers\BarangJasaController;
use App\Http\Controllers\LawanTransaksiController;
use App\Http\Controllers\AdministrasiUserController;
use App\Http\Controllers\PajakMasukanController;
use App\Http\Controllers\PajakKeluaranController;
use App\Http\Controllers\ReturPajakMasukanController;
use App\Http\Controllers\ReturPajakKeluaranController;
use App\Http\Controllers\RefrensiNomorFakturController;
use App\Http\Controllers\CaptchaServiceController;
use App\Http\Controllers\DetailPenyerahanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [HomeController::class, 'home'])->name('WelcomePage');

Route::get('/auth/login/user-lokal', function() {
    return view('auth.login-user-lokal');
});

Route::get('/auth/login/user-pkp', function() {
    return view('auth/login-user-pkp');
});

Route::get('/auth/regis/user-lokal', function() {
    return view('auth/regis-user-lokal');
});

Route::get('/auth/regis/user-pkp', function() {
    return view('auth/regis-user-pkp');
});

Route::get('/login-user', [LoginController::class, 'login_user']);
Route::POST('/login-user-proses', [LoginController::class, 'login_user_proses'])->name('login_user_proses');

Route::POST('/auth/regis-user-lokal', [ UserController::class, 'regis' ]);
Route::POST('/proses-register', [ AdminController::class, 'regis' ]);

Route::POST('/auth/logout', [ UserController::class, 'logout' ])->name('logout');

Route::POST('', [AdminController::class, '' ]);

//Dashboard
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('DashboardAdmin');
//Lawan Transaksi
Route::get('/admin/lawan-transaksi', [ LawanTransaksiController::class, 'index']);
Route::POST('/admin/lawan-transaksi/add-lawan-transaksi', [ LawanTransaksiController::class, 'addLawanTrans'])->name('AddLawanTrans');
Route::delete('admin/lawan-transaksi/{npwp_lawan}', [LawanTransaksiController::class, 'delete'])->name('lawan-transaksi.delete');
Route::get('admin/lawan-transaksi/edit/{npwp_lawan}', [LawanTransaksiController::class, 'edit'])->name('lawan-transaksi.edit');
Route::put('admin/lawan-transaksi/update/{npwp_lawan}', [LawanTransaksiController::class, 'update'])->name('lawan-transaksi.update');
//Barang Jasa
Route::get('/admin/barang-jasa', [ BarangJasaController::class, 'index']);
Route::POST('/admin/barang-jasa/addBarangJasa', [ BarangJasaController::class, 'addBarangJasa'])->name('barang-jasa.add');
Route::delete('admin/barang-jasa/{kode_brg_jasa}', [BarangJasaController::class, 'delete'])->name('barang-jasa.delete');
Route::get('admin/barang-jasa/edit/{kode_brg_jasa}', [BarangJasaController::class, 'edit'])->name('barang-jasa.edit');
Route::put('admin/barang-jasa/update/{kode_brg_jasa}', [BarangJasaController::class, 'update'])->name('barang-jasa.update');
//Refrensi Nomor Faktur
Route::get('/admin/refrensi-nomor-faktur', [ RefrensiNomorFakturController::class, 'index']);
Route::POST('/admin/refrensi-nomor-faktur/add-refrensi-nomor-faktur', [ RefrensiNomorFakturController::class, 'addRefrensiNomorFaktur'])->name('AddRefrensiNomorFaktur');
Route::delete('admin/refrensi-nomor-faktur/{id}', [RefrensiNomorFakturController::class, 'delete'])->name('refrensi-nomor-faktur.delete');
//Administrasi User
Route::get('/admin/administrasi-user', [ AdministrasiUserController::class, 'index']);
Route::POST('/admin/administrasi-user/add-admin', [ AdministrasiUserController::class, 'addAdmin'])->name('AddAdmin');
Route::POST('/admin/administrasi-user/add-perekam', [ AdministrasiUserController::class, 'addPerekam'])->name('AddPerekam');
Route::get('admin/administrasi-user/edit/{id}', [AdministrasiUserController::class, 'edit'])->name('administrasi-user.edit');

Route::put('admin/administrasi-user/update-admin/{id}', [AdministrasiUserController::class, 'updateAdmin'])->name('UpdateAdmin');
Route::put('admin/administrasi-user/update-pegawai/{id}', [AdministrasiUserController::class, 'updatePegawai'])->name('UpdatePegawai');
// Route::put('admin/administrasi-user/update/{id}', [AdministrasiUserController::class, 'update'])->name('UpdatePegawai');
Route::delete('admin/administrasi-user/{id}', [AdministrasiUserController::class, 'delete'])->name('administrasi-user.delete');
//Pajak keluaran
Route::get('/admin/pajak-keluaran', [ PajakKeluaranController::class, 'index']);
Route::POST('/admin/pajak-keluaran/add-pajak-keluaran/', [ PajakKeluaranController::class, 'addPajakKeluaran'])->name('AddPajakKeluaran');
Route::delete('admin/pajak-keluaran/{id_pajak_keluaran}', [PajakKeluaranController::class, 'delete'])->name('pajak-keluaran.delete');
Route::get('admin/pajak-keluaran/edit/{id_pajak_keluaran}', [PajakKeluaranController::class, 'edit'])->name('pajak-keluaran.edit');
Route::put('admin/pajak-keluaran/update/{id_pajak_keluaran}', [PajakKeluaranController::class, 'update'])->name('pajak-keluaran.update');
//Detail Penyerahan Keluaran
Route::POST('/admin/pajak-keluaran/add-detail-penyerahan/', [ DetailPenyerahanController::class, 'addDetailPenyerahan'])->name('AddDetailPenyerahan');
Route::get('admin/pajak-keluaran/edit/{id}', [DetailPenyerahanController::class, 'edit'])->name('detail-penyerahan.edit');
Route::put('admin/pajak-keluaran/update/{id}', [DetailPenyerahanController::class, 'update'])->name('detail-penyerahan.update');
//Route::delete('admin/pajak-keluaran/{kode_brg}', [DetailPenyerahanController::class, 'delete'])->name('detail-penyerahan.delete');
//Pajak Masukan
Route::get('/admin/pajak-masukan', [ PajakMasukanController::class, 'index']);
Route::delete('admin/pajak-masukan/{no_faktur}', [PajakMasukanController::class, 'delete'])->name('pajak-masukan.delete');
Route::get('admin/pajak-masukan/edit/{no_faktur}', [PajakMasukanController::class, 'edit'])->name('pajak-masukan.edit');
Route::put('admin/pajak-masukan/update/{no_faktur}', [PajakMasukanController::class, 'update'])->name('pajak-masukan.update');
//Retur Pajak Keluaran
Route::get('/admin/retur-pajak-keluaran', [ ReturPajakKeluaranController::class, 'index']);
Route::delete('admin/retur-pajak-keluaran/{no_dokumen_retur}', [ReturPajakKeluaranController::class, 'delete'])->name('retur-pajak-keluaran.delete');
Route::get('admin/retur-pajak-keluaran/edit/{no_dokumen_retur}', [ReturPajakKeluaranController::class, 'edit'])->name('retur-pajak-keluaran.edit');
Route::put('admin/retur-pajak-keluaran/update/{no_dokumen_retur}', [ReturPajakKeluaranController::class, 'update'])->name('retur-pajak-keluaran.update');
//Retur Pajak Masukan
Route::get('/admin/retur-pajak-masukan', [ ReturPajakMasukanController::class, 'index']);
Route::delete('admin/retur-pajak-masukan/{no_dokumen_retur}', [ReturPajakMasukanController::class, 'delete'])->name('retur-pajak-masukan.delete');
Route::get('admin/retur-pajak-masukan/edit/{no_dokumen_retur}', [ReturPajakMasukanController::class, 'edit'])->name('retur-pajak-masukan.edit');
Route::put('admin/retur-pajak-masukan/update/{no_dokumen_retur}', [ReturPajakMasukanController::class, 'update'])->name('retur-pajak-masukan.update');
//Profil PKP
Route::get('/admin/profil-pkp', [ ProfilPkpController::class, 'index']);
Route::POST('/admin/profil-pkp/add-profil-pkp', [ ProfilPkpController::class, 'addProfilPkp'])->name('AddProfilPkp');
// Route Sementara Untuk Frontend
Route::get('/admin/administrasi-db', [AdminController::class, 'db']);
Route::get('/admin/upload-faktur-retur', [AdminController::class, 'uploadfaktur']);


// captcha maker

//Route::get('/admin/', [CaptchaServiceController::class, 'index']);
Route::post('/captcha-validation', [CaptchaServiceController::class, 'capthcaFormValidate']);
Route::get('/reload-captcha', [CaptchaServiceController::class, 'reloadCaptcha']);
