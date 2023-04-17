@extends('layouts.master')
@section('title')
    Tambah Aplikasi
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
                    <h4 class="mb-0">Tambah Aplikasi</h4>
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
                    <form action="{{ route('daftaraplikasi.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <x-forms.input_v id="tahun_pembuatan" type="text" name="tahun_pembuatan"
                                    label="Tahun Pembuatan" isRequired="true" value="" isReadonly=""
                                    placeholder="Tahun Pembuatan" />

                                <x-forms.input_v id="nama_aplikasi" type="text" name="nama_aplikasi" label="Nama"
                                    isRequired="true" value="" isReadonly="" placeholder="Nama Aplikasi" />

                                <x-forms.textarea_v id="deskripsi" type="text" name="deskripsi" label="Deskripsi"
                                    isRequired="true" value="" isReadonly="" placeholder="Deskripsi" />

                                <x-forms.input_v id="link_app" type="text" name="link_app" label="Link/URL"
                                    isRequired="true" value="" isReadonly="" placeholder="Link/URL Aplikasi" />

                                <x-forms.input_v id="jenis" type="text" name="jenis" label="Jenis Aplikasi"
                                    isRequired="true" value="" isReadonly="" placeholder="Jenis Aplikasi" />

                                <x-forms.select_v id="opd" name="opd" label="OPD" isRequired="true"
                                    isSelect2="true">
                                    <option value="" selected disabled>[Pilih]</option>
                                    @foreach ($opd as $list)
                                        <option value="{{ $list->nama_opd }}"
                                            {{ old('roles') == $list->nama_opd ? ' selected' : '' }}>
                                            {{ $list->nama_opd }} ({{ $list->singkatan }})</option>
                                    @endforeach
                                </x-forms.select_v>



                                <button type="submit" class="btn btn-primary"><i class="lni lni-save"></i> Submit</button>

                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>

@endsection
