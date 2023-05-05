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
                $detail = '<button data-toggle="modal" data-kategori="' . $data->judul . '" data-target-id="' . $data->uuid . '" data-target="#ShowDETAIL" class="btn btn-info btn-xs" title="Detail"><i class="fa fa-eye"></i></button>';
                $edit = '<a href="' . url('pengaduan/' . $data->jenis_pengaduan . '/edit/' . $data->uuid) . '" class="btn btn-warning btn-xs" title="Edit"><i class="fa fa-edit"></i></a>';
                $hapus = '<button class="btn btn-danger btn-xs hapus" pengaduan-name="' . $data->judul . '" pengaduan-id="' . $data->uuid . '" title="Delete"><i class="fa fa-trash"></i></button>';

                return $detail . ' ' . $edit . ' ' . $hapus;
            })

            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
