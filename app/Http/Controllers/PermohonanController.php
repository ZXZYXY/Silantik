<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PermohonanController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
    }

    public function pembuatan()
    {
        return view('permohonan.pembuatan_index');
    }

    public function pembaharuan()
    {
        return view('permohonan.pembaharuan_index');
    }
}
