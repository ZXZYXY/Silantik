<?php

namespace App\Http\Controllers;

use App\Models\Daftaraplikasi;
use App\Models\Jenisaplikasi;
use App\Models\Opd;
use App\Models\Sektor;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use DB;
use File;

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
        return view('daftaraplikasi.create', compact('opd', 'jenisaplikasi', 'sektor'));
    }

    public function edit($id)
    {
        $opd = Opd::all();
        $jenisaplikasi = Jenisaplikasi::all();
        $data = Daftaraplikasi::where('uuid', $id)->first();
        $sektor = Sektor::all();
        return view('daftaraplikasi.edit', compact('opd', 'jenisaplikasi', 'data', 'sektor'));
    }

    public function show($id)
    {
        $data = Daftaraplikasi::with('opd')->where('uuid', $id)->first();
        return view('daftaraplikasi.detail', compact('data'));
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

            if ($request->hasFile('file_perwal')) {
                $files = $request->file('file_perwal');
                $file_name = $request->nama_aplikasi . '_PERWAL_' . kode_acak(5) . '.' . $files->getClientOriginalExtension();
                $files->move('dokumen/perwal/', $file_name);
                $data->file_perwal      = $file_name;
            }
            $data->save();

            DB::commit();
            return redirect('daftaraplikasi/')->with('success', 'Data Berhasil Ditambah');
        } catch (\Exception $e) {
            dd($e);
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

            if ($request->hasFile('file_perwal')) {
                File::delete('dokumen/perwal/' . $data->file_perwal);
                $files = $request->file('file_perwal');
                $file_name = $request->nama_aplikasi . '_PERWAL_' . kode_acak(5) . '.' . $files->getClientOriginalExtension();
                $files->move('dokumen/perwal/', $file_name);
                $data->file_perwal      = $file_name;
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
                return $data->opd->nama_opd;
            })

            ->addColumn('status_aktif', function ($data) {

                if ($data->status_aktif == 'Aktif') {
                    return '<span class="badge rounded-pill bg-primary">' . strtoupper($data->status_aktif) . '</span>';
                } else {
                    return '<span class="badge rounded-pill bg-danger">' . strtoupper($data->status_aktif) . '</span>';
                }
            })

            ->addIndexColumn()
            ->rawColumns(['action', 'opd', 'status_aktif'])
            ->make(true);
    }
}
