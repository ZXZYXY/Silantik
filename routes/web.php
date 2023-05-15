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
Route::get('/beranda', function () {
    return view('frontend.home');
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

        Route::get('/{jenis_permohonan}', [PermohonanController::class, 'index']);
        Route::get('/{jenis_permohonan}/create', [PermohonanController::class, 'create']);
        Route::get('/{jenis_permohonan}/edit/{id}', [PermohonanController::class, 'edit']);
        Route::get('/{jenis_permohonan}/detail/{id}', [PermohonanController::class, 'show']);
        Route::delete('/delete/{id}', [PermohonanController::class, 'destroy']);
    });

    Route::group(['prefix' => 'pengaduan'], function () {
        Route::get('/{jenis_pengaduan}', [PengaduanController::class, 'index']);
        Route::get('/{jenis_pengaduan}/create', [PengaduanController::class, 'create']);
        Route::get('/{jenis_pengaduan}/detail/{id}', [PengaduanController::class, 'show']);
        Route::get('/{jenis_pengaduan}/edit/{id}', [PengaduanController::class, 'edit']);
        Route::post('/store', [PengaduanController::class, 'store']);
        Route::post('/update', [PengaduanController::class, 'update']);
        Route::delete('/delete/{id}', [PengaduanController::class, 'destroy']);
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
    Route::get('/table/permohonan/{jenis}', [PermohonanController::class, 'dataTable'])->name('table.permohonan');
    //Route::get('/table/pembaharuan', [PermohonanController::class, 'dataTable_pembaharuan'])->name('table.permohonan_pembaharuan');
    Route::get('/table/opd', [OpdController::class, 'dataTable'])->name('table.opd');
    Route::get('/table/jenisaplikasi', [JenisaplikasiController::class, 'dataTable'])->name('table.jenisaplikasi');
    Route::get('/table/pengaduan/{jenis}', [PengaduanController::class, 'dataTable']);
});
