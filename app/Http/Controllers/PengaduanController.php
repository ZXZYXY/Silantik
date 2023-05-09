<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use DB;

class PengaduanController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:pengaduan-list|pengaduan-create|pengaduan-edit|pengaduan-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:pengaduan-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:pengaduan-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:pengaduan-delete', ['only' => ['destroy']]);
    }

    public function index($jenis_pengaduan)
    {
        $jenis = $jenis_pengaduan;
        return view('pengaduan.index', compact('jenis'));
    }

    public function create($jenis_pengaduan)
    {
        $jenis = $jenis_pengaduan;
        return view('pengaduan.tambah', compact('jenis'));
    }

    public function edit($jenis_pengaduan, $id)
    {
        $jenis = $jenis_pengaduan;
        $data = Pengaduan::where('uuid', $id)->first();
        return view('pengaduan.edit', compact('jenis', 'data'));
    }

    public function show($jenis_pengaduan, $id)
    {
        $jenis = $jenis_pengaduan;
        $data = Pengaduan::where('uuid', $id)->first();
        return view('pengaduan.detail', compact('jenis', 'data'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'isi' => 'required',

        ]);

        DB::beginTransaction();
        try {
            $data = new Pengaduan();
            $data->opd_id           = auth()->user()->opd_id;
            $data->pelapor_id       = auth()->user()->id;
            $data->jenis_pengaduan  = $request->jenis_pengaduan;
            $data->judul            = $request->judul;
            $data->isi              = $request->isi;
            $data->tanggal          = date('Y-m-d');
            $data->save();

            DB::commit();
            return redirect('pengaduan/' . $request->jenis_pengaduan)->with('success', 'Pengaduan Terkirim');
        } catch (\Exception $e) {
            //dd($e);
            DB::rollback();
            return redirect()->back()->with('gagal', 'Data Gagal Diinput');
        }
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'isi' => 'required',

        ]);

        DB::beginTransaction();
        try {
            $data = Pengaduan::where('uuid', $request->uuid)->first();

            $data->judul            = $request->judul;
            $data->isi              = $request->isi;
            $data->save();

            DB::commit();
            return redirect('pengaduan/' . $request->jenis_pengaduan)->with('success', 'Pengaduan Diubah');
        } catch (\Exception $e) {
            //dd($e);
            DB::rollback();
            return redirect()->back()->with('gagal', 'Data Gagal Diinput');
        }
    }

    public function dataTable($jenis)
    {
        $opd_id = auth()->user()->opd_id;
        if ($opd_id == null) {
            $data = Pengaduan::where('jenis_pengaduan', '=', $jenis)->get();
        } else {
            $data = Pengaduan::where([['opd_id', '=', $opd_id], ['jenis_pengaduan', '=', $jenis]])->get();
        }
        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                return view('pengaduan.aksi', [
                    'data' => $data
                ]);
            })

            ->addColumn('tanggal', function ($data) {
                return TanggalAja($data->tanggal);
            })

            ->addColumn('status', function ($data) {
                if ($data->status == NULL) {
                    return 'Pengaduan Baru';
                } else {
                    return $data->status;
                }
            })

            ->addIndexColumn()
            ->rawColumns(['action', 'pengaduan', 'tanggal'])
            ->make(true);
    }

    public function destroy($id)
    {
        $model = Pengaduan::where('uuid', $id);
        $model->delete();

        return response()->json([
            'status' => 'true',
            'messages' => 'Data Berhasil dihapus'
        ]);
    }
}
