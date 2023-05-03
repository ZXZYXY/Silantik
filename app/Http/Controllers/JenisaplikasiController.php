<?php

namespace App\Http\Controllers;

use App\Models\Jenisaplikasi;
use Illuminate\Http\Request;
use DB;
use DataTables;

class JenisaplikasiController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->middleware('permission:jenisaplikasi-list|jenisaplikasi-create|jenisaplikasi-edit|jenisaplikasi-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:jenisaplikasi-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:jenisaplikasi-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:jenisaplikasi-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('data-master.jenisaplikasi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Jenisaplikasi();
        return view('data-master.jenisaplikasi.form', compact('model'));
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
            'nama_jenis' => 'required'
        ]);

        $model = Jenisaplikasi::create($request->all());
        return $model;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Jenisaplikasi::findOrFail($id);
        return view('data-master.jenisaplikasi.form', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_jenis' => 'required'
        ]);

        $jenisaplikasi = Jenisaplikasi::findOrFail($id);

        $jenisaplikasi->nama_jenis = $request->nama_jenis;
        $jenisaplikasi->update();

        return response()->json([
            'status' => 'true',
            'messages' => 'Data Berhasil diedit'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Jenisaplikasi::findOrFail($id);
        $model->delete();
        return response()->json([
            'status' => 'true',
            'messages' => 'Data Berhasil dihapus'
        ]);
    }

    public function dataTable()
    {
        $model = Jenisaplikasi::query();
        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('data-master.jenisaplikasi._action', [
                    'model' => $model,
                    'url_edit' => route('jenisaplikasi.edit', $model->id),
                    'url_destroy' => route('jenisaplikasi.destroy', $model->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
