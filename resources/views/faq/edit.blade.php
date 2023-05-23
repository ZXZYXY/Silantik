@extends('layouts.master')
@section('title')
    Edit FAQ
@endsection
@push('style')
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('theme/plugins/summernote/summernote-bs4.min.css') }}">
@endpush

@push('script')
    <!-- Summernote -->
    <script src="{{ asset('theme/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#jawaban').summernote()
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
                    <h4 class="mb-0">Edit FAQ</h4>
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

                    <form action="{{ url('faq/' . $faq->uuid . '/update') }}" class="form-horizontal" method="POST">
                        @csrf
                        <x-forms.textarea_v id="pertanyaan" type="text" name="pertanyaan" label="Pertanyaan"
                            isRequired="true" value="{{ $faq->pertanyaan }}" isReadonly="" placeholder="Pertanyaan" />

                        <x-forms.textarea_v id="jawaban" type="text" name="jawaban" label="Jawaban" isRequired="true"
                            value="{!! $faq->jawaban !!}" isReadonly="" placeholder="Jawaban" />

                        <x-forms.select_v id="kategori" name="kategori" label="Kategori" isRequired="true"
                            isSelect2="false">
                            <option value="">[Pilih]</option>
                            <option value="Umum" @if ($faq->kategori == 'Umum') selected @endif>Umum</option>
                        </x-forms.select_v>

                        <x-forms.input_v id="urutan" type="number" name="urutan" label="Urutan" isRequired="true"
                            value="{{ $faq->urutan }}" isReadonly="" placeholder="Urutan" />

                        <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="fa fa-save"></i>
                            Simpan</button>

                    </form>


                </div>
            </div>
        </div>
    </div>

@endsection
