@extends('frontend.layouts.master')
@section('title')
    Detail Informasi
@endsection
@push('style')
@endpush

@push('script')
@endpush

@section('content')
    <!-- Start Breadcrumb
                    ============================================= -->
    <div class="breadcrumb-area shadow dark bg-fixed text-center padding-xl text-light"
        style="background-image: url(assets/img/2440x1578.png);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h1>Blog Single</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Blog</a></li>
                        <li class="active">Single</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->
    <!-- Start Blog ============================================= -->
    <div id="blog" class="blog-area bg-gray full-width single default-padding">
        <div class="container">
            <div class="row">
                <div class="blog-items">
                    <div class="col-lg-8 col-md-8">
                        <div class="item">
                            <div class="thumb text-center">
                                <img src="{{ $berita->getThumbnailBerita() }}" width="100%" alt="Thumb">
                            </div>
                            <div class="info">
                                <div class="meta">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <img src="assets/img/100x100.png" alt="Author">
                                                <span>Author</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fas fa-calendar"></i>
                                                <span>{{ TanggalAja($berita->created_at) }}</span>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                                <h3>{{ $berita->judul }}</h3>
                                {!! $berita->isi !!}
                                <div class="post-tags">
                                    <span>Tags: </span>
                                    <a href="#">Consulting</a>
                                    <a href="#">Planing</a>
                                    <a href="#">Business</a>
                                    <a href="#">Fashion</a>
                                </div>
                                <div class="post-pagi-area">
                                    <a href="#"><i class="fas fa-arrow-left"></i> Previus Post</a>
                                    <a href="#">Next Post <i class="fas fa-arrow-right"></i></a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <section class="widget widget-categories">
                            <h5 class="widget-title">Kategori</h5>
                            <ul class="categorie-list">
                                @foreach ($kategori as $k)
                                    <li>
                                        <a href="{{ url('news/kategori/' . $k->kategori_seo) }}">{{ $k->nama_kategori }}</a>
                                        <span class="total">{{ jml_berita($k->id) }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </section>
                        <section class="widget widget-article">
                            <h5 class="widget-title">Berita Terkait</h5>
                            @foreach ($recent_news as $rn)
                                <article>
                                    <a href="{{ url('news/' . $rn->slug) }}" class="article-img">
                                        <img src="{{ $rn->getThumbnailBerita() }}" alt="blog-image"
                                            style="object-fit: cover; position: relative; width: 100%; height: 160px; overflow: hidden; border-radius:10px;" />
                                    </a>
                                    <div class="info mt-3">
                                        <span class="time"><i class="envy envy-calendar"></i>
                                            {{ TanggalAja($rn->created_at) }}</span>
                                        <h6 class="title">
                                            <a href="{{ url('news/' . $rn->slug) }}">{{ $rn->judul }} </a>
                                        </h6>
                                    </div>
                                </article>
                                <hr>
                            @endforeach



                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog -->
@endsection
