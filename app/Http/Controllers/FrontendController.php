<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Daftaraplikasi;
use App\Models\Faq;
use App\Models\Jenisaplikasi;
use App\Models\Kategori;
use App\Models\Opd;
use App\Models\Permohonan;
use App\Models\Network;
use App\Models\Historipermohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Foto_pengaduan;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\DB; // Tambahkan ini
use Illuminate\Support\Str; // Tambahkan ini jika menggunakan Str::uuid()


class FrontendController extends Controller
{
    public function index()
    {
        $berita = Berita::with('kategori')->orderBy('id', 'desc')->limit(3)->get();
        $portofolio = Daftaraplikasi::orderBy('id', 'desc')->limit(3)->get();
        $faq = Faq::where('publish', '1')->orderBy('urutan', 'asc')->limit(3)->get();
        return view('frontend.home', compact('berita', 'portofolio', 'faq'));
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
        $beritas = Berita::with('kategori')->orderBy('id', 'desc')->paginate(3);
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

        if ($getNIP === null || $getNIP->error == "true") {
            return redirect()->back()->with('gagal', 'NIP tidak Ditemukan');
        } else {
            return view('frontend.layanan.aplikasi', compact('getNIP', 'jenisaplikasi', 'opd'));
        }
    }


    public function create_permohonan(Request $request)
    {
        // Validasi input
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
            $data->no_hp              = $request->no_hp;
            $data->no_urut            = $this->generateNoUrut(); 

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

            // Simpan data ke tabel histori_permohonan
            $historiPermohonan = new Historipermohonan();
            $historiPermohonan->permohonan_id = $data->id;
            $historiPermohonan->status = 'Pending';
            $historiPermohonan->keterangan_status = 'Permohonan baru telah diajukan';
            
            $historiPermohonan->save();
            

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

    protected function generateNoUrut()
    {
        
        $lastPermohonan = Permohonan::orderBy('no_urut', 'desc')->first();
        return $lastPermohonan ? $lastPermohonan->no_urut + 1 : 1;
    }

    public function permohonan_berhasil($id)
    {
        $permohonan = Permohonan::where('uuid', $id)->first();

        return view('frontend.layanan.permohonan_berhasil', compact('permohonan'));
    }
    
    // Method untuk menampilkan halaman cek permohonan
    public function cek_permohonan()
    {
        return view('frontend.cek_permohonan');
    }

    // Method untuk menangani pencarian status permohonan
    public function cek_permohonan_status(Request $request)
    {
        $kd_permohonan = $request->input('kd_permohonan');
        $permohonan = Permohonan::where('kd_permohonan', $kd_permohonan)->first();

        if ($permohonan) {
            return view('frontend.cek_permohonan', compact('permohonan'));
        } else {
            return redirect()->back()->with('error', 'Permohonan tidak ditemukan.');
        }
    }
    
    public function hasil_permohonan($id)
    {
        $permohonan = Permohonan::findOrFail($id);

        return view('frontend.hasil_permohonan', compact('permohonan'));
    }
    public function pengaduan()
    {
       
        return view('frontend.pengaduan'); 
    }
    public function jaringan()
    {
       
        return view('frontend.jaringan'); 
    }

    public function create_pengaduan(Request $request)
{
    $this->validate($request, [
        'judul' => 'required',
        'isi' => 'required',
        'jenis_pengaduan' => 'required',
        'nama_aplikasi' => 'required',
        'no_wa' => 'required',
        'foto_pengaduan.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    DB::beginTransaction();
    try {
        $data = new Pengaduan();
        $data->kd_pengaduan = time();

        // Jika pengguna terautentikasi, simpan opd_id dan pelapor_id
        if (auth()->check()) {
            $data->opd_id = auth()->user()->opd_id;
            $data->pelapor_id = auth()->user()->id;
        }

        // Data lain yang diperlukan
        $data->jenis_pengaduan = $request->jenis_pengaduan;
        $data->nama_aplikasi = $request->nama_aplikasi;
        $data->judul = $request->judul;
        $data->isi = $request->isi;
        $data->no_wa = $request->no_wa;
        $data->tanggal = date('Y-m-d');
        $data->save();

        // Masukan Foto
        $foto_pengaduan = $request->file('foto_pengaduan');
        if ($foto_pengaduan) {
            if (is_array($foto_pengaduan)) {
                foreach ($foto_pengaduan as $key => $file) {
                    $file_name = str_replace(' ', '_', $request->judul) . '_' . kode_acak(5) . '.' . $file->getClientOriginalExtension();
                    $file->move('images/foto_pengaduan', $file_name);

                    $doc = new Foto_pengaduan;
                    $doc->pengaduan_id = $data->id;
                    $doc->nama_foto = $file_name;
                    $doc->save();
                }
            } else {
                // Tangani kasus jika file bukan array
                return redirect()->back()->with('gagal', 'Foto pengaduan tidak valid');
            }
        }

        DB::commit();
        return redirect()->route('pengaduan.berhasil', ['id' => $data->uuid])->with('success', 'Pengaduan Terkirim');

    } catch (\Exception $e) {
        dd($e);
        DB::rollback();
        return redirect()->back()->with('gagal', 'Data Gagal Diinput');
    }
}

    
    public function pengaduan_berhasil($id)
    {
        $pengaduan = Pengaduan::where('uuid', $id)->first();

        return view('frontend.pengaduan_berhasil', compact('pengaduan'));
    }

    public function cek_nip_jaringan(Request $request)
    {
        $nip = $request->nip;

        $getNIP = searchNip($nip);
        $jenisaplikasi = Jenisaplikasi::all();
        $opd = Opd::all();

        if ($getNIP === null || $getNIP->error == "true") {
            return redirect()->back()->with('gagal', 'NIP tidak Ditemukan');
        } else {
            return view('frontend.jaringan_form', compact('getNIP','jenisaplikasi', 'opd'));
        }
    }

    public function jaringan_form()
    {
        return view('frontend.jaringan_form');
    }
    public function create_jaringan(Request $request)
    {
        // Validasi input
        $this->validate($request,
            [
                'no_hp'              => 'required',
                'opd_id'             => 'required',
                'alamat'             => 'required',
                'longitude'          => 'required',
                'latitude'           => 'required',
                'jarak_kabel'        => 'required',
                'jumlah_aksespoint'  => 'required',
                'jenis_koneksi'      => 'required',
                'file_surat'         => 'mimes:pdf|max:5048'
            ],
            [
                'no_hp.required'             => ':attribute harus diisi.',
                'opd_id.required'            => ':attribute harus diisi.',
                'alamat.required'            => ':attribute harus diisi.',
                'longitude.required'         => ':attribute harus diisi.',
                'latitude.required'          => ':attribute harus diisi.',
                'jarak_kabel.required'       => ':attribute harus diisi.',
                'jumlah_aksespoint.required' => ':attribute harus diisi.',
                'jenis_koneksi.required'     => ':attribute harus diisi.',
                'file_surat.mimes'           => ':attribute harus format pdf.',
                'file_surat.max'             => ':attribute harus berukuran kurang dari :max kb',
            ],
            [
                'no_hp'              => 'Nomor WA',
                'opd_id'             => 'OPD',
                'alamat'             => 'Alamat',
                'longitude'          => 'Longitude',
                'latitude'           => 'Latitude',
                'jarak_kabel'        => 'Jarak Kabel',
                'jumlah_aksespoint'  => 'Jumlah Aksespoint',
                'jenis_koneksi'      => 'Jenis Koneksi',
                'file_surat'         => 'Surat Permohonan',
            ]
        );

        $opd = Opd::where('id', $request->opd_id)->first();
        DB::beginTransaction();
        try {
            $data = new Network(); // Ganti dengan nama model yang sesuai
            $data->tanggal          = date('Y-m-d'); // Sesuaikan dengan nama kolom yang sesuai
            $data->no_hp            = $request->no_hp;
            $data->nip                = $request->nip;
            $data->nama               = $request->nama;
            $data->jabatan            = $request->jabatan;
            $data->nama_opd           = $opd->nama_opd;
            $data->opd_id           = $request->opd_id;
            $data->alamat           = $request->alamat;
            $data->longitude        = $request->longitude;
            $data->latitude         = $request->latitude;
            $data->jarak_kabel      = $request->jarak_kabel;
            $data->jumlah_aksespoint = $request->jumlah_aksespoint;
            $data->jenis_koneksi    = $request->jenis_koneksi;

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

            DB::commit();
        return redirect()->route('jaringan.berhasil', ['id' => $data->uuid])->with('success', 'Pengaduan Terkirim');

         }   catch (\Exception $e) {
            dd($e);
            DB::rollback();
            return redirect()->back()->with('gagal', 'Data Gagal Diinput');
        }
    }
    // app/Http/Controllers/FrontendController.php
    public function jaringan_berhasil($id)
    {
        $network = Network::where('uuid', $id)->first();

        return view('frontend.jaringan_berhasil', compact('network'));
    }
    public function recentRequests()
    {
        // Mengambil data dengan status "Belum Diverifikasi"
        $permohonan = Permohonan::where('status', 'Belum Diverifikasi')->get();

        return datatables()->of($permohonan)
            ->addIndexColumn()
            ->make(true);
    }

}