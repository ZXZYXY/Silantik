<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\KonfigurasiwebController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DaftaraplikasiController;
use App\Http\Controllers\PermohonanController;
use App\Http\Controllers\OpdController;
use App\Http\Controllers\JenisaplikasiController;
use App\Http\Controllers\PengaduanController;


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

Route::get('/', function () {
    return view('auth.login');
});
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
Auth::routes();

Route::group(['middleware' => ['auth', 'CheckActive']], function () {
    Route::get('/changeStatus', [UserController::class, 'changeStatus']);
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    //Profil
    Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
    Route::post('/profil/{id}/update', [ProfilController::class, 'update_profil']);
    Route::post('/profil/ganti_password', [ProfilController::class, 'ganti_password_profil']);

    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('berita', BeritaController::class);
    Route::resource('daftaraplikasi', DaftaraplikasiController::class);

    //Permohonan
    Route::group(['prefix' => 'permohonan'], function () {
        Route::post('/store', [PermohonanController::class, 'store']);
        Route::post('/update', [PermohonanController::class, 'update']);

        //pembuatan
        Route::get('/pembuatan', [PermohonanController::class, 'pembuatan']);
        Route::get('/pembuatan/create', [PermohonanController::class, 'create_pembuatan']);
        Route::get('/pembuatan/edit/{id}', [PermohonanController::class, 'edit_pembuatan']);
        Route::get('/pembuatan/detail/{id}', [PermohonanController::class, 'show_pembuatan']);
        Route::delete('/pembuatan/delete/{id}', [PermohonanController::class, 'destroy_pembuatan']);

        //pembaharuan
        Route::get('/pembaharuan', [PermohonanController::class, 'pembaharuan']);
        Route::get('/pembaharuan/create', [PermohonanController::class, 'create_pembaharuan']);
        Route::get('/pembaharuan/edit/{id}', [PermohonanController::class, 'edit_pembaharuan']);
        Route::get('/pembaharuan/detail/{id}', [PermohonanController::class, 'show_pembaharuan']);
        Route::delete('/pembaharuan/delete/{id}', [PermohonanController::class, 'destroy_pembaharuan']);
    });

    Route::group(['prefix' => 'pengaduan'], function () {
        Route::get('/{jenis_pengaduan}', [PengaduanController::class, 'index']);
        Route::get('/{jenis_pengaduan}/create', [PengaduanController::class, 'create']);
        Route::post('/store', [PengaduanController::class, 'store']);
    });

    Route::group(['prefix' => 'setting'], function () {
        Route::resource('roles', RoleController::class);
        Route::resource('permission', PermissionController::class);

        //Konfigurasi
        Route::get('/konfigurasi-web', [KonfigurasiwebController::class, 'index']);
        Route::post('/konfigurasi/submit', [KonfigurasiwebController::class, 'submit']);
        Route::post('/konfigurasi/logo_aplikasi', [KonfigurasiwebController::class, 'logo_aplikasi']);
        Route::post('/konfigurasi/favicon', [KonfigurasiwebController::class, 'favicon']);
        Route::post('/konfigurasi/logo_kecil', [KonfigurasiwebController::class, 'logo_kecil']);
        Route::post('/konfigurasi/gambar_sidebar', [KonfigurasiwebController::class, 'gambar_sidebar']);
    });

    //Data Master
    Route::group(['prefix' => 'data-master'], function () {
        Route::resource('opd', OpdController::class);
        Route::resource('jenisaplikasi', JenisaplikasiController::class);
    });

    //Tabel
    Route::get('/table/user', [UserController::class, 'dataTable'])->name('table.user');
    Route::get('/table/role', [RoleController::class, 'dataTable'])->name('table.role');
    Route::get('/table/permission', [PermissionController::class, 'dataTable'])->name('table.permission');
    Route::get('/table/berita', [BeritaController::class, 'dataTable'])->name('table.berita');
    Route::get('/table/daftaraplikasi', [DaftaraplikasiController::class, 'dataTable'])->name('table.daftaraplikasi');
    Route::get('/table/pembuatan', [PermohonanController::class, 'dataTable_pembuatan'])->name('table.permohonan_pembuatan');
    Route::get('/table/pembaharuan', [PermohonanController::class, 'dataTable_pembaharuan'])->name('table.permohonan_pembaharuan');
    Route::get('/table/opd', [OpdController::class, 'dataTable'])->name('table.opd');
    Route::get('/table/jenisaplikasi', [JenisaplikasiController::class, 'dataTable'])->name('table.jenisaplikasi');
    Route::get('/table/pengaduan/{jenis}', [PengaduanController::class, 'dataTable']);
});
