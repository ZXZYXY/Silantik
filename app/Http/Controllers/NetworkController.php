<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Network;
use App\Models\Opd;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

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
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'opd_id' => 'required|integer|exists:opd,id', // Ganti dengan nama tabel dan kolom yang sesuai
            'lokasi' => 'required|string',
            'latitude' => 'required|numeric',
            'status' => 'required|string',
            'longitude' => 'required|numeric',
            'jarak_kabel' => 'nullable|string',
            'jumlah_aksespoint' => 'required|integer',
            'jenis_koneksi' => 'required|string|in:GPON,SFP', // Validasi jenis koneksi
            // Tambahkan validasi untuk field lain jika diperlukan
        ]);

        // Simpan data ke database
        $network = new Network(); // Ganti dengan nama model yang sesuai
        $network->uuid = Str::uuid(); // Generate UUID secara acak
        $network->opd_id = $request->opd_id;
        $network->alamat = $request->input('lokasi');
        $network->status = $request->status;
        $network->latitude = $request->latitude;
        $network->longitude = $request->longitude;
        $network->jarak_kabel = $request->jarak_kabel;
        $network->jumlah_aksespoint = $request->jumlah_aksespoint;
        $network->jenis_koneksi = $request->jenis_koneksi;

        // Simpan data ke database
        $network->save();

        // Redirect atau tampilkan pesan sukses
        return redirect()->route('network.index', ['uuid' => $network->uuid]) // Ganti dengan route yang sesuai
                         ->with('success', 'Data infrastruktur jaringan berhasil ditambahkan.');
    }

    public function show($uuid)
    {
        $network = Network::where('uuid', $uuid)->firstOrFail();
        return view('network.detail', compact('network'));
    }

    public function edit($uuid)
    {
        // Temukan data network berdasarkan UUID
        $network = Network::where('uuid', $uuid)->firstOrFail();
        
        // Ambil daftar OPD dari database
        $opd = Opd::all();

        // Kirim data network dan opd ke view
        return view('network.edit', compact('network', 'opd'));
    }

    public function update(Request $request, $uuid)
    {
        // Validasi input
        $request->validate([
            'opd_id' => 'required|integer|exists:opd,id',
            'lokasi' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'jarak_kabel' => 'nullable|string',
            'jumlah_aksespoint' => 'required|integer',
            'jenis_koneksi' => 'required|string|in:GPON,SFP',
        ]);

        // Cari data network berdasarkan UUID
        $network = Network::where('uuid', $uuid)->firstOrFail();

        // Update data di database
        $network->opd_id = $request->opd_id;
        $network->alamat = $request->input('lokasi');
        $network->latitude = $request->latitude;
        $network->longitude = $request->longitude;
        $network->jarak_kabel = $request->jarak_kabel;
        $network->jumlah_aksespoint = $request->jumlah_aksespoint;
        $network->jenis_koneksi = $request->jenis_koneksi;

        // Simpan perubahan
        $network->save();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('network.index')->with('success', 'Data infrastruktur jaringan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $model = Network::where('uuid', $id);
        $model->delete();

        return response()->json([
            'status' => 'true',
            'messages' => 'Data Berhasil dihapus'
        ]);
    }



}
