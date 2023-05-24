<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Kategori;
use DB;
use DataTables;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class BeritaController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->middleware('permission:berita-list|berita-create|berita-edit|berita-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:berita-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:berita-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:berita-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('berita.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('berita.tambah', compact('kategori'));
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
            'judul' => 'required',
            'isi' => 'required',
            'published' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:5048'
        ]);
        DB::beginTransaction();
        try {
            $berita = new Berita;
            $berita->judul          = $request->judul;
            $berita->published      = $request->published;
            $berita->kategori_id       = $request->kategori_id;
            $berita->user_id        = auth()->user()->id;
            $berita->isi            = $request->isi;

            if ($request->hasFile('gambar')) {
                $foto = $request->file('gambar');
                $image_name1 = str_replace(' ', '_', $request->judul) . '_' . kode_acak(5) . '.' . $foto->getClientOriginalExtension();
                // for save original image
                $ImageUpload = Image::make($foto->getRealPath());
                $ImageUpload->save(public_path('images/berita/') . $image_name1);

                // for save thumbnail image
                $ImageUpload->resize(500, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $ImageUpload->save(public_path('images/berita/thumb/') . $image_name1);

                $berita->gambar = $image_name1;
            }
            $berita->save();

            DB::commit();
            return redirect()->route('berita.index')->with('success', 'Data Berhasil Ditambah');
        } catch (\Exception $e) {
            dd($e);
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
        $data = Berita::findOrFail($id);
        $kategori = Kategori::all();
        return view('berita.edit', compact('data', 'kategori'));
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
            'judul' => 'required',
            'isi' => 'required',
            'published' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:5048'
        ]);
        DB::beginTransaction();
        try {
            $berita = Berita::findOrFail($id);
            $berita->judul          = $request->judul;
            $berita->slug           = null;
            $berita->published      = $request->published;
            $berita->kategori_id    = $request->kategori_id;
            $berita->isi            = $request->isi;

            if ($request->hasFile('gambar')) {
                $foto = $request->file('gambar');
                $image_name1 = str_replace(' ', '_', $request->judul) . '_' . kode_acak(5) . '.' . $foto->getClientOriginalExtension();
                // for save original image
                $ImageUpload = Image::make($foto);
                $ImageUpload->save(public_path('images/berita/' . $image_name1));

                // for save thumbnail image
                $ImageUpload->resize(500, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $ImageUpload->save(public_path('images/berita/thumb/' . $image_name1));

                $berita->gambar = $image_name1;
            }
            $berita->save();

            DB::commit();
            return redirect()->route('berita.index')->with('success', 'Data Berhasil Ditambah');
        } catch (\Exception $e) {
            //dd($e);
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
        $model = Berita::findOrFail($id);
        $model->delete();
        File::delete('images/berita/' . $model->gambar);
        File::delete('images/berita/thumb/' . $model->gambar);
        return response()->json([
            'status' => 'true',
            'messages' => 'Data Berhasil dihapus'
        ]);
    }

    public function dataTable()
    {
        $data = Berita::orderby('id', 'desc');

        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                $edit = '<a href="' . route('berita.edit', $data->id) . '" class="btn btn-warning btn-sm" title="Edit"><i class="lni lni-highlight-alt"></i></a>';
                $hapus = '<button class="btn btn-danger btn-sm hapus" berita-name="' . $data->judul . '" berita-id="' . $data->id . '" title="Delete"><i class="lni lni-trash"></i></button>';
                if (auth()->user()->can('berita-edit') and auth()->user()->can('berita-delete')) {
                    return $edit . ' ' . $hapus;
                } elseif (auth()->user()->can('berita-edit')) {
                    return $edit;
                } elseif (auth()->user()->can('berita-delete')) {
                    return $hapus;
                } else {
                    return 'No Action';
                }
            })

            ->addColumn('gambar', function ($data) {
                return '<a href="' . $data->getImageBerita() . '" target="_blank"><img src="' . asset('images/berita/thumb/' . $data->gambar) . '" width="100px"></a>';
            })

            ->addColumn('status', function ($data) {
                if ($data->published == '1') {
                    return '<span class="badge bg-success">YA</span>';
                } else {
                    return '<span class="badge bg-danger">TIDAK</span>';
                }
            })


            ->addIndexColumn()
            ->rawColumns(['action', 'status', 'gambar'])
            ->make(true);
    }
}
