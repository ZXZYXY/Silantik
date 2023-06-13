<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DataTables;
use App\Models\Statuspermohonan;

class StatuspermohonanController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->middleware('permission:statuspermohonan-list|statuspermohonan-create|statuspermohonan-edit|statuspermohonan-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:statuspermohonan-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:statuspermohonan-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:statuspermohonan-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('data-master.statuspermohonan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Statuspermohonan();
        return view('data-master.statuspermohonan.form', compact('model'));
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
            'nama_status' => 'required'
        ]);

        $model = Statuspermohonan::create($request->all());
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
        $model = Statuspermohonan::findOrFail($id);
        return view('data-master.statuspermohonan.form', compact('model'));
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
            'nama_status' => 'required'
        ]);

        $statuspermohonan = Statuspermohonan::findOrFail($id);

        $statuspermohonan->nama_status = $request->nama_status;
        $statuspermohonan->update();

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
        $model = Statuspermohonan::findOrFail($id);
        $model->delete();
        return response()->json([
            'status' => 'true',
            'messages' => 'Data Berhasil dihapus'
        ]);
    }

    public function dataTable()
    {
        $model = Statuspermohonan::query();
        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('data-master.statuspermohonan._action', [
                    'model' => $model,
                    'url_edit' => route('statuspermohonan.edit', $model->id),
                    'url_destroy' => route('statuspermohonan.destroy', $model->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
