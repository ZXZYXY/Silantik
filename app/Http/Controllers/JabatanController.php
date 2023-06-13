<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DataTables;
use App\Models\Jabatan;

class JabatanController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->middleware('permission:jabatan-list|jabatan-create|jabatan-edit|jabatan-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:jabatan-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:jabatan-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:jabatan-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('data-master.jabatan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Jabatan();
        return view('data-master.jabatan.form', compact('model'));
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
            'nama_jabatan' => 'required'
        ]);

        $model = Jabatan::create($request->all());
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
        $model = Jabatan::findOrFail($id);
        return view('data-master.jabatan.form', compact('model'));
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
            'nama_jabatan' => 'required'
        ]);

        $jabatan = Jabatan::findOrFail($id);

        $jabatan->nama_jabatan = $request->nama_jabatan;
        $jabatan->update();

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
        $model = Jabatan::findOrFail($id);
        $model->delete();
        return response()->json([
            'status' => 'true',
            'messages' => 'Data Berhasil dihapus'
        ]);
    }

    public function dataTable()
    {
        $model = Jabatan::query();
        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('data-master.jabatan._action', [
                    'model' => $model,
                    'url_edit' => route('jabatan.edit', $model->id),
                    'url_destroy' => route('jabatan.destroy', $model->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
