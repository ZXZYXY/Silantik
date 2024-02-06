<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Network;
use App\Models\Opd;
use Yajra\DataTables\Facades\DataTables;

class NetworkController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->middleware('permission:network-list|network-create|network-edit|network-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:network-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:network-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:network-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        return view('network.index');
    }

    public function create()
    {
        $opd = Opd::all();
        return view('network.create', compact('opd'));
    }

    public function dataTable()
    {
        $data = Network::with('opd')->orderby('id', 'desc');

        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                return view('network.aksi', [
                    'data' => $data
                ]);
            })

            ->addColumn('opd', function ($data) {
                return $data->opd->singkatan;
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
