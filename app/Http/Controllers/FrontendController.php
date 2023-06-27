<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Daftaraplikasi;
use App\Models\Kategori;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $berita = Berita::with('kategori')->orderBy('id', 'desc')->limit(3)->get();
        $portofolio = Daftaraplikasi::orderBy('id', 'desc')->limit(3)->get();
        return view('frontend.home', compact('berita', 'portofolio'));
    }

    public function tentang()
    {
        return view('frontend.tentang');
    }

    public function layanan_pembuatan_aplikasi()
    {
        return view('frontend.layanan_pembuatan_aplikasi');
    }

    public function layanan_pembaruan_aplikasi()
    {
        return view('frontend.layanan_pembaruan_aplikasi');
    }

    public function portofolio()
    {
        return view('frontend.portofolio');
    }

    public function portofolio_detail($id)
    {
        $data = Daftaraplikasi::where('id', $id)->orderBy('id', 'desc')->first();
        return view('frontend.portofolio_detail', compact('data'));
    }

    public function news()
    {
        $berita = Berita::with('kategori')->orderBy('id', 'desc')->paginate(6);
        return view('frontend.berita', compact('berita'));
    }

    public function news_detail($slug)
    {
        $berita = Berita::where('slug', $slug)->first();
        $kategori = Kategori::all();
        $recent_news = Berita::with('kategori')->whereNotIn('slug', [$berita->slug])->orderBy('id', 'desc')->limit(5)->get();
        return view('frontend.berita_detail', compact('berita', 'kategori', 'recent_news'));
    }
}
