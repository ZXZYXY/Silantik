@extends('frontendv2.layouts.master')
@section('title')
    Detail Informasi
@endsection
@push('style')
@endpush

@push('script')
@endpush

@section('content')
    <!-- start page title area-->
    <div class="page-title-area bg-thin">
        <div class="container">
            <div class="page-title-content">
                <h1>Detail Informasi</h1>
                <ul>
                    <li class="item"><a href="/">Beranda</a></li>
                    <li class="item"><a href="#">Detail Informasi</a></li>
                </ul>
            </div>
        </div>
        <div class="shape">
            <span class="shape1"></span>
            <span class="shape2"></span>
            <span class="shape3"></span>
            <span class="shape4"></span>
        </div>
    </div>
    <!-- end page title area -->
    <!-- Start Blog Details section -->
    <section class="blog-details-section ptb-100 bg-thin">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="blog-details-desc">


                        <div class="content">
                            <h2>{{ $berita->judul }}</h2>
                            <ul class="post-meta">
                                <li>
                                    <i class="envy envy-calendar"></i>
                                    <a href="#">{{ TanggalAja($berita->created_at) }}</a>
                                </li>

                            </ul>
                            <div class="image">
                                <img src="{{ $berita->getThumbnailBerita() }}" alt="image" style="border-radius:10px;" />
                                <hr />
                            </div>
                            {!! $berita->isi !!}
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <aside class="widget-area">
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



                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- End Blog Details Area -->
@endsection
