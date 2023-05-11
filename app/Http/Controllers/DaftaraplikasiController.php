<?php

namespace App\Http\Controllers;

use App\Models\Daftaraplikasi;
use App\Models\Jenisaplikasi;
use App\Models\Opd;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use DB;

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
        return view('daftaraplikasi.create', compact('opd', 'jenisaplikasi'));
    }

    public function edit($id)
    {
        $opd = Opd::all();
        $jenisaplikasi = Jenisaplikasi::all();
        $data = Daftaraplikasi::where('uuid', $id)->first();
        return view('daftaraplikasi.edit', compact('opd', 'jenisaplikasi', 'data'));
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

            $data->nama_aplikasi        = $request->nama_aplikasi;
            $data->tahun_pembuatan      = $request->tahun_pembuatan;
            $data->link_app             = $request->link_app;
            $data->opd_id               = $request->opd_id;
            $data->nama_opd             = $opd->nama_opd;
            $data->jenis_aplikasi                = $request->jenis_aplikasi;
            $data->deskripsi                = $request->deskripsi;
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

            $data->nama_aplikasi        = $request->nama_aplikasi;
            $data->tahun_pembuatan      = $request->tahun_pembuatan;
            $data->link_app             = $request->link_app;
            $data->opd_id               = $request->opd_id;
            $data->nama_opd             = $opd->nama_opd;
            $data->jenis_aplikasi       = $request->jenis_aplikasi;
            $data->deskripsi            = $request->deskripsi;
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

            ->addIndexColumn()
            ->rawColumns(['action', 'opd'])
            ->make(true);
    }
}
