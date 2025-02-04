@extends('frontendv2.layouts.master')
@section('title')
    Informasi
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
                <h1>Informasi</h1>
                <ul>
                    <li class="item"><a href="/">Beranda</a></li>
                    <li class="item"><a href="#">Informasi</a></li>
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

    <!--start blog section-->
    <section class="blog-grid ptb-100 bg-thin">
        <div class="container">
            <div class="row justify-content-center">
                @foreach ($berita as $b)
                    <div class="col-lg-4">
                        <div class="blog-item-single" style="border-radius:10px;">
                            <div class="blog-item-img">
                                <a href="{{ url('news/' . $b->slug) }}">
                                    <img src="{{ $b->getThumbnailBerita() }}" alt="blog-bg-image"
                                        style="object-fit: cover; position: relative; width: 100%; height: 300px; overflow: hidden;" />
                                </a>
                                <p class="tag">{{ $b->kategori->nama_kategori }}</p>
                            </div>
                            <div class="blog-item-content">
                                <span> <i class="envy envy-calendar"></i> {{ TanggalAja($b->created_at) }} </span>
                                <a href="{{ url('news/' . $b->slug) }}">
                                    <h3>{{ $b->judul }}</h3>
                                </a>

                                <a href="{{ url('news/' . $b->slug) }}" target="_self" class="btn btn-text-only">
                                    Baca Selengkapnya
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
            <div class="cta-btn text-center">
                {!! $berita->links('vendor.pagination.simple-bootstrap-4') !!}

            </div>
        </div>
    </section>
    <!--end blog section-->
@endsection
