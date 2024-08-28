@extends('frontend.layouts.master')
@section('title')
    Informasi
@endsection
@push('style')
    <style>
        .custom-cta-btn {
            color: white; /* Button text color */
            padding: 10px 20px; /* Button padding */
            font-size: 16px; /* Button font size */
            border: none; /* Remove border */
            border-radius: 5px; /* Rounded corners */
            cursor: pointer; /* Pointer cursor on hover */
        }

        .custom-cta-btn:hover {
            background-color: #0056b3; /* Background color on hover */
        }
    </style>
@endpush

@push('script')
@endpush

@section('content')
    <!-- Start Blog Area  ============================================= -->
    <div id="berita" class="blog-area default-padding bottom-less" style="padding-top: 150px;">
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
                <div class="text-center">
                    {!! $beritas->links('vendor.pagination.bootstrap-4') !!}
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog Area -->
@endsection

