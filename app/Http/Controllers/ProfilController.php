<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Hash;
use Intervention\Image\ImageManagerStatic as Image;
use File;
use Auth;

class ProfilController extends Controller
{
    function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $id = auth()->user()->uuid;
        $data = User::where('uuid', $id)->first();
        return view('users.profil.index', compact('data'));
    }

    public function update_profil(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:5048'
        ]);

        $user = User::where('uuid', $id)->firstOrfail();
        DB::beginTransaction();
        try {
            $user->name        = $request->name;
            $user->email       = $request->email;

            if ($request->hasFile('photo')) {
                if ($user->photo != "") {
                    File::delete('images/profil/' . $user->photo);
                }

                $foto = $request->file('photo');
                $image_name1 = str_replace(' ', '_', $request->name) . '_' . kode_acak(5) . '.' . $foto->getClientOriginalExtension();
                $image_resize = Image::make($foto->getRealPath());
                $image_resize->resize(500, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $image_resize->save(public_path('images/profil/') . $image_name1);
                $user->photo       = $image_name1;
            }
            $user->save();

            DB::commit();
            return redirect('/profil')->with('success', 'Profil Berhasil Di Update');
        } catch (\Exception $e) {
            //dd($e);
            DB::rollback();
            return redirect()->back()->with('gagal', 'Data Gagal Diinput');
        }
    }

    public function ganti_password_profil(Request $request)
    {
        $user = Auth::user();
        $userPassword = $user->password;
        if (!Hash::check($request->password_lama, $userPassword)) {
            return back()->withErrors(['password_lama' => 'Password Lama Salah']);
        }

        $this->validate($request, [
            'password_lama' => 'required',
            'password'      => 'required|min:8',
            'password_baru' => 'required|min:8|required_with:password|same:password',
        ]);

        //$user = User::where('uuid',$id)->firstOrfail();
        $user->password = Hash::make($request->password_baru);
        $user->update();

        return redirect('/profil')->with('success', 'Password Berhasil dirubah');
    }
}
