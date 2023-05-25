<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.home');
    }

    public function news()
    {
        $berita = Berita::with('kategori')->orderBy('id', 'desc')->paginate(2);
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
