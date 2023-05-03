<?php

namespace App\Http\Controllers;

use App\Models\Jenisaplikasi;
use App\Models\Opd;
use App\Models\Permohonan;
use Illuminate\Http\Request;
use DB;
use DataTables;

class PermohonanController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');

        //Permohonan
        $this->middleware('permission:pembuatan-list|pembuatan-create|pembuatan-edit|pembuatan-delete', ['only' => ['pembuatan', 'show_pembuatan']]);
        $this->middleware('permission:pembuatan-create', ['only' => ['create_pembuatan', 'store_pembuatan']]);
        $this->middleware('permission:pembuatan-edit', ['only' => ['edit_pembuatan', 'update_pembuatan']]);
        $this->middleware('permission:pembuatan-delete', ['only' => ['destroy_pembuatan']]);

        //Pembaharuan
        $this->middleware('permission:pembaharuan-list|pembaharuan-create|pembaharuan-edit|pembaharuan-delete', ['only' => ['pembaharuan', 'show_pembaharuan']]);
        $this->middleware('permission:pembaharuan-create', ['only' => ['create_pembaharuan', 'store_pembaharuan']]);
        $this->middleware('permission:pembaharuan-edit', ['only' => ['edit_pembaharuan', 'update_pembaharuan']]);
        $this->middleware('permission:pembaharuan-delete', ['only' => ['destroy_pembaharuan']]);
    }

    public function pembuatan()
    {
        return view('permohonan.pembuatan_index');
    }

    public function create_pembuatan()
    {
        $jenisaplikasi = Jenisaplikasi::all();
        $opd = Opd::all();
        return view('permohonan.pembuatan_create', compact('jenisaplikasi', 'opd'));
    }

    public function store_pembuatan(Request $request)
    {
        $this->validate($request, [
            'opd_id' => 'required',
            'nama_aplikasi' => 'required',
            'jenis_aplikasi' => 'required',
            'deskripsi' => 'required',
            'file_surat' => 'mimes:pdf|max:2048',
        ]);
        $opd = Opd::where('id', $request->opd_id)->first();
        DB::beginTransaction();
        try {
            $data = new Permohonan();
            $data->opd_id          = $request->opd_id;
            $data->nama_opd        = $opd->nama_opd;
            $data->jenis_permohonan = $request->jenis_permohonan;
            $data->nama_aplikasi   = $request->nama_aplikasi;
            $data->jenis_aplikasi  = $request->jenis_aplikasi;
            $data->deskripsi       = $request->deskripsi;
            $data->tanggal         = date('Y-m-d');
            $data->user_id         = auth()->user()->id;

            if ($request->hasFile('file_surat')) {
                $file = $request->file('file_surat');
                $image_name1 = str_replace(' ', '_', $request->nama_aplikasi) . '_' . kode_acak(5) . '.' . $file->getClientOriginalExtension();
                $upload = $file->storeAs('public/file_surat', $image_name1);
                $data->file_surat = $image_name1;
            }
            $data->save();

            DB::commit();
            return redirect('permohonan/pembuatan')->with('success', 'Data Berhasil Ditambah');
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            return redirect()->back()->with('gagal', 'Data Gagal Diinput');
        }
    }

    public function pembaharuan()
    {
        return view('permohonan.pembaharuan_index');
    }

    public function create_pembaharuan()
    {
        return view('permohonan.pembaharuan_create');
    }

    public function dataTable_pembuatan()
    {
        $data = Permohonan::orderby('id', 'desc')->where('jenis_permohonan', 'pembuatan')->get();
        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                $edit = '<a href="' . url('permohonan/pembuatan/' . $data->uuid) . '" class="btn btn-warning btn-sm" title="Edit"><i class="lni lni-highlight-alt"></i></a>';
                $hapus = '<button class="btn btn-danger btn-sm hapus" pembuatan-name="' . $data->nama_aplikasi . '" pembuatan-id="' . $data->uuid . '" title="Delete"><i class="lni lni-trash"></i></button>';
                if (auth()->user()->can('pembuatan-edit') and auth()->user()->can('pembuatan-delete')) {
                    return $edit . ' ' . $hapus;
                } elseif (auth()->user()->can('pembuatan-edit')) {
                    return $edit;
                } elseif (auth()->user()->can('pembuatan-delete')) {
                    return $hapus;
                } else {
                    return 'No Action';
                }
            })

            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }

    public function dataTable_pembaharuan()
    {
        $data = Permohonan::orderby('id', 'desc')->where('jenis_permohonan', 'pembaharuan')->get();
        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                $edit = '<a href="' . url('permohonan/pembuatan/' . $data->uuid) . '" class="btn btn-warning btn-sm" title="Edit"><i class="lni lni-highlight-alt"></i></a>';
                $hapus = '<button class="btn btn-danger btn-sm hapus" pembuatan-name="' . $data->nama_aplikasi . '" pembuatan-id="' . $data->uuid . '" title="Delete"><i class="lni lni-trash"></i></button>';
                if (auth()->user()->can('pembaharuan-edit') and auth()->user()->can('pembaharuan-delete')) {
                    return $edit . ' ' . $hapus;
                } elseif (auth()->user()->can('pembaharuan-edit')) {
                    return $edit;
                } elseif (auth()->user()->can('pembaharuan-delete')) {
                    return $hapus;
                } else {
                    return 'No Action';
                }
            })

            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
