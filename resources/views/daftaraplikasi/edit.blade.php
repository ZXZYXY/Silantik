@extends('layouts.master')
@section('title')
    Edit Aplikasi
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
                    <h4 class="mb-0">Edit Aplikasi</h4>
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
                    <form action="{{ route('daftaraplikasi.update', $data->uuid) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <x-forms.input_v id="tahun_pembuatan" type="text" name="tahun_pembuatan"
                                    label="Tahun Pembuatan" isRequired="true" value="{{ $data->tahun_pembuatan }}"
                                    isReadonly="" placeholder="Tahun Pembuatan" />

                                <x-forms.input_v id="nama_aplikasi" type="text" name="nama_aplikasi" label="Nama"
                                    isRequired="true" value="{{ $data->nama_aplikasi }}" isReadonly=""
                                    placeholder="Nama Aplikasi" />

                                <x-forms.textarea_v id="deskripsi" type="text" name="deskripsi" label="Deskripsi"
                                    isRequired="true" value="{{ $data->deskripsi }}" isReadonly=""
                                    placeholder="Deskripsi" />

                                <x-forms.input_v id="link_app" type="text" name="link_app" label="Link/URL"
                                    isRequired="true" value="{{ $data->link_app }}" isReadonly=""
                                    placeholder="Link/URL Aplikasi" />

                                <x-forms.select_v id="jenis_aplikasi" name="jenis_aplikasi" label="Jenis Aplikasi"
                                    isRequired="true" isSelect2="true">
                                    <option value="" selected disabled>[Pilih]</option>
                                    @foreach ($jenisaplikasi as $list)
                                        <option value="{{ $list->nama_jenis }}"
                                            {{ $data->jenis_aplikasi == $list->nama_jenis ? ' selected' : '' }}>
                                            {{ $list->nama_jenis }} </option>
                                    @endforeach
                                </x-forms.select_v>

                                <x-forms.select_v id="opd_id" name="opd_id" label="OPD" isRequired="true"
                                    isSelect2="true">
                                    <option value="" selected disabled>[Pilih]</option>
                                    @foreach ($opd as $list)
                                        <option value="{{ $list->id }}"
                                            {{ $data->opd_id == $list->id ? ' selected' : '' }}>
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
