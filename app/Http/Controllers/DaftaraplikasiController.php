<?php

namespace App\Http\Controllers;

use App\Models\Daftaraplikasi;
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
        return view('daftaraplikasi.create', compact('opd'));
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
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);

        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index')
            ->with('success', 'Role created successfully');
    }

    public function dataTable()
    {
        $data = Daftaraplikasi::orderby('id', 'desc');

        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                $edit = '<a href="' . route('daftaraplikasi.edit', $data->id) . '" class="btn btn-warning btn-sm" title="Edit"><i class="lni lni-highlight-alt"></i></a>';
                $hapus = '<button class="btn btn-danger btn-sm hapus" daftaraplikasi-name="' . $data->judul . '" daftaraplikasi-id="' . $data->id . '" title="Delete"><i class="lni lni-trash"></i></button>';
                if (auth()->user()->can('daftaraplikasi-edit') and auth()->user()->can('daftaraplikasi-delete')) {
                    return $edit . ' ' . $hapus;
                } elseif (auth()->user()->can('daftaraplikasi-edit')) {
                    return $edit;
                } elseif (auth()->user()->can('daftaraplikasi-delete')) {
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
