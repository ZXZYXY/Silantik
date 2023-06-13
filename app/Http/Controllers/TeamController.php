<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Jabatan;
use DB;
use DataTables;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class TeamController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->middleware('permission:team-list|team-create|team-edit|team-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:team-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:team-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:team-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('team.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Team();
        $jabatan = Jabatan::all();
        return view('team.tambah', compact('model', 'jabatan'));
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
            'nama' => 'required',
            'jabatan_id' => 'required'
        ]);

        $jabatan = Jabatan::where('id', $request->jabatan_id)->first();
        DB::beginTransaction();
        try {
            $data = new Team;
            $data->nama         = $request->nama;
            $data->jabatan_id   = $request->jabatan_id;
            $data->jabatan      = $jabatan->nama_jabatan;

            if ($request->hasFile('foto')) {
                $foto = $request->file('foto');
                $image_name1 = str_replace(' ', '_', $request->nama) . '_' . kode_acak(5) . '.' . $foto->getClientOriginalExtension();
                // for save original image
                $ImageUpload = Image::make($foto->getRealPath());
                $ImageUpload->save(public_path('images/foto_team/') . $image_name1);

                $data->foto = $image_name1;
            }
            $data->save();

            DB::commit();
            return redirect()->route('team.index')->with('success', 'Data Berhasil Ditambah');
        } catch (\Exception $e) {
            //dd($e);
            DB::rollback();
            return redirect()->back()->with('gagal', 'Data Gagal Diinput');
        }
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
        $data = Team::findOrFail($id);
        $jabatan = Jabatan::all();
        return view('team.edit', compact('data', 'jabatan'));
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
            'nama' => 'required',
            'jabatan_id' => 'required'
        ]);

        $jabatan = Jabatan::where('id', $request->jabatan_id)->first();
        DB::beginTransaction();
        try {
            $data = Team::findOrFail($id);

            $data->nama         = $request->nama;
            $data->jabatan_id   = $request->jabatan_id;
            $data->jabatan      = $jabatan->nama_jabatan;

            if ($request->hasFile('foto')) {
                File::delete('images/foto_team/' . $data->foto);
                $foto = $request->file('foto');
                $image_name1 = str_replace(' ', '_', $request->nama) . '_' . kode_acak(5) . '.' . $foto->getClientOriginalExtension();
                // for save original image
                $ImageUpload = Image::make($foto->getRealPath());
                $ImageUpload->save(public_path('images/foto_team/') . $image_name1);

                $data->foto = $image_name1;
            }
            $data->update();

            DB::commit();
            return redirect()->route('team.index')->with('success', 'Data Berhasil Ditambah');
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            return redirect()->back()->with('gagal', 'Data Gagal Diinput');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Team::findOrFail($id);
        File::delete('images/foto_team/' . $model->foto);
        $model->delete();
        return response()->json([
            'status' => 'true',
            'messages' => 'Data Berhasil dihapus'
        ]);
    }

    public function dataTable()
    {
        $data = Team::orderBy('id', 'desc');
        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                $edit = '<a href="' . route('team.edit', $data->id) . '" class="btn btn-warning btn-sm" title="Edit"><i class="lni lni-highlight-alt"></i></a>';
                $hapus = '<button class="btn btn-danger btn-sm hapus" team-name="' . $data->nama . '" team-id="' . $data->id . '" title="Delete"><i class="lni lni-trash"></i></button>';
                if (auth()->user()->can('team-edit') and auth()->user()->can('team-delete')) {
                    return $edit . ' ' . $hapus;
                } elseif (auth()->user()->can('team-edit')) {
                    return $edit;
                } elseif (auth()->user()->can('team-delete')) {
                    return $hapus;
                } else {
                    return 'No Action';
                }
            })
            ->addColumn('foto', function ($data) {
                return '<img src="' . $data->getImageTeam() . '" alt="avatar" style="object-fit: cover; position: relative; width: 50px; height: 50px; overflow: hidden; border-radius: 50%;">';
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'foto'])
            ->make(true);
    }
}
