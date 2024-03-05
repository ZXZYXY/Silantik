<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use App\Models\Faq;

class FaqController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->middleware('permission:faq-list|faq-create|faq-edit|faq-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:faq-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:faq-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:faq-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        return view('faq.index');
    }

    public function dataTable()
    {
        $faq = Faq::select('faq.*')->orderBy('urutan', 'asc');

        return datatables()->of($faq)
            ->addColumn('action', function ($faq) {
                return '<a href="/faq/' . $faq->uuid . '/edit" class="btn btn-warning btn-sm" title="Edit"><i class="lni lni-highlight-alt"></i></a>
                    <button title="Hapus" class="btn btn-danger btn-sm hapus" faq-name="' . $faq->pertanyaan . '" faq-id="' . $faq->uuid . '"><i class="lni lni-trash"></i></button>';
            })
            ->addColumn('jawaban', function ($faq) {
                return $faq->jawaban;
            })
            ->addColumn('publish', function ($faq) {
                if ($faq->publish == 1) {
                    return '<span class="badge bg-success">YA</span>';
                } else {
                    return '<span class="badge bg-danger">TIDAK</span>';
                }
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'jawaban', 'publish'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'pertanyaan' => 'required',
            'jawaban' => 'required',
            'kategori' => 'required',
            'publish' => 'required',
            'urutan' => 'required'
        ]);

        DB::beginTransaction();
        try {

            $faq = new Faq;
            $faq->pertanyaan    = $request->pertanyaan;
            $faq->jawaban       = $request->jawaban;
            $faq->kategori      = $request->kategori;
            $faq->publish      = $request->publish;
            $faq->urutan        = $request->urutan;
            $faq->save();

            DB::commit();
            return redirect('/faq')->with('success', 'Data berhasil Disimpan');
        } catch (\Exception $e) {
            //dd($e);
            DB::rollback();
            return redirect()->back()->with('gagal', 'Data Gagal Diinput');
        }
    }

    public function edit($id)
    {
        $faq = Faq::where('uuid', $id)->firstOrFail();
        return view('faq.edit', compact(['faq']));
    }

    public function update(Request $request, $id)
    {
        $faq = Faq::where('uuid', $id)->firstOrFail();
        $this->validate($request, [
            'pertanyaan' => 'required',
            'jawaban' => 'required',
            'kategori' => 'required',
            'publish' => 'required',
            'urutan' => 'required'
        ]);

        DB::beginTransaction();
        try {

            $faq->pertanyaan    = $request->pertanyaan;
            $faq->jawaban       = $request->jawaban;
            $faq->kategori      = $request->kategori;
            $faq->publish      = $request->publish;
            $faq->urutan        = $request->urutan;
            $faq->save();

            DB::commit();
            return redirect('/faq')->with('success', 'Data berhasil Disimpan');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('gagal', 'Data Gagal Diinput');
        }
    }

    public function delete($id)
    {
        $faq = Faq::where('uuid', $id)->firstOrFail();

        DB::beginTransaction();
        try {
            $faq->delete();
            DB::commit();
            return redirect('/faq')->with('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('gagal', 'Data Gagal Diinput');
        }
    }
}
