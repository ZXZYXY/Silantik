@extends('frontend.layouts.master')
@section('title')
    Tentang
@endsection
@push('style')
@endpush

@push('script')
@endpush

@section('content')
    <!-- Start Faq ============================================= -->
    <div id="faq" class="faq-area bg-gray default-padding" style="padding-top: 150px;">
        <div class="container">
            <div class="row">

                <div class="col-md-12 faq-items">
                    <div class="heading">
                        <h2>Answer & Question</h2>
                    </div>
                    <!-- Start Accordion -->
                    <div class="acd-items acd-arrow">
                        <div class="panel-group symb" id="accordion">
                            @foreach ($faq as $item)
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion"
                                                href="#ac{{ $item->id }}">
                                                {{ $item->pertanyaan }}
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="ac{{ $item->id }}" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            {!! $item->jawaban !!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <!-- End Accordion -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Faq  -->
@endsection
