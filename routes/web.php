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
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SektorController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\StatuspermohonanController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\NetworkController;
use App\Models\Network;

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


Route::get('/', [FrontendController::class, 'index']);
Route::get('/tentang', [FrontendController::class, 'tentang']);
Route::get('/tanya-jawab', [FrontendController::class, 'tanya_jawab']);

//Route::get('/layanan/pembaruan-aplikasi', [FrontendController::class, 'layanan_pembaruan_aplikasi']);
Route::get('/portofolio', [FrontendController::class, 'portofolio']);
Route::get('/portofolio/detail/{id}', [FrontendController::class, 'portofolio_detail']);

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
Auth::routes(['register' => false]);
Route::get('/daftar', [DaftarController::class, 'index']);
Route::post('/daftar/store', [DaftarController::class, 'store']);
Route::get('/daftar/berhasil/{id}', [DaftarController::class, 'berhasil']);
Route::get('/reload-captcha', [DaftarController::class, 'reloadCaptcha']);

Route::get('/informasi', [FrontendController::class, 'news']);
Route::get('/news/{slug}', [FrontendController::class, 'news_detail']);

//pembuatan aplikasi

Route::get('/layanan/aplikasi', [FrontendController::class, 'layanan_aplikasi']);
Route::get('/layanan/aplikasi/cek-nip', [FrontendController::class, 'cek_nip']);
Route::post('/submit-permohonan-aplikasi', [FrontendController::class, 'create_permohonan']);
Route::get('/permohonan-aplikasi/berhasil/{id}', [FrontendController::class, 'permohonan_berhasil']);

// Cek status permohonan
Route::get('/cek-permohonan', [FrontendController::class, 'cek_permohonan'])->name('cek_permohonan');
Route::get('/cek-permohonan/status', [FrontendController::class, 'cek_permohonan_status'])->name('cek_permohonan_status');
Route::get('/hasil-permohonan/{id}', [FrontendController::class, 'hasil_permohonan'])->name('hasil_permohonan');
// pengaduan
Route::get('/pengaduan', [FrontendController::class, 'pengaduan']);
Route::post('/submit-pengaduan-aplikasi', [FrontendController::class, 'create_pengaduan']);
Route::get('/pengaduan-berhasil/{id}', [FrontendController::class, 'pengaduan_berhasil'])->name('pengaduan.berhasil');

//jaringan
Route::get('/jaringan', [FrontendController::class, 'jaringan']);
Route::get('/jaringan_form', [FrontendController::class, 'jaringan_form']);
Route::get('/jaringan_form/cek-nip', [FrontendController::class, 'cek_nip_jaringan']);
Route::post('/submit-jaringan', [FrontendController::class, 'create_jaringan']);
Route::get('/jaringan-berhasil/{id}', [FrontendController::class, 'jaringan_berhasil'])->name('jaringan.berhasil');

//table permohonan request
Route::get('/table/recent', [FrontendController::class, 'recentRequests']);

//network

// Route untuk menampilkan form tambah
Route::get('/network/create', [NetworkController::class, 'create'])->name('network.create');
// Menampilkan detail network berdasarkan uuid
Route::get('network/detail/{uuid}', [NetworkController::class, 'show'])->name('network.show');
// Route untuk menampilkan form edit
Route::get('/network/edit/{uuid}', [NetworkController::class, 'edit'])->name('network.edit');
// Route untuk memperbarui data
Route::put('/network/update/{uuid}', [NetworkController::class, 'update'])->name('network.update');
// Route untuk delete data
Route::delete('/network/destroy/{uuid}', [NetworkController::class, 'destroy'])->name('network.destroy');




// Route untuk menyimpan data yang di-submit dari form
Route::post('/network/store', [NetworkController::class, 'store'])->name('network.store');


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
    Route::resource('network', NetworkController::class);
    Route::resource('team', TeamController::class);
    Route::delete('/daftaraplikasi/delete/{id}', [DaftaraplikasiController::class, 'destroy'])->name('daftaraplikasi.destroy');


    Route::post('/upload/screenshot', [DaftaraplikasiController::class, 'upload_ss'])->name('upload.images');
    Route::post('/upload/dokumen', [DaftaraplikasiController::class, 'upload_dokumen'])->name('upload.dokumen');
    Route::delete('/file_pendukung/{id}', [DaftaraplikasiController::class, 'hapus_file_pendukung']);

    //Permohonan
    Route::group(['prefix' => 'permohonan'], function () {
        Route::get('/', [PermohonanController::class, 'index']);
        Route::post('/store', [PermohonanController::class, 'store']);
        Route::post('/update', [PermohonanController::class, 'update']);
        Route::post('/proses', [PermohonanController::class, 'proses']);

        Route::get('/{jenis_permohonan}', [PermohonanController::class, 'index']);
        Route::get('/{jenis_permohonan}/create', [PermohonanController::class, 'create']);
        Route::get('/{jenis_permohonan}/edit/{id}', [PermohonanController::class, 'edit']);
        Route::get('/{jenis_permohonan}/detail/{id}', [PermohonanController::class, 'show']);
        Route::delete('/delete/{id}', [PermohonanController::class, 'destroy']);
    });
    Route::delete('/permohonan/delete/{id}', [PermohonanController::class, 'destroy'])->name('permohonan.destroy');
    


    //Pengaduan
    Route::group(['prefix' => 'pengaduan'], function () {
        Route::get('/{jenis_pengaduan}', [PengaduanController::class, 'index']);
        Route::get('/{jenis_pengaduan}/create', [PengaduanController::class, 'create']);
        Route::get('/{jenis_pengaduan}/detail/{id}', [PengaduanController::class, 'show']);
        Route::get('/{jenis_pengaduan}/edit/{id}', [PengaduanController::class, 'edit']);
        Route::post('/store', [PengaduanController::class, 'store']);
        Route::post('/update', [PengaduanController::class, 'update']);
        Route::delete('/delete/{id}', [PengaduanController::class, 'destroy']);
    });
    Route::delete('/pengaduan/delete/{id}', [PengaduanController::class, 'destroy'])->name('pengaduan.destroy');


    //Setting
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
        Route::resource('kategori', KategoriController::class);
        Route::resource('sektor', SektorController::class);
        Route::resource('jabatan', JabatanController::class);
        Route::resource('statuspermohonan', StatuspermohonanController::class);
    });

    //FAQ
    Route::group(['prefix' => 'faq'], function () {
        Route::get('/', [FaqController::class, 'index']);
        Route::post('/tambah', [FaqController::class, 'store']);
        Route::get('/table', [FaqController::class, 'dataTable'])->name('table.faq');
        Route::get('/{id}/delete', [FaqController::class, 'delete']);
        Route::get('/{id}/edit', [FaqController::class, 'edit']);
        Route::post('/{id}/update', [FaqController::class, 'update']);
    });

    //Tabel
    Route::group(['prefix' => 'table'], function () {
        Route::get('/user', [UserController::class, 'dataTable'])->name('table.user');
        Route::get('/role', [RoleController::class, 'dataTable'])->name('table.role');
        Route::get('/permission', [PermissionController::class, 'dataTable'])->name('table.permission');
        Route::get('/berita', [BeritaController::class, 'dataTable'])->name('table.berita');
        Route::get('/daftaraplikasi', [DaftaraplikasiController::class, 'dataTable'])->name('table.daftaraplikasi');
        Route::get('/permohonan', [PermohonanController::class, 'dataTable'])->name('table.permohonan');
        Route::get('/opd', [OpdController::class, 'dataTable'])->name('table.opd');
        Route::get('/jenisaplikasi', [JenisaplikasiController::class, 'dataTable'])->name('table.jenisaplikasi');
        Route::get('/pengaduan/{jenis}', [PengaduanController::class, 'dataTable']);
        Route::get('/kategori', [KategoriController::class, 'dataTable'])->name('table.kategori');
        Route::get('/sektor', [SektorController::class, 'dataTable'])->name('table.sektor');
        Route::get('/team', [TeamController::class, 'dataTable'])->name('table.team');
        Route::get('/jabatan', [JabatanController::class, 'dataTable'])->name('table.jabatan');
        Route::get('/statuspermohonan', [StatuspermohonanController::class, 'dataTable'])->name('table.statuspermohonan');
        Route::get('/network', [NetworkController::class, 'dataTable'])->name('table.network');
    });

    Route::get('/screenshoot/{nama}', [DaftaraplikasiController::class, 'ss_aplikasi']);
    Route::get('/dokumen/{nama}', [DaftaraplikasiController::class, 'dokumen_aplikasi']);
});

