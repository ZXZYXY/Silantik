@extends('frontendv2.layouts.master')
@section('title')
    Portofolio
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
                <h1>Portofolio</h1>
                <ul>
                    <li class="item"><a href="/">Beranda</a></li>
                    <li class="item"><a href="#">Portofolio</a></li>
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

    <!-- start gallery section -->
    <section class="gallery-section ptb-100 bg-white">
        <div class="container">
            <div class="section-title">
                <h2>Portofolio APTIKA <br>
                    Diskominfo Kota Jambi</h2>

            </div>
            <div class="gallery-slider owl-carousel">
                <div class="gallery-item">
                    <div class="gallery-image"><img src="{{ asset('aset') }}/img/gallery/gallery_1.jpg"
                            alt="gallery-member" /></div>
                    <div class="gallery-content">
                        <h3>
                            <a href="project-details.html">UI/UX Design</a>
                        </h3>
                    </div>
                </div>
                <!-- gallery-item -->
                <div class="gallery-item">
                    <div class="gallery-image"><img src="{{ asset('aset') }}/img/gallery/gallery_2.jpg"
                            alt="gallery-member" /></div>
                    <div class="gallery-content">
                        <h3>
                            <a href="project-details.html">Mobile Developing</a>
                        </h3>
                    </div>
                </div>
                <!-- gallery-item -->
                <div class="gallery-item">
                    <div class="gallery-image"><img src="{{ asset('aset') }}/img/gallery/gallery_3.jpg"
                            alt="gallery-member" /></div>
                    <div class="gallery-content">
                        <h3>
                            <a href="project-details.html">SEO Optimize</a>
                        </h3>
                    </div>
                </div>
                <!-- gallery-item -->
                <div class="gallery-item">
                    <div class="gallery-image"><img src="{{ asset('aset') }}/img/gallery/gallery_4.jpg"
                            alt="gallery-member" /></div>
                    <div class="gallery-content">
                        <h3>
                            <a href="project-details.html">Web Desiging</a>
                        </h3>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- end gallery section -->
@endsection
