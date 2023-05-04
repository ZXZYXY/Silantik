<?php

namespace App\Http\Controllers;

use App\Models\Jenisaplikasi;
use App\Models\Opd;
use App\Models\Permohonan;
use Illuminate\Http\Request;
use DB;
use DataTables;
use Illuminate\Support\Facades\Storage;

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
        return view('permohonan.pembuatan.index');
    }

    public function create_pembuatan()
    {
        $jenisaplikasi = Jenisaplikasi::all();
        $opd = Opd::all();
        return view('permohonan.pembuatan.create', compact('jenisaplikasi', 'opd'));
    }

    public function edit_pembuatan($id)
    {
        $jenisaplikasi = Jenisaplikasi::all();
        $opd = Opd::all();
        $data = Permohonan::where('uuid', $id)->first();
        return view('permohonan.pembuatan.edit', compact('jenisaplikasi', 'opd', 'data'));
    }
    public function edit_pembaharuan($id)
    {
        $jenisaplikasi = Jenisaplikasi::all();
        $opd = Opd::all();
        $data = Permohonan::where('uuid', $id)->first();
        return view('permohonan.pembaharuan.edit', compact('jenisaplikasi', 'opd', 'data'));
    }

    public function show_pembuatan($id)
    {
        $data = Permohonan::where('uuid', $id)->first();
        return view('permohonan.pembuatan.show', compact('data'));
    }

    public function show_pembaharuan($id)
    {
        $data = Permohonan::where('uuid', $id)->first();
        return view('permohonan.pembaharuan.show', compact('data'));
    }

    public function store(Request $request)
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
            if ($request->jenis_permohonan == 'pembuatan') {
                return redirect('permohonan/pembuatan')->with('success', 'Data Berhasil Ditambah');
            } elseif ($request->jenis_permohonan == 'pembaharuan') {
                return redirect('permohonan/pembaharuan')->with('success', 'Data Berhasil Ditambah');
            }
        } catch (\Exception $e) {
            //dd($e);
            DB::rollback();
            return redirect()->back()->with('gagal', 'Data Gagal Diinput');
        }
    }

    public function update(Request $request)
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
            $data = Permohonan::where('uuid', $request->uuid)->first();
            $data->opd_id          = $request->opd_id;
            $data->nama_opd        = $opd->nama_opd;
            $data->jenis_permohonan = $request->jenis_permohonan;
            $data->nama_aplikasi   = $request->nama_aplikasi;
            $data->jenis_aplikasi  = $request->jenis_aplikasi;
            $data->deskripsi       = $request->deskripsi;

            if ($request->hasFile('file_surat')) {
                $file = $request->file('file_surat');
                $image_name1 = str_replace(' ', '_', $request->nama_aplikasi) . '_' . kode_acak(5) . '.' . $file->getClientOriginalExtension();
                $upload = $file->storeAs('public/file_surat', $image_name1);
                $data->file_surat = $image_name1;
            }
            $data->save();

            DB::commit();
            if ($request->jenis_permohonan == 'pembuatan') {
                return redirect('permohonan/pembuatan')->with('success', 'Data Berhasil Dirubah');
            } elseif ($request->jenis_permohonan == 'pembaharuan') {
                return redirect('permohonan/pembaharuan')->with('success', 'Data Berhasil Dirubah');
            }
        } catch (\Exception $e) {
            //dd($e);
            DB::rollback();
            return redirect()->back()->with('gagal', 'Data Gagal Diinput');
        }
    }

    public function destroy_pembuatan($id)
    {
        $model = Permohonan::where('uuid', $id)->first();
        $model->delete();
        Storage::delete('public/file_surat/' . $model->file_surat);
        return response()->json([
            'status' => 'true',
            'messages' => 'Data Berhasil dihapus'
        ]);
    }

    public function pembaharuan()
    {
        return view('permohonan.pembaharuan.index');
    }

    public function create_pembaharuan()
    {
        $jenisaplikasi = Jenisaplikasi::all();
        $opd = Opd::all();
        return view('permohonan.pembaharuan.create', compact('jenisaplikasi', 'opd'));
    }

    public function dataTable_pembuatan()
    {
        $data = Permohonan::orderby('id', 'desc')->where('jenis_permohonan', 'pembuatan')->get();
        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                $edit = '<a href="' . url('permohonan/pembuatan/edit/' . $data->uuid) . '" class="btn btn-warning btn-sm" title="Edit"><i class="lni lni-highlight-alt"></i></a>';
                $hapus = '<button class="btn btn-danger btn-sm hapus" pembuatan-name="' . $data->nama_aplikasi . '" pembuatan-id="' . $data->uuid . '" title="Delete"><i class="lni lni-trash"></i></button>';
                $detail = '<a href="' . url('permohonan/pembuatan/detail/' . $data->uuid) . '" class="btn btn-info btn-sm" title="Detail"><i class="fa fa-eye"></i></a>';
                if (auth()->user()->can('pembuatan-edit') and auth()->user()->can('pembuatan-delete')) {
                    return $detail . ' ' . $edit . ' ' . $hapus;
                } elseif (auth()->user()->can('pembuatan-edit')) {
                    return $detail . ' ' . $edit;
                } elseif (auth()->user()->can('pembuatan-delete')) {
                    return $detail . ' ' . $hapus;
                } else {
                    return 'No Action';
                }
            })
            ->addColumn('tanggal', function ($data) {
                return TanggalAja($data->tanggal);
            })

            ->addColumn('surat', function ($data) {
                if ($data->file_surat == null) {
                    return "Tidak Ada";
                } else {
                    return '<a href="' . Storage::url('public/file_surat/') . $data->file_surat . '" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-file"></i></a> ';
                }
            })

            ->addColumn('status', function ($data) {
                return $data->status;
            })

            ->addIndexColumn()
            ->rawColumns(['action', 'tanggal', 'surat', 'status'])
            ->make(true);
    }

    public function dataTable_pembaharuan()
    {
        $data = Permohonan::orderby('id', 'desc')->where('jenis_permohonan', 'pembaharuan')->get();
        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                $edit = '<a href="' . url('permohonan/pembaharuan/edit/' . $data->uuid) . '" class="btn btn-warning btn-sm" title="Edit"><i class="lni lni-highlight-alt"></i></a>';
                $hapus = '<button class="btn btn-danger btn-sm hapus" pembaharuan-name="' . $data->nama_aplikasi . '" pembaharuan-id="' . $data->uuid . '" title="Delete"><i class="lni lni-trash"></i></button>';
                $detail = '<a href="' . url('permohonan/pembaharuan/detail/' . $data->uuid) . '" class="btn btn-info btn-sm" title="Detail"><i class="fa fa-eye"></i></a>';
                if (auth()->user()->can('pembaharuan-edit') and auth()->user()->can('pembaharuan-delete')) {
                    return $detail . ' ' . $edit . ' ' . $hapus;
                } elseif (auth()->user()->can('pembaharuan-edit')) {
                    return $detail . ' ' . $edit;
                } elseif (auth()->user()->can('pembaharuan-delete')) {
                    return $detail . ' ' . $hapus;
                } else {
                    return 'No Action';
                }
            })
            ->addColumn('tanggal', function ($data) {
                return TanggalAja($data->tanggal);
            })

            ->addColumn('surat', function ($data) {
                if ($data->file_surat == null) {
                    return "Tidak Ada";
                } else {
                    return '<a href="' . Storage::url('public/file_surat/') . $data->file_surat . '" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-file"></i></a> ';
                }
            })

            ->addColumn('status', function ($data) {
                return $data->status;
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'tanggal', 'surat', 'status'])
            ->make(true);
    }
}
