@extends('frontendv2.layouts.master')
@section('title')
    Beranda
@endsection
@push('style')
@endpush

@push('script')
@endpush

@section('content')
    <!-- BANNER -->
    <div class="banner">
        <div class="owl-carousel owl-theme full-screen">
            <!-- Item 1 -->
            <div class="item">
                <img src="{{ asset('images/banner_3_bg.png') }}" alt="Slider">
                <div class="container d-flex align-items-center h-left">
                    <div class="wrap-caption">
                        <h1 class="caption-heading">THINK BUSINESS THINK COXE</h1>
                        <p class="uk24">Be Creative. Innovative. & Inspirative</p>
                        <a href="#" class="btn btn-primary">DISCOVER MORE</a> &nbsp;
                        <a href="#" class="btn btn-primary">PURCHASE NOW</a>
                    </div>
                </div>
            </div>
            <!-- Item 2 -->
            {{-- <div class="item">
                <img src="images/dummy-img-1920x900-2.jpg" alt="Slider">
                <div class="container d-flex align-items-center h-center">
                    <div class="wrap-caption">
                        <h1 class="caption-heading">THINK BUSINESS THINK COXE</h1>
                        <p class="uk24">Be Creative. Innovative. & Inspirative</p>
                        <a href="#" class="btn btn-primary">DISCOVER MORE</a> &nbsp;
                        <a href="#" class="btn btn-primary">PURCHASE NOW</a>
                    </div>
                </div>
            </div> --}}
        </div>
        {{-- <div class="custom-nav owl-nav"></div> --}}
    </div>

    <!-- CTA -->
    <div class="section bg-primary">
        <div class="content-wrap py-5">
            <div class="container">

                <div class="row align-items-center">
                    <div class="col-sm-12 col-md-12">
                        <div class="cta-1">
                            <div class="body-text text-white mb-3">
                                <h3 class="my-1">Grow Up Your Business With Coxe</h3>
                                <p class="uk18 mb-0">We provide high standar clean website for your business solutions</p>
                            </div>
                            <div class="body-action mt-3">
                                <a href="#" class="btn btn-secondary">PURCHASE NOW</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- ABOUT -->
    <div class="section">
        <div class="content-wrap">
            <div class="container">

                <div class="row">

                    <div class="col-sm-12 col-md-12">
                        <h2 class="section-heading text-center">
                            Layanan Diskominfo Kota Jambi
                        </h2>
                        <p class="subheading text-center mb-5">
                            {{-- Layanan Teknologi Informasi Komunikasi Dinas Kominfo menyediakan beberapa solusi Teknologi
                            Informasi untuk meningkatkan kinerja OPD pada Pemerintah Kota Jambi, yang mencakup:
                            Pembuatan Aplikasi, Pembaruan Aplikasi,
                            Permintaan SubDomain jambikota.go.id. --}}
                            Ajukan permohonan layanan yang anda butuhkan kepada Diskominfo Kota Jambi.
                        </p>
                    </div>

                </div>

                <div class="row">
                    <!-- Item 1 -->
                    <div class="col-sm-12 col-md-12 col-lg-4 mb-2">
                        <div class="box-icon-1 text-center">
                            <div class="icon">
                                <i class="fa fa-paint-brush"></i>
                            </div>
                            <div class="body-content">
                                <h4>Pembuatan Aplikasi</h4>
                                <p>Melayani Pembuatan Aplikasi OPD di Kota Jammbi</p>
                            </div>
                        </div>
                    </div>
                    <!-- Item 2 -->
                    <div class="col-sm-12 col-md-12 col-lg-4 mb-2">
                        <div class="box-icon-1 text-center">
                            <div class="icon">
                                <i class="fa fa-gears"></i>
                            </div>
                            <div class="body-content">
                                <h4>Pengembangan Aplikasi</h4>
                                <p>Melayani Permohonan Pengembangan / Upgrade Aplikasi OPD</p>
                            </div>
                        </div>
                    </div>
                    <!-- Item 3 -->
                    <div class="col-sm-12 col-md-12 col-lg-4 mb-2">
                        <div class="box-icon-1 text-center">
                            <div class="icon">
                                <i class="fa fa-rocket"></i>
                            </div>
                            <div class="body-content">
                                <h4>Permintaan Domain</h4>
                                <p>Melayanani Permintaan Layanan Domain/Hosting</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- CTA -->
    <div class="section bgi-cover-center cta" data-background="images/dummy-img-1920x900.jpg">
        <div class="content-wrap">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
                        <div class="text-center">
                            <h2 class="text-white">COXE PRESENTATION</h2>
                            <p class="uk18 text-white">Click this video to explore more</p>
                            <a href="https://www.youtube.com/watch?v=vNDrLjOmUY4" class="popup-youtube btn-video"><i
                                    class="fa fa-play fa-2x"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- WHO WE ARE -->
    <div class="section bg-gray-light">
        <div class="content-wrap">
            <div class="container">


                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <h2 class="section-heading text-left">
                            WHO WE ARE?
                        </h2>

                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dolore mque
                            laudantium, totam rem aperiam, eaque ipsa quae ab illo invent.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                        <a href="#" class="btn btn-primary">READ MORE</a>
                        <div class="spacer-30"></div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-6">

                        <div id="whoweare" class="whoweare owl-carousel owl-theme" data-background="images/laptop.png">
                            <!-- Item 1 -->
                            <div class="item">
                                <img src="images/dummy-img-600x400.jpg" alt="">
                            </div>
                            <!-- Item 2 -->
                            <div class="item">
                                <img src="images/dummy-img-600x400.jpg" alt="">
                            </div>
                            <!-- Item 3 -->
                            <div class="item">
                                <img src="images/dummy-img-600x400.jpg" alt="">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>





    <!-- LATEST NEWS -->
    <div class="section">
        <div class="content-wrap">
            <div class="container">

                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <h2 class="section-heading text-center no-after mb-5">
                            Berita / Informasi
                        </h2>
                        <p class="subheading text-center">We provide high standar clean website for your business solutions
                        </p>
                    </div>
                </div>

                <div class="row mt-4">
                    @foreach ($berita as $b)
                        <!-- Item 1 -->
                        <div class="col-sm-12 col-md-12 col-lg-4">
                            <div class="rs-news-1 mb-1">
                                <div class="media-box">

                                    <a href="{{ url('news/' . $b->slug) }}">
                                        <img src="{{ $b->getThumbnailBerita() }}"
                                            style="object-fit: contain; position: relative; width: 100%; height: 300px; overflow: hidden;"
                                            alt="" class="img-fluid">
                                    </a>
                                </div>
                                <div class="body-box">
                                    {{ TanggalAja($b->created_at) }}
                                    <div class="title"><a href="{{ url('news/' . $b->slug) }}">{{ $b->judul }}</a>
                                    </div>
                                    <a href="{{ url('news/' . $b->slug) }}" target="_self" class="btn btn-primary">
                                        Baca Selengkapnya
                                        <i class="envy envy-right-arrow"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>

                <div class="row mt-4">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="text-center">
                            <a href="{{ url('informasi') }}" class="btn btn-primary">Lihat Semua Informasi</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- OUR PARTNERS -->
    <div class="section bg-gray-light">
        <div class="content-wrap py-5">
            <div class="container">

                {{-- <div class="row">
                    <div class="col-12">
                        <h2 class="section-heading text-center">
                            OUR CLIENTS
                        </h2>
                    </div>
                </div> --}}
                <div class="row gutter-5">
                    <div class="col-6 col-md-4 col-lg-2">
                        <a href="#"><img src="{{ asset('images') }}/logo_aplikasi/s_ppid.png"
                                style="object-fit: contain; position: relative; width: 250px; overflow: hidden;"
                                alt="" class="img-fluid img-border"></a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <a href="#"><img src="{{ asset('images') }}/logo_aplikasi/s_satu_data.png"
                                style="object-fit: contain; position: relative; width: 250px; overflow: hidden;"
                                alt="" class="img-fluid img-border"></a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <a href="#"><img src="{{ asset('images') }}/logo_aplikasi/s_sikoja.png"
                                style="object-fit: contain; position: relative; width: 250px; overflow: hidden;"
                                alt="" class="img-fluid img-border"></a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <a href="#"><img src="{{ asset('images') }}/logo_aplikasi/s_simerah.png"
                                style="object-fit: contain; position: relative; width: 250px; overflow: hidden;"
                                alt="" class="img-fluid img-border"></a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <a href="#"><img src="{{ asset('images') }}/logo_aplikasi/s_sipaduko.png"
                                style="object-fit: contain; position: relative; width: 250px; overflow: hidden;"
                                alt="" class="img-fluid img-border"></a>
                    </div>

                    <div class="col-6 col-md-4 col-lg-2">
                        <a href="#"><img src="{{ asset('images') }}/logo_aplikasi/s_sipaduko.png"
                                style="object-fit: contain; position: relative; width: 250px; overflow: hidden;"
                                alt="" class="img-fluid img-border"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
