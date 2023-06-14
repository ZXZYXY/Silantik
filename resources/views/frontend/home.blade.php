@extends('frontend.layouts.master')
@section('title')
    Beranda
@endsection
@push('style')
@endpush

@push('script')
@endpush

@section('content')
    <!-- start home banner area -->
    <div id="home" class="home-banner-area banner-type-two">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="banner-content">
                        <h1>Layanan APTIKA</h1>
                        <p>
                            LANTIKA adalah Layanan Teknologi Informasi Komunikasi yang disediakan oleh Dinas Komunikasi dan
                            Informatika Kota Jambi
                        </p>
                        {{-- <div class="cta-btn">
                            <a href="../../Solit-html/index.html" class="btn btn-solid">Layanan TIK</a>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="banner-image">
                        <img src="{{ asset('aset') }}/img/banner/banner_2.png" alt="banner" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end sero section-->

    <!-- start top feature section -->
    <section class="top-feature-section ptb-100 bg-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-12">
                    <div class="section-title">
                        {{-- <span class="subtitle">top features</span> --}}
                        <h2>Apa itu Layanan TIK</h2>
                    </div>
                    <div class="feature-text-blc">
                        <p>
                            Layanan Teknologi Informasi Komunikasi Dinas Kominfo menyediakan beberapa solusi Teknologi
                            Informasi untuk meningkatkan kinerja OPD pada Pemerintah Kota Jambi, yang mencakup:
                            Pembuatan Aplikasi, Pembaruan Aplikasi,
                            Permintaan SubDomain jambikota.go.id.
                        </p>
                    </div>
                    <div class="cta-btn">
                        <a href="{{ url('tentang') }}" class="btn btn-solid">Selengkapnya <i
                                class="envy envy-right-arrow"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="single-feature">
                                <div class="single-feature-content">
                                    <i class="envy envy-code2"></i>
                                    <h3 class="mt-3">Pembuatan <br> Aplikasi</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="single-feature">
                                <div class="single-feature-content">
                                    <i class="envy envy-cloud-computing1"></i>
                                    <h3 class="mt-3">Pembaruan Aplikasi</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-sm-12">
                            <div class="single-feature">
                                <div class="single-feature-content">
                                    <i class="envy envy-global"></i>
                                    <h3 class="mt-3">Permintaan Penggunaan Domain</h3>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-lg-6 col-sm-6">
                            <div class="single-feature">
                                <div class="single-feature-content">
                                    <i class="envy envy-server"></i>
                                    <h3 class="mt-3">Hosting Apliksi</h3>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="shape">
            <img src="{{ asset('aset') }}/img/resource/circle_shape.png" alt="circle" />
            <span class="dot-1"></span>
            <span class="dot-2"></span>
            <span class="dot-3"></span>
            <span class="dot-4"></span>
            <span class="dot-5"></span>
        </div>
    </section>
    <!-- end feature section -->

    <!-- Start Partner Area -->
    <div class="partner-area ptb-50">
        <div class="container">
            <div class="partner-slider owl-carousel">
                <div class="partner-item">
                    <img src="{{ asset('images') }}/sipadek1.png" alt="image" />
                    <img src="{{ asset('images') }}/sipadek1.png" alt="partner" />
                </div>
                <div class="partner-item">
                    <img src="{{ asset('images') }}/sipadek1.png" alt="image" />
                    <img src="{{ asset('images') }}/sipadek1.png" alt="partner" />
                </div>
                <div class="partner-item">
                    <img src="{{ asset('images') }}/sipadek1.png" alt="image" />
                    <img src="{{ asset('images') }}/sipadek1.png" alt="partner" />
                </div>
                <div class="partner-item">
                    <img src="{{ asset('images') }}/sipadek1.png" alt="image" />
                    <img src="{{ asset('images') }}/sipadek1.png" alt="partner" />
                </div>
                <div class="partner-item">
                    <img src="{{ asset('images') }}/sipadek1.png" alt="image" />
                    <img src="{{ asset('images') }}/sipadek1.png" alt="partner" />
                </div>
                <div class="partner-item">
                    <img src="{{ asset('images') }}/sipadek1.png" alt="image" />
                    <img src="{{ asset('images') }}/sipadek1.png" alt="partner" />
                </div>
            </div>
        </div>
    </div>
    <!-- End Partner Area -->

    <!--start blog section-->
    <section id="blog" class="blog-section pt-100 pb-70">
        <div class="container">
            <div class="section-title title-light">

                <h2>Berita / Informasi</h2>
                <p>Does any industry face a more complex audience journey and marketing sales process than B2B technology?
                    Does any industry faces a more complex audience.</p>
            </div>
            <div class="row justify-content-center">
                @foreach ($berita as $b)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="blog-item-single">
                            <div class="blog-item-img">
                                <a href="{{ url('news/' . $b->slug) }}">
                                    <img src="{{ $b->getThumbnailBerita() }}" alt="blog-bg-image"
                                        style="object-fit: cover; position: relative; width: 100%; height: 300px; overflow: hidden;" />
                                </a>
                                <p class="tag">{{ $b->kategori->nama_kategori }}</p>
                            </div>
                            <div class="blog-item-content">
                                <span> <i class="envy envy-calendar"></i>{{ TanggalAja($b->created_at) }} </span>
                                <a href="{{ url('news/' . $b->slug) }}">
                                    <h3>{{ $b->judul }}</h3>
                                </a>
                                {{-- <p>Strategy experience and analytical expert is combine to enable. Strate great experience and
                                analysis the content.</p> --}}
                                <a href="{{ url('news/' . $b->slug) }}" target="_self" class="btn btn-text-only">
                                    read more
                                    <i class="envy envy-right-arrow"></i>
                                </a>
                            </div>
                            <!-- blog-item-content -->
                        </div>
                        <!-- blog-item-single -->
                    </div>
                @endforeach
            </div>
            <!-- row -->
        </div>
    </section>
    <!--end blog section-->

    <!-- start gallery section -->
    <section class="gallery-section ptb-100 bg-white">
        <div class="container">
            <div class="section-title">
                <h2>Portofolio APTIKA <br>
                    Diskominfo Kota Jmbi</h2>
                <p>Diskominfo telah membuat serta mengembangkan beberapa aplikasi yang telah digunakan oleh instansi
                    pemerintahan dan bertujuan untuk memudahkan kinerja pegawai, juga pelayanan terhadap masyarakat kota
                    Metro</p>
            </div>
            <div class="gallery-slider owl-carousel">
                <div class="gallery-item">
                    <div class="gallery-image"><img src="assets/img/gallery/gallery_1.jpg" alt="gallery-member" /></div>
                    <div class="gallery-content">
                        <h3>
                            <a href="project-details.html">UI/UX Design</a>
                        </h3>
                    </div>
                </div>
                <!-- gallery-item -->
                <div class="gallery-item">
                    <div class="gallery-image"><img src="assets/img/gallery/gallery_2.jpg" alt="gallery-member" /></div>
                    <div class="gallery-content">
                        <h3>
                            <a href="project-details.html">Mobile Developing</a>
                        </h3>
                    </div>
                </div>
                <!-- gallery-item -->
                <div class="gallery-item">
                    <div class="gallery-image"><img src="assets/img/gallery/gallery_3.jpg" alt="gallery-member" /></div>
                    <div class="gallery-content">
                        <h3>
                            <a href="project-details.html">SEO Optimize</a>
                        </h3>
                    </div>
                </div>
                <!-- gallery-item -->
                <div class="gallery-item">
                    <div class="gallery-image"><img src="assets/img/gallery/gallery_4.jpg" alt="gallery-member" /></div>
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
