<?php

namespace App\Http\Controllers;

use App\Models\Daftaraplikasi;
use App\Models\Pengaduan;
use App\Models\Permohonan;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['jml_permohonan'] = Permohonan::count();
        $data['jml_pengaduan'] = Pengaduan::count();
        $data['jml_aplikasi'] = Daftaraplikasi::count();
        $data['jml_user'] = User::count();
        return view('home', [
            'data' => $data,
        ]);
    }
}
