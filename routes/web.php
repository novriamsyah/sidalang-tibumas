<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/temp', function () {
//     return view('template.master');
// });

// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/tes', function () {
    return view('dash.test');
});

//sistem login
Route::get('/login', [App\Http\Controllers\SistemLoginController::class, 'login'])->name('login');
Route::post('/login_verifikasi', [App\Http\Controllers\SistemLoginController::class, 'verifikasiLogin'])->name('login.verifikasi');
Route::get('/logout', [App\Http\Controllers\SistemLoginController::class, 'logout'])->name('logout');

//forgot password
Route::get('/forget-password', [App\Http\Controllers\ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('/proses-forget-password', [App\Http\Controllers\ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('/reset-password/{token}', [App\Http\Controllers\ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('/reset-password', [App\Http\Controllers\ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');


//================================= Akeses super_admin ======================================
Route::group(['middleware' => ['auth', 'cekrole:super_admin']], function(){

    //user
    Route::get('/halaman_user', [App\Http\Controllers\halamanUserController::class, 'halaman_user']);
    Route::get('/halaman_tambah_user', [App\Http\Controllers\halamanUserController::class, 'halaman_tambah_user']);
    Route::post('/simpan_user', [App\Http\Controllers\halamanUserController::class, 'simpan_user']);
    Route::get('/edit_user/{id}', [App\Http\Controllers\halamanUserController::class, 'edit_user']);
    Route::post('/ubah_user/{id}', [App\Http\Controllers\halamanUserController::class, 'ubah_user']);
    Route::post('/hapus_user/{id}', [App\Http\Controllers\halamanUserController::class, 'hapus_user']);

});

//================================= Akeses super_admin ======================================
Route::group(['middleware' => ['auth', 'cekrole:super_admin,kepala,anggota']], function(){

    //halaman dashboard
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    //halaman Pelanggaran
    Route::get('/form_tindak_pelanggaran', [App\Http\Controllers\DashboardController::class, 'formPelanggaran']);
    Route::get('/tindak_pelanggaran', [App\Http\Controllers\DashboardController::class, 'tndk_pelanggaran']);
    Route::post('/proses_tindak_pelanggaran', [App\Http\Controllers\DashboardController::class, 'proses_tindak_pelanggaran']);
    Route::get('/edit_tindak_pelangggaran/{id}', [App\Http\Controllers\DashboardController::class, 'edit_tindak_pelangggaran']);
    Route::post('/ubah_tindak_pelangggaran/{id}', [App\Http\Controllers\DashboardController::class, 'ubah_tindak_pelangggaran']);
    Route::get('/pdf_tindak_pelangggaran/{id}', [App\Http\Controllers\DashboardController::class, 'pdf_tindak_pelangggaran']);
    Route::get('/unduh_pdf_tindak_pelangggaran/{id}', [App\Http\Controllers\DashboardController::class, 'unduh_pelangggaran']);
    Route::post('/hapus_tindak_pelangggaran/{id}', [App\Http\Controllers\DashboardController::class, 'hapus_tindak_pelangggaran']);
    Route::post('/getkelurahan', [App\Http\Controllers\DashboardController::class, 'getkelurahan'])->name('getkelurahan');


    //halaman kegiatan
    Route::get('/upload_kegiatan', [App\Http\Controllers\DashboardController::class, 'upload_kegiatan']);
    Route::get('/laporan_kegiatan', [App\Http\Controllers\DashboardController::class, 'laporan_kegiatan']);
    Route::post('/simpan_laporan', [App\Http\Controllers\DashboardController::class, 'simpan_laporan']);
    Route::get('/edit_laporan_kegiatan/{id}', [App\Http\Controllers\DashboardController::class, 'edit_laporan_kegiatan']);
    Route::post('/ubah_laporan_kegiatan/{id}', [App\Http\Controllers\DashboardController::class, 'ubah_laporan_kegiatan']);
    Route::post('/hapus_laporan_kegiatan/{id}', [App\Http\Controllers\DashboardController::class, 'hapus_laporan_kegiatan']);
    Route::get('/lihat_dokumen/{id}', [App\Http\Controllers\DashboardController::class, 'lihat_dokumen']);
    Route::get('/unduh_laporan_kegiatan/{id}', [App\Http\Controllers\DashboardController::class, 'unduh_laporan_kegiatan']);

    //user
    Route::get('/halaman_user', [App\Http\Controllers\halamanUserController::class, 'halaman_user']);
    Route::get('/halaman_tambah_user', [App\Http\Controllers\halamanUserController::class, 'halaman_tambah_user']);
    Route::post('/simpan_user', [App\Http\Controllers\halamanUserController::class, 'simpan_user']);
    Route::get('/edit_user/{id}', [App\Http\Controllers\halamanUserController::class, 'edit_user']);
    Route::post('/ubah_user/{id}', [App\Http\Controllers\halamanUserController::class, 'ubah_user']);
    Route::post('/hapus_user/{id}', [App\Http\Controllers\halamanUserController::class, 'hapus_user']);

    //kelola profil
    Route::get('/kelola_profil', [App\Http\Controllers\halamanUserController::class, 'kelola_profil']);
    Route::post('/update_profil', [App\Http\Controllers\halamanUserController::class, 'update_profil']);
    Route::post('/ubah_password/{id}', [App\Http\Controllers\halamanUserController::class, 'ubah_password']);
    
});