@extends('layouts.master')
@section('title')
    Tambah Aplikasi
@endsection
@push('style')
    <link href="{{ asset('theme') }}/plugins/select2/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('theme') }}/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet" />
    <style>
        #c_integrasi {
            display: none;
        }

        #c_perwal {
            display: none;
        }
    </style>
@endpush

@push('script')
    <script src="{{ asset('theme') }}/plugins/select2/js/select2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.select2').select2();

            $('.multiple-select').select2({
                theme: 'bootstrap4',
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' :
                    'style',
                placeholder: $(this).data('placeholder'),
                allowClear: Boolean($(this).data('allow-clear')),
            });
        });

        function changeIntegrasi() {
            var selectElement = document.getElementById("integrasi");
            var selectedValue = selectElement.value;
            var divElement = document.getElementById("c_integrasi");

            if (selectedValue === "Ya") {
                divElement.style.display = "block";
            } else if (selectedValue === "Tidak") {
                divElement.style.display = "none";
            } else {
                divElement.style.display = "none";
            }
        }

        function changePerwal() {
            var selectElement = document.getElementById("ada_perwal");
            var selectedValue = selectElement.value;
            var divElement = document.getElementById("c_perwal");

            if (selectedValue === "Ya") {
                divElement.style.display = "block";
            } else if (selectedValue === "Tidak") {
                divElement.style.display = "none";
            } else {
                divElement.style.display = "none";
            }
        }
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
                    <form action="{{ route('daftaraplikasi.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <x-forms.input_v id="tahun_pembuatan" type="text" name="tahun_pembuatan"
                                    label="Tahun Pembuatan" isRequired="true" value="" isReadonly=""
                                    placeholder="Tahun Pembuatan" />

                                <x-forms.input_v id="nama_aplikasi" type="text" name="nama_aplikasi" label="Nama"
                                    isRequired="true" value="" isReadonly="" placeholder="Nama Aplikasi" />

                                <x-forms.textarea_v id="deskripsi" type="text" name="deskripsi" label="Deskrip/Narasi"
                                    isRequired="true" value="" isReadonly="" placeholder="Deskripsi" />

                                <x-forms.input_v id="link_app" type="text" name="link_app" label="Link/URL"
                                    isRequired="true" value="" isReadonly="" placeholder="Link/URL Aplikasi" />

                                <div class="mb-3 {{ $errors->has('jenis_aplikasi') ? ' has-error' : '' }}">
                                    <label class="form-label">Jenis Aplikasi
                                        <span class="text-danger">*</span>
                                    </label>
                                    @foreach ($jenisaplikasi as $ktg)
                                        <div class="form-check">
                                            <span style='display:inline-block;'><input class=form-check-input
                                                    type="checkbox" value='{{ $ktg->nama_jenis }}' name=jenis_aplikasi[]>
                                                {{ $ktg->nama_jenis }} &nbsp; &nbsp; &nbsp; </span>
                                        </div>
                                    @endforeach

                                    @if ($errors->has('jenis_aplikasi'))
                                        <span class="text-danger">{{ $errors->first('jenis_aplikasi') }}</span>
                                    @endif
                                </div>

                            </div>
                            <div class="col-md-4">
                                <x-forms.input_v id="nama_konsultan" type="text" name="nama_konsultan"
                                    label="Nama Konsultan/Instansi Pengembang" isRequired="false" value=""
                                    isReadonly="" placeholder="Nama Konsultan/Instansi Pengembang" />

                                <x-forms.select_v id="opd_id" name="opd_id"
                                    label="Unit Kerja/Perangkat Daerah Pengelola" isRequired="true" isSelect2="true">
                                    <option value="" selected disabled>[Pilih]</option>
                                    @foreach ($opd as $list)
                                        <option value="{{ $list->id }}"
                                            {{ old('opd_id') == $list->id ? ' selected' : '' }}>
                                            {{ $list->nama_opd }} ({{ $list->singkatan }})</option>
                                    @endforeach
                                </x-forms.select_v>

                                <x-forms.select_v id="sektor_id" name="sektor_id" label="Sektor" isRequired="true"
                                    isSelect2="true">
                                    <option value="" selected disabled>[Pilih]</option>
                                    @foreach ($sektor as $sk)
                                        <option value="{{ $sk->id }}"
                                            {{ old('sektor_id') == $sk->id ? ' selected' : '' }}>
                                            {{ $sk->nama_sektor }} </option>
                                    @endforeach
                                </x-forms.select_v>

                                <x-forms.select_v id="status_aktif" name="status_aktif" label="Status Aktif"
                                    isRequired="true" isSelect2="true">
                                    <option value="">[Pilih]</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                </x-forms.select_v>

                                <div class="mb-3 {{ $errors->has('integrasi') ? ' has-error' : '' }}">
                                    <label class="form-label">Integrasi
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select name="integrasi" id="integrasi" width="100%"
                                        class="form-select form-select-sm" onchange="changeIntegrasi()">
                                        <option value="">[Pilih]</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                    @if ($errors->has('integrasi'))
                                        <span class="text-danger">{{ $errors->first('integrasi') }}</span>
                                    @endif
                                </div>

                                <div id="c_integrasi">
                                    <x-forms.textarea_v id="app_integrasi" type="text" name="app_integrasi"
                                        label="Aplikasi yang Terintegrasi" isRequired="false" value=""
                                        isReadonly="" placeholder="Aplikasi Terintegrasi" />
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 {{ $errors->has('ada_perwal') ? ' has-error' : '' }}">
                                    <label class="form-label">Ada Perwal</label>
                                    <select name="ada_perwal" id="ada_perwal" width="100%"
                                        class="form-select form-select-sm" onchange="changePerwal()">
                                        <option value="">[Pilih]</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                    @if ($errors->has('ada_perwal'))
                                        <span class="text-danger">{{ $errors->first('ada_perwal') }}</span>
                                    @endif
                                </div>

                                <div id="c_perwal">
                                    <x-forms.input_v id="file_perwal" type="file" name="file_perwal"
                                        label="File Perwal/SK" isRequired="false" value="" isReadonly=""
                                        placeholder="Integrasi">
                                        <i class="text-info">format file : pdf <br>
                                            max size : 5mb</i>
                                    </x-forms.input_v>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary"><i class="lni lni-save"></i>
                                    Submit</button>
                            </div>

                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>

@endsection
