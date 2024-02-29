@extends('frontend.layouts.master')
@section('title')
    Informasi
@endsection
@push('style')
@endpush

@push('script')
@endpush

@section('content')
    <!-- Start Blog Area  ============================================= -->
    <div id="berita" class="blog-area bg-gray default-padding bottom-less" style="padding-top: 150px;">
        <div class="container">

            <div class="row">
                <div class="blog-items">

                    @foreach ($beritas as $b)
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
                <!-- row -->
                <div class="cta-btn text-center">
                    {!! $beritas->links('vendor.pagination.bootstrap-4') !!}

                </div>
            </div>
        </div>
    </div>
    <!-- End Blog Area -->
@endsection
