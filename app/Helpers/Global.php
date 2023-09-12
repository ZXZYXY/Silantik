<?php

use App\Models\User;
use App\Models\Konfigurasiweb;
use App\Models\Berita;
use App\Models\Pengaduan;
use App\Models\Permohonan;
use GuzzleHttp\Client;

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

function jml_berita($kategori_id)
{
    $kategori_jml = Berita::where('kategori_id', $kategori_id)->count();

    return $kategori_jml;
}

function jml_permohonan_baru()
{
    $permohonan = Permohonan::where('status', 'Permohonan Baru')->count();
    return $permohonan;
}

function jml_jenis_permohonan_baru($jenis)
{
    $permohonan = Permohonan::where('status', 'Permohonan Baru')->where('jenis_permohonan', $jenis)->count();
    return $permohonan;
}

function jml_pengaduan_baru()
{
    $pengaduan = Pengaduan::where('status', null)->count();
    return $pengaduan;
}

function searchNip($nip)
{
    try {
        $server = 'https://siap-koja.jambikota.go.id/api/checkUser?nip=' . $nip;
        $client = new Client();
        $res = $client->request('GET', $server, [
            'auth' => ['client1', 'api-siap-koja'],
            'timeout' => 10,
            'connect_timeout' => 10

        ]);
        $body = $res->getBody()->getContents();
        return json_decode($body);
    } catch (Throwable $e) {
        return null;
    } catch (ClientException $e) {
        return null;
    } catch (BadResponseException $e) {
        return null;
    } catch (RequestException $e) {
        return null;
    } catch (GuzzleException $e) {
        return null;
    } catch (ConnectException $e) {
        return null;
    } catch (ServerException $e) {
        return null;
    }
}

function sendNotifWA($message, $date, $received)
{

    $curl = curl_init();

    $headers = [
        'apikey: a60d2f76e76de6ebff071f36373d243c3ef8fc47',
        'Accept: application/json'
    ];

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://starsender.online/api/v2/sendFiles?message=' . rawurlencode($message) . '&tujuan=' . rawurlencode($received . '@s.whatsapp.net') . '&jadwal=' . rawurlencode($date),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        //CURLOPT_POSTFIELDS => array('file' => $file),
        CURLOPT_HTTPHEADER => $headers,
    ));


    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);


    $response = curl_exec($curl);


    curl_close($curl);
    echo $response;
}
