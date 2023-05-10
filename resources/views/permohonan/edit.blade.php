@extends('layouts.master')
@section('title')
    Edit {{ ucfirst($jenis) }} Aplikasi
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
                    <h4 class="mb-0">Edit Permohonan {{ ucfirst($jenis) }} Aplikasi</h4>
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
                    <form action="{{ url('permohonan/update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="uuid" value="{{ $data->uuid }}">
                        <input type="hidden" name="jenis_permohonan" value="{{ $jenis }}">
                        <div class="row">
                            <div class="col-md-6">

                                @if (auth()->user()->role == 'admin' or auth()->user()->role == 'superadmin')
                                    <x-forms.select_v id="opd_id" name="opd_id" label="OPD" isRequired="true"
                                        isSelect2="true">

                                        @foreach ($opd as $list)
                                            <option value="{{ $list->id }}"
                                                {{ $data->opd_id == $list->id ? ' selected' : '' }}>
                                                {{ $list->nama_opd }} ({{ $list->singkatan }})</option>
                                        @endforeach
                                    </x-forms.select_v>
                                @else
                                    <input type="hidden" name="opd_id" value="{{ auth()->user()->opd_id }}">
                                @endif
                                <x-forms.input_v id="nama_aplikasi" type="text" name="nama_aplikasi"
                                    label="Nama Aplikasi" isRequired="true" value="{{ $data->nama_aplikasi }}"
                                    isReadonly="" placeholder="Nama Aplikasi" />

                                <x-forms.select_v id="jenis_aplikasi" name="jenis_aplikasi" label="Jenis Aplikasi"
                                    isRequired="true" isSelect2="true">
                                    <option value="" selected disabled>[Pilih]</option>
                                    @foreach ($jenisaplikasi as $list)
                                        <option value="{{ $list->nama_jenis }}"
                                            {{ $data->jenis_aplikasi == $list->nama_jenis ? ' selected' : '' }}>
                                            {{ $list->nama_jenis }} </option>
                                    @endforeach
                                </x-forms.select_v>

                                <x-forms.textarea_v id="deskripsi" type="text" name="deskripsi"
                                    label="Deskripsi Aplikasi" isRequired="true" value="{{ $data->deskripsi }}"
                                    isReadonly="" placeholder="Deskripsi Aplikasi" />

                                <x-forms.input_v id="file_surat" type="file" name="file_surat" label="Surat Permohonan"
                                    isRequired="false" value="" isReadonly="" placeholder="Surat Permohonan" />

                                <button type="submit" class="btn btn-primary"><i class="lni lni-save"></i> Submit</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!--end page-content-wrapper-->
@endsection
