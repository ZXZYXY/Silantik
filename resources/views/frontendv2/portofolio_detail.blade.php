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
                <h1>Portofolio details</h1>
                <ul>
                    <li class="item"><a href="/">Home</a></li>
                    <li class="item">
                        <a href="#">Portofolio details</a>
                    </li>
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

    <!-- start project details area -->
    <section class="project-details-area ptb-100 bg-thin">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="project-details-content">
                        <img src="{{ asset('images/gambar_home/' . $data->gambar_home) }}" alt="image" />
                        <h3>{{ $data->nama_aplikasi }}</h3>
                        <blockquote class="blockquote">
                            <p>
                                {{ $data->deskripsi }}
                            </p>
                        </blockquote>

                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <aside class="widget-area">
                        <div class="section">
                            <h5 class="widget-title">More Projects</h5>
                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <div class="gallery-item">
                                        <div class="gallery-image">
                                            <img src="assets/img/gallery/gallery_1.jpg" alt="gallery-member" />
                                        </div>
                                        <div class="gallery-content">
                                            <h2>
                                                <a href="#">Web Design</a>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="gallery-item">
                                        <div class="gallery-image">
                                            <img src="assets/img/gallery/gallery_2.jpg" alt="gallery-member" />
                                        </div>
                                        <div class="gallery-content">
                                            <h2>
                                                <a href="#">Branding</a>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="gallery-item">
                                        <div class="gallery-image">
                                            <img src="assets/img/gallery/gallery_3.jpg" alt="gallery-member" />
                                        </div>
                                        <div class="gallery-content">
                                            <h2>
                                                <a href="#">UI/UX Design</a>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="gallery-item">
                                        <div class="gallery-image">
                                            <img src="assets/img/gallery/gallery_4.jpg" alt="gallery-member" />
                                        </div>
                                        <div class="gallery-content">
                                            <h2>
                                                <a href="#">Mobile Development</a>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- end project details area -->
@endsection
