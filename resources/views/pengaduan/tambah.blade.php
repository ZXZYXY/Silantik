@extends('layouts.master')
@section('title')
    Pengaduan {{ strtoupper($jenis) }}
@endsection
@push('style')
    <link href="{{ asset('theme') }}/select2/css/select2.min.css" rel="stylesheet" />
@endpush

@push('script')
    <script src="{{ asset('theme') }}/select2/js/select2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endpush

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <button class="btn btn-primary btn-sm mb-3" onclick="window.history.back();"><i class="fa fa-reply"></i>
                Kembali</button>
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-0">Form Pengaduan {{ strtoupper($jenis) }}</h4>
                    <hr>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ url('pengaduan/store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" name="jenis_pengaduan" value="{{ $jenis }}">
                                <x-forms.input_v id="judul" type="text" name="judul" label="Judul"
                                    isRequired="true" value="" isReadonly="" placeholder="Judul" />

                                <x-forms.textarea_v id="isi" type="text" name="isi" label="Detail Pengaduan"
                                    isRequired="true" value="" isReadonly="" placeholder="" />

                                <button type="submit" class="btn btn-primary"><i class="lni lni-save"></i> Submit</button>

                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>

@endsection
