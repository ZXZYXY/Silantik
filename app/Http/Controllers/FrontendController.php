<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Daftaraplikasi;
use App\Models\Faq;
use App\Models\Jenisaplikasi;
use App\Models\Kategori;
use App\Models\Opd;
use App\Models\Permohonan;
use Illuminate\Http\Request;
use DB;

class FrontendController extends Controller
{
    public function index()
    {
        $berita = Berita::with('kategori')->orderBy('id', 'desc')->limit(3)->get();
        $portofolio = Daftaraplikasi::orderBy('id', 'desc')->limit(3)->get();
        return view('frontend.home', compact('berita', 'portofolio'));
    }

    public function tentang()
    {
        return view('frontend.tentang');
    }

    public function tanya_jawab()
    {
        $faq = Faq::where('publish', '1')->orderBy('urutan', 'asc')->get();
        return view('frontend.tanya_jawab', compact('faq'));
    }

    public function layanan_aplikasi()
    {
        return view('frontend.layanan_aplikasi');
    }

    public function layanan_pembaruan_aplikasi()
    {
        return view('frontend.layanan_pembaruan_aplikasi');
    }

    public function portofolio()
    {
        return view('frontend.portofolio');
    }

    public function portofolio_detail($id)
    {
        $data = Daftaraplikasi::where('id', $id)->orderBy('id', 'desc')->first();
        return view('frontend.portofolio_detail', compact('data'));
    }

    public function news()
    {
        $beritas = Berita::with('kategori')->orderBy('id', 'desc')->paginate(2);
        return view('frontend.berita', compact('beritas'));
    }

    public function news_detail($slug)
    {
        $berita = Berita::where('slug', $slug)->first();
        $kategori = Kategori::all();
        $recent_news = Berita::with('kategori')->whereNotIn('slug', [$berita->slug])->orderBy('id', 'desc')->limit(5)->get();
        return view('frontend.berita_detail', compact('berita', 'kategori', 'recent_news'));
    }

    public function cek_nip(Request $request)
    {
        $nip = $request->nip;

        $getNIP = searchNip($nip);
        $jenisaplikasi = Jenisaplikasi::all();

        $opd = Opd::all();
        if ($getNIP->error == "true") {
            return redirect()->back()->with('gagal', 'NIP tidak Ditemukan');
        } else {
            return view('frontend.layanan.aplikasi', compact('getNIP', 'jenisaplikasi', 'opd'));
        }
    }

    public function create_permohonan(Request $request)
    {

        //dd($surat->getClientOriginalExtension());
        $this->validate(
            $request,
            [
                'no_hp'             => 'required',
                'opd_id'            => 'required',
                'jenis_permohonan'  => 'required',
                'nama_aplikasi'     => 'required',
                'jenis_aplikasi'    => 'required',
                'deskripsi'         => 'required',
                'file_surat'        => 'mimes:pdf|max:5048'
            ],

            [
                'no_hp.required'                => ':attribute harus diisi.',
                'opd_id.required'               => ':attribute harus diisi.',
                'jenis_permohonan.required'     => ':attribute harus diisi.',
                'nama_aplikasi.required'        => ':attribute harus diisi.',
                'jenis_aplikasi.required'       => ':attribute harus diisi.',
                'deskripsi.required'            => ':attribute harus diisi.',
                'file_surat.mimes'              => ':attribute harus format pdf.',
                'file_surat.max'                => ':attribute harus berukuran kurang dari :max kb',
            ],

            [
                'no_hp'                         => 'Nomor WA',
                'opd_id'                        => 'OPD',
                'jenis_permohonan'              => 'Jenis Permohonan',
                'nama_aplikasi'                 => 'Nama Aplikasi',
                'jenis_aplikasi'                => 'Jenis Aplikasi',
                'deskripsi'                     => 'Deskripsi',
                'file_surat'                    => 'Surat Permohonan',

            ]
        );

        $opd = Opd::where('id', $request->opd_id)->first();
        DB::beginTransaction();
        try {
            $data = new Permohonan();
            $data->kd_permohonan      = time();
            $data->tanggal            = date('Y-m-d');
            $data->nip                = $request->nip;
            $data->nama               = $request->nama;
            $data->jabatan            = $request->jabatan;
            $data->opd_id             = $request->opd_id;
            $data->nama_opd           = $opd->nama_opd;
            $data->jenis_permohonan   = $request->jenis_permohonan;
            $data->nama_aplikasi      = $request->nama_aplikasi;
            $data->jenis_aplikasi     = $request->jenis_aplikasi;
            $data->deskripsi          = $request->deskripsi;
            if ($request->hasFile('file_surat')) {

                $surat = $request->file('file_surat');
                if ($surat->getClientOriginalExtension() == "pdf") {
                    $filename = kode_acak(7) . '.' . $surat->getClientOriginalExtension();
                    $surat->move(public_path() . '/storage/file_surat/', $filename);
                    $data->file_surat = $filename;
                } else {
                    return redirect()->back()->with('gagal', 'File Upload Harus Format PDF');
                }
            }
            $data->save();


            $url_cek = url('/cek-permohonan');
            $pesan = "Salam, Bapak/Ibu *$request->nama*\n\nAnda Telah Melakukan Permohonan $request->jenis_permohonan di Website SILANTIK. \n\nNomor Permohonan Anda: *$data->kd_permohonan*\n\nAnda bisa mengecek status progres Permohonan anda melalui link: $url_cek\n\n\n Terima Kasih.";
            //sendNotifWA($pesan, $request->no_hp);
            DB::commit();
            return redirect('/permohonan-aplikasi/berhasil/' . $data->uuid)->with('success', 'Data Berhasil Ditambah');
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            return redirect()->back()->with('gagal', 'Data Gagal Diinput');
        }
    }

    public function permohonan_berhasil($id)
    {
        $permohonan = Permohonan::where('uuid', $id)->first();

        return view('frontend.layanan.permohonan_berhasil', compact('permohonan'));
    }
}
