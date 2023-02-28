<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konfigurasiweb;
use DB;
use File;
use Intervention\Image\ImageManagerStatic as Image;

class KonfigurasiwebController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $conf = Konfigurasiweb::where('id', 1)->first();
        return view('setting.konfigurasi.index', compact('conf'));
    }

    public function submit(Request $request)
    {
        $konfigurasi = Konfigurasiweb::where('id', $request->id)->first();

        DB::beginTransaction();
        try {
            $konfigurasi->nama_aplikasi        = $request->nama_aplikasi;
            $konfigurasi->singkatan            = $request->singkatan;
            $konfigurasi->keterangan_aplikasi  = $request->keterangan_aplikasi;
            $konfigurasi->slogan               = $request->slogan;
            $konfigurasi->meta_deskripsi       = $request->meta_deskripsi;
            $konfigurasi->warna_template       = $request->warna_template;
            $konfigurasi->tahun_pembuatan      = $request->tahun_pembuatan;
            $konfigurasi->versi                = $request->versi;
            $konfigurasi->no_telp              = $request->no_telp;
            $konfigurasi->meta_keyword         = $request->meta_keyword;
            $konfigurasi->youtube              = $request->youtube;
            $konfigurasi->instagram            = $request->instagram;
            $konfigurasi->facebook             = $request->facebook;
            $konfigurasi->email                = $request->email;
            $konfigurasi->alamat               = $request->alamat;
            $konfigurasi->warna_template       = $request->warna_template;
            $konfigurasi->mode                 = $request->mode;
            $konfigurasi->sidebar_color        = $request->sidebar_color;
            $konfigurasi->navbar_color         = $request->navbar_color;
            $konfigurasi->brandlogo_color      = $request->brandlogo_color;
            $konfigurasi->save();

            DB::commit();
            return redirect()->back()->with('success', 'Data Berhasil disimpan');
        } catch (\Exception $e) {
            DB::rollback();
            //dd($e);
            return redirect()->back()->with('gagal', 'Data Gagal Diinput');
        }
    }

    public function logo_aplikasi(Request $request)
    {

        $this->validate($request, [
            'logo_aplikasi' => 'image|mimes:jpeg,png,jpg,gif|max:5048'
        ]);

        $konfigurasi = Konfigurasiweb::where('id', $request->id)->first();

        $foto = $request->file('logo_aplikasi');
        $image_name1 = time() . '_' . kode_acak(5) . '.' . $foto->getClientOriginalExtension();
        if ($konfigurasi->logo_aplikasi != "") {
            File::delete('images/' . $konfigurasi->logo_aplikasi);
        }

        $image_resize = Image::make($foto->getRealPath());
        $image_resize->resize(1000, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image_resize->save(public_path('images/' . $image_name1));

        DB::beginTransaction();
        try {

            $konfigurasi->logo_aplikasi       = $image_name1;
            $konfigurasi->save();

            DB::commit();
            return redirect()->back()->with('success', 'Data Berhasil Di Update');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('gagal', 'Data Gagal Diinput');
        }
    }

    public function favicon(Request $request)
    {

        $this->validate($request, [
            'favicon' => 'image|mimes:jpeg,png,jpg,gif|max:5048'
        ]);

        $konfigurasi = Konfigurasiweb::where('id', $request->id)->first();

        $foto = $request->file('favicon');
        $image_name1 = time() . '_' . kode_acak(5) . '.' . $foto->getClientOriginalExtension();
        if ($konfigurasi->favicon != "") {
            File::delete('images/' . $konfigurasi->favicon);
        }

        $image_resize = Image::make($foto->getRealPath());
        $image_resize->resize(500, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image_resize->save(public_path('images/' . $image_name1));

        DB::beginTransaction();
        try {

            $konfigurasi->favicon       = $image_name1;
            $konfigurasi->save();

            DB::commit();
            return redirect()->back()->with('success', 'Data Berhasil Di Update');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('gagal', 'Data Gagal Diinput');
        }
    }

    public function logo_kecil(Request $request)
    {

        $this->validate($request, [
            'logo_kecil' => 'image|mimes:jpeg,png,jpg,gif|max:5048'
        ]);

        $konfigurasi = Konfigurasiweb::where('id', $request->id)->first();

        $foto = $request->file('logo_kecil');
        $image_name1 = time() . '_' . kode_acak(5) . '.' . $foto->getClientOriginalExtension();
        if ($konfigurasi->logo_kecil != "") {
            File::delete('images/' . $konfigurasi->logo_kecil);
        }

        $image_resize = Image::make($foto->getRealPath());
        $image_resize->resize(500, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image_resize->save(public_path('images/' . $image_name1));

        DB::beginTransaction();
        try {

            $konfigurasi->logo_kecil       = $image_name1;
            $konfigurasi->save();

            DB::commit();
            return redirect()->back()->with('success', 'Data Berhasil Di Update');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('gagal', 'Data Gagal Diinput');
        }
    }

    public function gambar_sidebar(Request $request)
    {

        $this->validate($request, [
            'gambar_sidebar' => 'image|mimes:jpeg,png,jpg,gif|max:5048'
        ]);

        $konfigurasi = Konfigurasiweb::where('id', $request->id)->first();

        $foto = $request->file('gambar_sidebar');
        $image_name1 = time() . '_' . kode_acak(5) . '.' . $foto->getClientOriginalExtension();
        if ($konfigurasi->gambar_sidebar != "") {
            File::delete('images/' . $konfigurasi->gambar_sidebar);
        }

        $image_resize = Image::make($foto->getRealPath());
        $image_resize->save(public_path('images/' . $image_name1));

        DB::beginTransaction();
        try {

            $konfigurasi->gambar_sidebar       = $image_name1;
            $konfigurasi->save();

            DB::commit();
            return redirect()->back()->with('success', 'Data Berhasil Di Update');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('gagal', 'Data Gagal Diinput');
        }
    }
}
