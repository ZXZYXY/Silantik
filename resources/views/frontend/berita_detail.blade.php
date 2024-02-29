@extends('frontend.layouts.master')
@section('title')
    Detail Informasi
@endsection
@push('style')
@endpush

@push('script')
@endpush

@section('content')
    <!-- Start Blog ============================================= -->
    <div id="blog" class="blog-area bg-gray full-width single default-padding" style="padding-top: 150px;">
        <div class="container">
            <div class="row">
                <div class="blog-items">
                    <div class="col-lg-9 col-md-9">

                        <div class="item">
                            <div class="text-center">

                            </div>
                            <div class="info">
                                <h3 style="margin-top:20px;">{{ $berita->judul }}</h3>
                                <div style="margin-top:20px; margin-bottom:20px">
                                    <i class="fa fa-user"></i>
                                    <span>Author</span> &nbsp;&nbsp;&nbsp;&nbsp;
                                    <i class="fas fa-calendar"></i>
                                    <span>{{ TanggalAja($berita->created_at) }}</span>
                                </div>


                                <img src="{{ $berita->getThumbnailBerita() }}" width="100%" style="border-radius:10px;"
                                    alt="Thumb" style="margin-top: 20px; margin-bottom:20px">

                                <div style="margin-top:20px">
                                    {!! $berita->isi !!}
                                </div>
                                {{-- <div class="post-tags">
                                    <span>Tags: </span>
                                    <a href="#">Consulting</a>
                                    <a href="#">Planing</a>
                                    <a href="#">Business</a>
                                    <a href="#">Fashion</a>
                                </div>
                                <div class="post-pagi-area">
                                    <a href="#"><i class="fas fa-arrow-left"></i> Previus Post</a>
                                    <a href="#">Next Post <i class="fas fa-arrow-right"></i></a>
                                </div> --}}

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- End Blog -->
@endsection
