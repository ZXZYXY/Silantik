<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.home');
    }

    public function news()
    {
        $berita = Berita::orderBy('id', 'desc')->paginate(1);
        return view('frontend.berita', compact('berita'));
    }

    public function news_detail($slug)
    {
        $berita = Berita::where('slug', $slug)->first();
        return view('frontend.berita_detail', compact('berita'));
    }
}
