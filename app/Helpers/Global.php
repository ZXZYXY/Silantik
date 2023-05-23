<?php

use App\Models\User;
use App\Models\Konfigurasiweb;

if (!function_exists('setActive')) {
    /**
     * setActive
     *
     * @param mixed $path
     * @return void
     */
    function setActive($path)
    {
        return Request::is($path . '*') ? ' mm-active' : '';
    }
}

if (!function_exists('setActive_frontend')) {
    /**
     * setActive_frontend
     *
     * @param mixed $path
     * @return void
     */
    function setActive_frontend($path)
    {
        return Request::is($path . '*') ? ' active' : '';
    }
}

if (!function_exists('openMenu')) {
    /**
     * openMenu
     *
     * @param mixed $path
     * @return void
     */
    function openMenu($path)
    {
        return Request::is($path . '*') ? ' mm-active' : '';
    }
}
if (!function_exists('TanggalID')) {
    /**
     * TanggalID
     *
     * @param mixed $tanggal
     * @return void
     */
    function TanggalID($tanggal)
    {
        $value = Carbon\Carbon::parse($tanggal);
        $parse = $value->locale('id');
        return $parse->translatedFormat('l, d F Y');
    }
}

if (!function_exists('TanggalAja')) {
    /**
     * TanggalID
     *
     * @param mixed $tanggal
     * @return void
     */
    function TanggalAja($tanggal)
    {
        $value = Carbon\Carbon::parse($tanggal);
        $parse = $value->locale('id');
        if ($tanggal == NULL) {
            return '';
        } else {
            return $parse->translatedFormat('d F Y');
        }
    }
}

if (!function_exists('nama_bulan')) {
    /**
     * TanggalID
     *
     * @param mixed $tanggal
     * @return void
     */
    function nama_bulan_pendek($tanggal)
    {
        $value = Carbon\Carbon::parse($tanggal);
        $parse = $value->locale('id');
        return $parse->translatedFormat('M');
    }
}

if (!function_exists('tglnya')) {
    /**
     * TanggalID
     *
     * @param mixed $tanggal
     * @return void
     */
    function tglnya($tanggal)
    {
        $value = Carbon\Carbon::parse($tanggal);
        $parse = $value->locale('id');
        return $parse->translatedFormat('d');
    }
}

if (!function_exists('tahunnya')) {
    /**
     * TanggalID
     *
     * @param mixed $tanggal
     * @return void
     */
    function tahunnya($tanggal)
    {
        $value = Carbon\Carbon::parse($tanggal);
        $parse = $value->locale('id');
        return $parse->translatedFormat('Y');
    }
}

function cek_admin_sekolah($npsn)
{
    $admin = User::where('npsn', $npsn)->count();
    if ($admin > 0) {
        return "( ada )";
    } else {
        return "(   )";
    }
}


function kode_acak($panjang)
{
    $karakter = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $string = '';
    for ($i = 0; $i < $panjang; $i++) {
        $pos = rand(0, strlen($karakter) - 1);
        $string .= $karakter[$pos];
    }
    return $string;
}

function konfigurasi()
{
    $konfigurasi = Konfigurasiweb::where('id', 1)->first();
    return $konfigurasi;
}

function permission()
{
    $id_user = auth()->user()->id;
    $user = User::where('id', $id_user)->first();

    return $user;
}
