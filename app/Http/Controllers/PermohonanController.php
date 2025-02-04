<?php

namespace App\Http\Controllers;

use App\Models\Historipermohonan;
use App\Models\Jenisaplikasi;
use App\Models\Opd;
use App\Models\Permohonan;
use App\Models\Statuspermohonan;
use App\Models\User;
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
        $this->middleware('permission:permohonan-list|permohonan-create|permohonan-edit|permohonan-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:permohonan-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:permohonan-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:permohonan-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        //$jenis = $jenis_permohonan;
        return view('permohonan.index');
    }

    public function create($jenis_permohonan)
    {
        $jenisaplikasi = Jenisaplikasi::all();
        $opd = Opd::all();
        $jenis = $jenis_permohonan;
        return view('permohonan.create', compact('jenisaplikasi', 'opd', 'jenis'));
    }

    public function edit($jenis_permohonan, $id)
    {
        $jenisaplikasi = Jenisaplikasi::all();
        $opd = Opd::all();
        $data = Permohonan::where('uuid', $id)->first();
        $jenis = $jenis_permohonan;
        return view('permohonan.edit', compact('jenisaplikasi', 'opd', 'data', 'jenis'));
    }


    public function show($jenis_permohonan, $id)
    {
        $data = Permohonan::where('uuid', $id)->first();
        $jenis = $jenis_permohonan;
        $pemohon = User::where('id', $data->pemohon_id)->first();
        $status = Statuspermohonan::select('nama_status')->get();
        //$histori = Historipermohonan::where('permohonan_id', $data->id)->orderBy('id', 'desc')->get();
        $histori = DB::table('histori_permohonan as a')
            ->select('a.*', 'b.name')
            ->leftJoin('users as b', 'a.petugas_id', '=', 'b.id')
            ->where('a.permohonan_id', $data->id)->orderBy('id', 'desc')
            ->get();
        return view('permohonan.show', compact('data', 'jenis', 'pemohon', 'status', 'histori'));
    }

    public function destroy($id)
    {
        $model = Permohonan::where('uuid', $id)->first();

        $model->delete();
        Storage::delete('public/file_surat/' . $model->file_surat);
        return response()->json([
            'status' => 'true',
            'messages' => 'Data Berhasil dihapus'
        ]);
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
        //nomor permohonan
        $no_urut = Permohonan::max('no_urut');
        $last_record = Permohonan::orderBy('id', 'desc')->first();
        $no = 1;

        if (!$no_urut) {
            $format_nopermohonan = date('Ymd') . '' . sprintf("%04s", $no);
            $no_urut = sprintf("%04s", $no);
        } elseif (date('Y') != substr($last_record->tanggal, 0, 4)) {
            $format_nopermohonan = date('Ymd') . '' . sprintf("%04s", $no);
            $no_urut = sprintf("%04s", $no);
        } else {
            $format_nopermohonan = date('Ymd') . '' . sprintf("%04s", abs($last_record->no_urut + 1));
            $no_urut = sprintf("%04s", abs($last_record->no_urut + 1));
        }
        //end nomor permohonan

        DB::beginTransaction();
        try {
            $data = new Permohonan();
            $data->no_urut         = $no_urut;
            $data->kd_permohonan   = $format_nopermohonan;
            $data->opd_id          = $request->opd_id;
            $data->nama_opd        = $opd->nama_opd;
            $data->jenis_permohonan = $request->jenis_permohonan;
            $data->nama_aplikasi   = $request->nama_aplikasi;
            $data->jenis_aplikasi  = $request->jenis_aplikasi;
            $data->deskripsi       = $request->deskripsi;
            $data->tanggal         = date('Y-m-d');
            $data->pemohon_id      = auth()->user()->id;

            if ($request->hasFile('file_surat')) {
                $file = $request->file('file_surat');
                $image_name1 = str_replace(' ', '_', $request->nama_aplikasi) . '_' . kode_acak(5) . '.' . $file->getClientOriginalExtension();
                $upload = $file->storeAs('public/file_surat', $image_name1);
                $data->file_surat = $image_name1;
            }
            $data->save();

            //Histori
            $status = new Historipermohonan();
            $status->permohonan_id      = $data->id;
            $status->status             = 'Permohonan Baru';
            $status->save();

            DB::commit();
            return redirect('permohonan/' . $request->jenis_permohonan)->with('success', 'Data Berhasil Ditambah');
        } catch (\Exception $e) {
            dd($e);
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
            return redirect('permohonan/' . $request->jenis_permohonan)->with('success', 'Data Berhasil Dirubah');
        } catch (\Exception $e) {
            //dd($e);
            DB::rollback();
            return redirect()->back()->with('gagal', 'Data Gagal Diinput');
        }
    }

    public function proses(Request $request)
    {
        $this->validate($request, [
            'status' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $data = Permohonan::where('uuid', $request->uuid)->first();
            $data->status               = $request->status;
            $data->keterangan_status    = $request->keterangan_status;
            $data->petugas_id           = auth()->user()->id;
            $data->save();

            //Histori
            $status = new Historipermohonan();
            $status->permohonan_id      = $data->id;
            $status->status             = $request->status;
            $status->keterangan_status    = $request->keterangan_status;
            $status->petugas_id           = auth()->user()->id;
            $status->save();

            DB::commit();
            return redirect()->back()->with('success', 'Data Berhasil Dirubah');
        } catch (\Exception $e) {
            //dd($e);
            DB::rollback();
            return redirect()->back()->with('gagal', 'Data Gagal Diinput');
        }
    }


    public function dataTable()
    {
        $data = Permohonan::orderby('id', 'desc');
        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                return view('permohonan.aksi', [
                    'data' => $data
                ]);
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
                return '<span class="badge bg-dark">' . $data->status . '</span>';
            })

            ->addIndexColumn()
            ->rawColumns(['action', 'tanggal', 'surat', 'status'])
            ->make(true);
    }
}
