<?php

namespace App\Http\Controllers;

use App\Models\Opd;
use Illuminate\Http\Request;
use App\Http\Requests\PendaftaranRequest;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Hash;

class DaftarController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $opd = Opd::all();
        return view('auth.register', compact('opd'));
    }

    public function store(PendaftaranRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = new User();
            $user->name             = $request->name;
            $user->username         = $request->username;
            $user->email            = $request->email;
            $user->opd_id           = $request->opd_id;
            $user->password         = Hash::make($request->password_confirmation);
            $user->role             = 'user';
            $user->save();

            $user->assignRole('user');

            DB::commit();
            return redirect('/daftar/berhasil/' . $user->uuid)->with('sukses', 'Pendaftaran Berhasil');
        } catch (\Exception $e) {
            //dd($e);
            DB::rollback();
            return redirect()->back()->with('gagal', $e->getMessage());
        }
    }

    public function berhasil($id)
    {
        $user = User::where('uuid', $id)->first();
        return view('auth.daftar_berhasil', compact('user'));
    }

    public function reloadCaptcha()
    {
        return response()->json(['captcha' => captcha_img('flat')]);
    }
}
