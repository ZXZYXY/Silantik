@extends('layouts.master')
@section('title')
    Detail Pembaharuan Aplikasi
@endsection
@push('style')
    <link rel="stylesheet" href="{{ asset('theme') }}/select2/css/select2.min.css">
@endpush

@push('script')
    <!-- Select2 -->
    <script src="{{ asset('theme') }}/select2/js/select2.full.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endpush

@section('content')
    <!--page-content-wrapper-->
    <div class="page-content-wrapper">
        <div class="page-content">
            <button class="btn btn-primary btn-sm mb-3" onclick="window.history.back();"><i class="fa fa-reply"></i>
                Kembali</button>
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-0">Detail Permohonan Pembaharuan Aplikasi</h4>
                    <hr>



                </div>
            </div>
        </div>
    </div>
    <!--end page-content-wrapper-->
@endsection
