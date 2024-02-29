@extends('frontend.layouts.master')
@section('title')
    Beranda
@endsection
@push('style')
@endpush

@push('script')
@endpush

@section('content')
    <!-- Start Banner ============================================= -->
    <div id="beranda" class="banner-area fixed-top bg-theme-small bg-cover"
        style="background-image: url(../frontend/img/shape-bg.jpg);">
        <!-- Side Bg -->
        <div class="side-bg">
            <img src="{{ asset('frontend') }}/img/illustrations/2.png" alt="Thumb">
        </div>
        <!-- End Side Bg -->
        <div class="box-table">
            <div class="box-cell">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 left-info">
                            <div class="content" data-animation="animated fadeInUpBig">
                                <h1><span>SILANTIK</span></h1>
                                <p>
                                    SILANTIK adalah Sistem Informasi Layanan Teknologi Informasi Komunikasi yang disediakan
                                    oleh
                                    Dinas Komunikasi dan
                                    Informatika Kota Jambi
                                </p>
                                {{-- <a class="btn-animation border popup-youtube"
                                    href="https://www.youtube.com/watch?v=owhuBrGIOsE">
                                    <i class="fa fa-play"></i> Watch Video
                                </a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner -->

    <!-- Start Features Area ============================================= -->
    <div id="layanan" class="features-area icon-link carousel-shadow default-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-lg-offset-2 col-md-offset-2">
                    <div class="site-heading text-center">
                        <h2>Layanan</h2>
                        {{-- <p>
                            Layanan 
                        </p> --}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="features-items features-carousel owl-carousel owl-theme">

                        <a href="{{ url('layanan/aplikasi') }}">
                            <div class="item">
                                <div class="icon">
                                    <span>01</span>
                                    <i class="flaticon-drag-2"></i>
                                </div>
                                <div class="info">
                                    <h4>Pembuatan <br>Aplikasi</h4>
                                </div>

                            </div>
                        </a>


                        <a href="{{ url('layanan/aplikasi') }}">
                            <div class="item">
                                <div class="icon">
                                    <span>02</span>
                                    <i class="flaticon-software"></i>
                                </div>
                                <div class="info">
                                    <h4>Pembaruan/Pengembangan <br> Aplikasi</h4>
                                </div>
                            </div>
                        </a>

                        <a href="{{ url('layanan/aplikasi') }}">
                            <div class="item">
                                <div class="icon">
                                    <span>03</span>
                                    <i class="flaticon-rgb"></i>
                                </div>
                                <div class="info">
                                    <h4>Permintaan Penggunaan Domain</h4>

                                </div>
                            </div>
                        </a>
                        <!-- End Single Item -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Features Area -->

    <!-- Start About ============================================= -->
    <div id="tentang" class="about-area reverse default-padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6 thumb">
                    <img src="{{ asset('frontend') }}/img/illustrations/6.png" alt="Thumb">
                </div>
                <div class="col-lg-6 col-md-6 info">
                    <h2>Tentang SILANTIK</h2>
                    <p>
                        Layanan Teknologi Informasi Komunikasi Dinas Kominfo menyediakan beberapa solusi Teknologi
                        Informasi untuk meningkatkan kinerja OPD pada Pemerintah Kota Jambi, yang mencakup:

                    </p>
                    <ul>
                        <li>Pembuatan Aplikasi</li>
                        <li>Pembaruan/Pengembangan Aplikasi</li>
                        <li>Permintaan SubDomain jambikota.go.id</li>
                    </ul>
                    <div class="fun-facts">
                        <h3>Total Aplikasi</h3>
                        <div class="row">
                            <div class="col-md-4 col-sm-4 item">
                                <div class="fun-fact">
                                    <div class="timer" data-to="75" data-speed="5000">75</div>
                                    <span class="medium">SELESAI</span>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 item">
                                <div class="fun-fact">
                                    <div class="timer" data-to="100" data-speed="5000">100</div>
                                    <span class="medium">PROSES</span>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 item">
                                <div class="fun-fact">
                                    <div class="timer" data-to="98" data-speed="5000">98</div>
                                    <span class="medium">MENUNGGU</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About -->

    <!-- Start Blog Area  ============================================= -->
    <div id="berita" class="blog-area default-padding bottom-less">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-lg-offset-2 col-md-offset-2">
                    <div class="site-heading text-center">
                        <h2>Informasi</h2>
                        {{-- <p>
                            Learning day desirous informed expenses material returned six the. She enabled invited
                            exposed him another. Reasonably conviction solicitude me mr at discretion reasonable. Age
                            out full gate bed day lose.
                        </p> --}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="blog-items">

                    @foreach ($berita as $b)
                        <!-- Single Item -->
                        <div class="col-md-4 single-item">
                            <div class="item">
                                <div class="thumb">
                                    <a href="{{ url('news/' . $b->slug) }}"><img src="{{ $b->getThumbnailBerita() }}"
                                            alt="Thumb"
                                            style="object-fit: contain; position: relative; width: 100%; height: 300px; overflow: hidden;"></a>
                                </div>
                                <div class="info">
                                    <div class="content">
                                        <div class="date">
                                            {{ TanggalAja($b->created_at) }}
                                        </div>
                                        <h4>
                                            <a href="{{ url('news/' . $b->slug) }}">{{ $b->judul }}</a>
                                        </h4>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- Single Item -->
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <!-- End Blog Area -->

    <!-- Start Faq ============================================= -->
    <div id="faq" class="faq-area bg-gray default-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-5 thumb">
                    <img src="{{ asset('frontend') }}/img/illustrations/2.svg" alt="Thumb">
                </div>
                <div class="col-md-7 faq-items">
                    <div class="heading">
                        <h2>Answer & Question</h2>
                    </div>
                    <!-- Start Accordion -->
                    <div class="acd-items acd-arrow">
                        <div class="panel-group symb" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#ac1">
                                            Do I need a business plan?
                                        </a>
                                    </h4>
                                </div>
                                <div id="ac1" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <p>
                                            Removing welcomed civility or hastened is. Justice elderly but perhaps
                                            expense six her are another passage. Full her ten open fond walk not
                                            down.For request general express unknown are. journey greatly or garrets.
                                            Draw door kept do so come on open mean. Estimating stimulated how reasonably
                                            precaution diminution she simplicity sir but. Questions am sincerity
                                            zealously concluded consisted or no gentleman it.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#ac2">
                                            How long should a business plan be?
                                        </a>
                                    </h4>
                                </div>
                                <div id="ac2" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>
                                            Removing welcomed civility or hastened is. Justice elderly but perhaps
                                            expense six her are another passage. Full her ten open fond walk not
                                            down.For request general express unknown are. journey greatly or garrets.
                                            Draw door kept do so come on open mean. Estimating stimulated how reasonably
                                            precaution diminution she simplicity sir but. Questions am sincerity
                                            zealously concluded consisted or no gentleman it.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#ac3">
                                            Where do I start?
                                        </a>
                                    </h4>
                                </div>
                                <div id="ac3" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>
                                            Removing welcomed civility or hastened is. Justice elderly but perhaps
                                            expense six her are another passage. Full her ten open fond walk not
                                            down.For request general express unknown are. journey greatly or garrets.
                                            Draw door kept do so come on open mean. Estimating stimulated how reasonably
                                            precaution diminution she simplicity sir but. Questions am sincerity
                                            zealously concluded consisted or no gentleman it.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Accordion -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Faq  -->
@endsection
