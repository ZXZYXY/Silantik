<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opd;
use DB;
use DataTables;

class OpdController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->middleware('permission:opd-list|opd-create|opd-edit|opd-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:opd-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:opd-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:opd-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('data-master.opd.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Opd();
        return view('data-master.opd.form', compact('model'));
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
            'nama_opd' => 'required',
            'singkatan' => 'required'
        ]);

        $model = Opd::create($request->all());
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
        $model = Opd::findOrFail($id);
        return view('data-master.opd.form', compact('model'));
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
            'nama_opd' => 'required',
            'singkatan' => 'required'
        ]);

        $opd = Opd::findOrFail($id);

        $opd->nama_opd = $request->nama_opd;
        $opd->singkatan = $request->singkatan;
        $opd->update();

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
        $model = Opd::findOrFail($id);
        $model->delete();
        return response()->json([
            'status' => 'true',
            'messages' => 'Data Berhasil dihapus'
        ]);
    }

    public function dataTable()
    {
        $model = Opd::query();
        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('data-master.opd._action', [
                    'model' => $model,
                    'url_edit' => route('opd.edit', $model->id),
                    'url_destroy' => route('opd.destroy', $model->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
