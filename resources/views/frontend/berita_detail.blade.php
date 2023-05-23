@extends('frontend.layouts.master')
@section('title')
    Berita Detail
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
                <h1>Detail Berita</h1>
                <ul>
                    <li class="item"><a href="index.html">Home</a></li>
                    <li class="item"><a href="blog-details.html">Detail Berita</a></li>
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
                        <div class="image">
                            <img src="{{ $berita->getThumbnailBerita() }}" alt="image" />
                        </div>
                        <ul class="post-meta">
                            <li><i class="envy envy-calendar"></i><a
                                    href="#">{{ TanggalAja($berita->created_at) }}</a></li>

                        </ul>
                        <div class="content">
                            <h2>{{ $berita->judul }}</h2>
                            {!! $berita->isi !!}
                        </div>



                        <div class="article-share">
                            <div class="tags pb-3">
                                <span>tags:</span>
                                <a href="#">Design</a>
                                <a href="#">Development</a>
                                <a href="#">Technique</a>
                            </div>
                            <div class="social-link">
                                <a href="#" class="bg-tertiary" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="bg-success" target="_blank"><i class="fab fa-tumblr"></i></a>
                                <a href="#" class="bg-danger" target="_blank"><i class="fab fa-youtube"></i></a>
                                <a href="#" class="bg-info" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#" class="bg-pink" target="_blank"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <hr />


                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <aside class="widget-area">

                        <section class="widget widget-article">
                            <h5 class="widget-title">Recent articles</h5>
                            <article class="article-item">
                                <a href="#" class="article-img">
                                    <img src="assets/img/blog/recent_article_1.png" alt="blog-image" />
                                </a>
                                <div class="info">
                                    <span class="time"><i class="envy envy-calendar"></i>Sepetember 31, 2021</span>
                                    <h6 class="title">
                                        <a href="#">The Biggest Mistake When Setting New Goals. </a>
                                    </h6>
                                </div>
                            </article>

                            <article class="article-item">
                                <a href="#" class="article-img">
                                    <img src="assets/img/blog/recent_article_2.png" alt="blog-image" />
                                </a>
                                <div class="info">
                                    <span class="time"><i class="envy envy-calendar"></i>Sepetember 31, 2021</span>
                                    <h6 class="title">
                                        <a href="#">The Biggest Mistake When Setting New Goals. </a>
                                    </h6>
                                </div>
                            </article>

                            <article class="article-item">
                                <a href="#" class="article-img">
                                    <img src="assets/img/blog/recent_article_3.png" alt="blog-image" />
                                </a>
                                <div class="info">
                                    <span class="time"><i class="envy envy-calendar"></i>Sepetember 31, 2021</span>
                                    <h6 class="title">
                                        <a href="#">The Biggest Mistake When Setting New Goals. </a>
                                    </h6>
                                </div>
                            </article>
                        </section>
                        <section class="widget widget-categories">
                            <h5 class="widget-title">Categories</h5>
                            <ul class="categorie-list">
                                <li>
                                    <a href="#">Design</a>
                                    <span class="total">17</span>
                                </li>
                                <li>
                                    <a href="#">Development</a>
                                    <span class="total">34</span>
                                </li>
                                <li>
                                    <a href="#">Innovation</a>
                                    <span class="total">10</span>
                                </li>
                                <li>
                                    <a href="#">research</a>
                                    <span class="total">35</span>
                                </li>
                            </ul>
                        </section>


                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- End Blog Details Area -->
@endsection
