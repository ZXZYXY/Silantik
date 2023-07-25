<?php

namespace App\Http\Controllers;

use App\Models\Daftaraplikasi;
use App\Models\File_pendukung;
use App\Models\Jenisaplikasi;
use App\Models\Opd;
use App\Models\Sektor;
use App\Models\Team;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use DB;
use File;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

class DaftaraplikasiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->middleware('permission:daftaraplikasi-list|daftaraplikasi-create|daftaraplikasi-edit|daftaraplikasi-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:daftaraplikasi-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:daftaraplikasi-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:daftaraplikasi-delete', ['only' => ['destroy']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('daftaraplikasi.index');
    }

    public function create()
    {
        $opd = Opd::all();
        $jenisaplikasi = Jenisaplikasi::all();
        $sektor = Sektor::all();
        $daftar_app = Daftaraplikasi::select('nama_aplikasi')->get();
        $team = Team::where('jabatan', 'Programmer')->get();
        return view('daftaraplikasi.create', compact('opd', 'jenisaplikasi', 'sektor', 'team'));
    }

    public function edit($id)
    {
        $opd = Opd::all();
        $jenisaplikasi = Jenisaplikasi::all();
        $data = Daftaraplikasi::where('uuid', $id)->first();
        $sektor = Sektor::all();
        $team = Team::where('jabatan', 'Programmer')->get();
        //dd($data);
        return view('daftaraplikasi.edit', compact('opd', 'jenisaplikasi', 'data', 'sektor', 'team'));
    }

    public function show($id)
    {
        $data = Daftaraplikasi::with('opd', 'sektor', 'team')->where('uuid', $id)->first();
        $ss_aplikasi = File_pendukung::where('daftaraplikasi_id', $data->id)->where('kategori', 'ss')->get();
        $dok_aplikasi = File_pendukung::where('daftaraplikasi_id', $data->id)->where('kategori', 'dokumen')->get();
        return view('daftaraplikasi.detail', compact('data', 'ss_aplikasi', 'dok_aplikasi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'team_id' => 'required',
            'nama_aplikasi' => 'required',
            'tahun_pembuatan' => 'required',
            'link_app' => 'required',
            'opd_id' => 'required',
            'jenis_aplikasi' => 'required'
        ]);
        $opd = Opd::where('id', $request->opd_id)->first();
        DB::beginTransaction();
        try {
            $data = new Daftaraplikasi();
            $data->team_id              = $request->team_id;
            $data->tahun_pembuatan      = $request->tahun_pembuatan;
            $data->nama_aplikasi        = $request->nama_aplikasi;
            $data->deskripsi            = $request->deskripsi;
            $data->link_app             = $request->link_app;
            $data->jenis_aplikasi       = implode(",", $request->jenis_aplikasi);
            $data->nama_konsultan       = $request->nama_konsultan;
            $data->opd_id               = $request->opd_id;
            $data->nama_opd             = $opd->nama_opd;
            $data->sektor_id            = $request->sektor_id;
            $data->status_aktif         = $request->status_aktif;
            $data->integrasi            = $request->integrasi;
            $data->app_integrasi        = $request->app_integrasi;
            $data->ada_perwal           = $request->ada_perwal;
            $data->portofolio           = $request->portofolio;

            if ($request->hasFile('file_perwal')) {
                $files = $request->file('file_perwal');
                $file_name = $request->nama_aplikasi . '_PERWAL_' . kode_acak(5) . '.' . $files->getClientOriginalExtension();
                $files->move('dokumen/perwal/', $file_name);
                $data->file_perwal      = $file_name;
            }
            if ($request->hasFile('logo_aplikasi')) {
                File::delete('images/logo_aplikasi/' . $data->logo_aplikasi);
                $foto = $request->file('logo_aplikasi');
                $image_name = $request->nama_aplikasi . '_PERWAL_' . kode_acak(5) . '.' . $foto->getClientOriginalExtension();
                $ImageUpload = Image::make($foto->getRealPath());
                $ImageUpload->save(public_path('images/logo_aplikasi/') . $image_name);
                $data->logo_aplikasi      = $image_name;
            }
            if ($request->hasFile('gambar_home')) {
                $foto = $request->file('gambar_home');
                $image_name = $request->nama_aplikasi . '_SS-Home_' . kode_acak(5) . '.' . $foto->getClientOriginalExtension();
                $ImageUpload = Image::make($foto->getRealPath());
                $ImageUpload->save(public_path('images/gambar_home/') . $image_name);
                $data->gambar_home      = $image_name;
            }
            $data->save();

            DB::commit();
            return redirect('daftaraplikasi/')->with('success', 'Data Berhasil Ditambah');
        } catch (\Exception $e) {
            //dd($e);
            DB::rollback();
            return redirect()->back()->with('gagal', 'Data Gagal Diinput');
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_aplikasi' => 'required',
            'tahun_pembuatan' => 'required',
            'link_app' => 'required',
            'opd_id' => 'required',
            'jenis_aplikasi' => 'required'
        ]);
        $opd = Opd::where('id', $request->opd_id)->first();
        DB::beginTransaction();
        try {
            $data = Daftaraplikasi::where('uuid', $id)->first();

            $data->team_id              = $request->team_id;
            $data->tahun_pembuatan      = $request->tahun_pembuatan;
            $data->nama_aplikasi        = $request->nama_aplikasi;
            $data->deskripsi            = $request->deskripsi;
            $data->link_app             = $request->link_app;
            $data->jenis_aplikasi       = implode(",", $request->jenis_aplikasi);
            $data->nama_konsultan       = $request->nama_konsultan;
            $data->opd_id               = $request->opd_id;
            $data->nama_opd             = $opd->nama_opd;
            $data->sektor_id            = $request->sektor_id;
            $data->status_aktif         = $request->status_aktif;
            $data->integrasi            = $request->integrasi;
            $data->app_integrasi        = $request->app_integrasi;
            $data->ada_perwal           = $request->ada_perwal;
            $data->portofolio           = $request->portofolio;

            if ($request->hasFile('file_perwal')) {
                File::delete('dokumen/perwal/' . $data->file_perwal);
                $files = $request->file('file_perwal');
                $file_name = $request->nama_aplikasi . '_PERWAL_' . kode_acak(5) . '.' . $files->getClientOriginalExtension();
                $files->move('dokumen/perwal/', $file_name);
                $data->file_perwal      = $file_name;
            }

            if ($request->hasFile('logo_aplikasi')) {
                File::delete('images/logo_aplikasi/' . $data->logo_aplikasi);
                $foto = $request->file('logo_aplikasi');
                $image_name = $request->nama_aplikasi . '_PERWAL_' . kode_acak(5) . '.' . $foto->getClientOriginalExtension();
                $ImageUpload = Image::make($foto->getRealPath());
                $ImageUpload->save(public_path('images/logo_aplikasi/') . $image_name);
                $data->logo_aplikasi      = $image_name;
            }

            if ($request->hasFile('gambar_home')) {
                File::delete('images/gambar_home/' . $data->gambar_home);
                $foto = $request->file('gambar_home');
                $image_name = $request->nama_aplikasi . '_SS-Home_' . kode_acak(5) . '.' . $foto->getClientOriginalExtension();
                $ImageUpload = Image::make($foto->getRealPath());
                $ImageUpload->save(public_path('images/gambar_home/') . $image_name);
                $data->gambar_home      = $image_name;
            }

            $data->save();

            DB::commit();
            return redirect()->route('daftaraplikasi.index')->with('success', 'Data Berhasil Dirubah');
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            return redirect()->back()->with('gagal', 'Data Gagal Diinput');
        }
    }

    public function destroy($id)
    {
        $model = Daftaraplikasi::where('uuid', $id)->first();
        $model->delete();

        return response()->json([
            'status' => 'true',
            'messages' => 'Data Berhasil dihapus'
        ]);
    }

    public function dataTable()
    {
        $data = Daftaraplikasi::with('opd')->orderby('id', 'desc');

        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                return view('daftaraplikasi.aksi', [
                    'data' => $data
                ]);
            })

            ->addColumn('opd', function ($data) {
                return $data->opd->singkatan;
            })

            ->addColumn('link', function ($data) {
                return '<a href="' . $data->link_app . '" target="_blank">' . $data->link_app . '</a>';
            })

            ->addColumn('status_aktif', function ($data) {

                if ($data->status_aktif == 'Aktif') {
                    return '<span class="badge rounded-pill bg-primary">' . strtoupper($data->status_aktif) . '</span>';
                } else {
                    return '<span class="badge rounded-pill bg-danger">' . strtoupper($data->status_aktif) . '</span>';
                }
            })

            ->addIndexColumn()
            ->rawColumns(['action', 'opd', 'status_aktif', 'link'])
            ->make(true);
    }

    public function upload_ss(Request $request)
    {
        //dd($request->images);
        DB::beginTransaction();
        try {
            $data = Daftaraplikasi::where('id', $request->daftaraplikasi_id)->first();

            if ($request->hasFile('foto_ss')) {
                $images = $request->file('foto_ss');

                // Check if the minimum number of images is uploaded
                if (count($images) > 5) {
                    return redirect()->back()->with('gagal', 'Maksimal 5 Gambar');
                }

                foreach ($images as $image) {
                    // Validate the image file if needed
                    $this->validate($request, [
                        'foto_ss[]' => 'image|mimes:jpeg,png,jpg,gif|max:5048'
                    ]);
                    // Store the image in the public storage directory
                    $image_name1 = 'SS_' . str_replace(' ', '_', $data->nama_aplikasi) . '_' . kode_acak(5) . '.' . $image->getClientOriginalExtension();
                    $imagePath = $image->storeAs('public/images/ss', $image_name1);

                    // You can also store the image path in your database if necessary
                    $imageModel = new File_pendukung();
                    $imageModel->daftaraplikasi_id = $data->id;
                    $imageModel->nama_file         = $image_name1;
                    $imageModel->kategori          = $request->kategori;
                    $imageModel->save();
                }
            }

            DB::commit();
            return redirect()->back()->with('success', 'Data Berhasil Ditambah');
        } catch (\Exception $e) {
            //dd($e);
            DB::rollback();
            return redirect()->back()->with('gagal', 'Data Gagal Diinput');
        }
    }

    public function upload_dokumen(Request $request)
    {
        //dd($request->images);
        DB::beginTransaction();
        try {
            $data = Daftaraplikasi::where('id', $request->daftaraplikasi_id)->first();

            if ($request->hasFile('dokumen')) {
                $images = $request->file('dokumen');

                // Check if the minimum number of images is uploaded
                if (count($images) > 5) {
                    return redirect()->back()->with('gagal', 'Maksimal 5 Gambar');
                }

                foreach ($images as $image) {
                    // Validate the image file if needed
                    $this->validate($request, [
                        'dokumen[]' => 'file|mimes:pdf,docx,xlsx|max:5048'
                    ]);
                    // Store the image in the public storage directory
                    $image_name1 = 'Doc_' . str_replace(' ', '_', $data->nama_aplikasi) . '_' . kode_acak(5) . '.' . $image->getClientOriginalExtension();
                    $imagePath = $image->storeAs('public/dokumen', $image_name1);

                    // You can also store the image path in your database if necessary
                    $imageModel = new File_pendukung();
                    $imageModel->daftaraplikasi_id = $data->id;
                    $imageModel->nama_file         = $image_name1;
                    $imageModel->kategori          = $request->kategori;
                    $imageModel->save();
                }
            }

            DB::commit();
            return redirect()->back()->with('success', 'Data Berhasil Ditambah');
        } catch (\Exception $e) {
            //dd($e);
            DB::rollback();
            return redirect()->back()->with('gagal', 'Data Gagal Diinput');
        }
    }

    public function hapus_file_pendukung($id)
    {
        $model = File_pendukung::where('uuid', $id)->first();

        $model->delete();
        if ($model->kategori == 'dokumen') {
            Storage::delete('public/dokumen/' . $model->nama_file);
        } elseif ($model->kategori == 'ss') {
            Storage::delete('public/images/ss/' . $model->nama_file);
        }

        return response()->json([
            'status' => 'true',
            'messages' => 'Data Berhasil dihapus'
        ]);
    }
}
