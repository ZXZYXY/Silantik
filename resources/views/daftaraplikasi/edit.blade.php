@extends('layouts.master')
@section('title')
    Edit Aplikasi
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

            if (document.getElementById("integrasi").value == "Ya") {
                document.getElementById("c_integrasi").style.display = "block";
            }

            if (document.getElementById("ada_perwal").value == "Ya") {
                document.getElementById("c_perwal").style.display = "block";
            }
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
                    <form action="{{ route('daftaraplikasi.update', $data->uuid) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-4">
                                <x-forms.input_v id="tahun_pembuatan" type="text" name="tahun_pembuatan"
                                    label="Tahun Pembuatan" isRequired="true" value="{{ $data->tahun_pembuatan }}"
                                    isReadonly="" placeholder="Tahun Pembuatan" />

                                <x-forms.input_v id="nama_aplikasi" type="text" name="nama_aplikasi" label="Nama"
                                    isRequired="true" value="{{ $data->nama_aplikasi }}" isReadonly=""
                                    placeholder="Nama Aplikasi" />

                                <x-forms.textarea_v id="deskripsi" type="text" name="deskripsi" label="Deskripsi/Narasi"
                                    isRequired="true" value="{{ $data->deskripsi }}" isReadonly=""
                                    placeholder="Deskripsi" />

                                <x-forms.input_v id="link_app" type="text" name="link_app" label="Link/URL"
                                    isRequired="true" value="{{ $data->link_app }}" isReadonly=""
                                    placeholder="Link/URL Aplikasi" />

                                <div class="mb-3 {{ $errors->has('jenis_aplikasi') ? ' has-error' : '' }}">
                                    <label class="form-label">Jenis Aplikasi
                                        <span class="text-danger">*</span>
                                    </label>
                                    @php $jenis = explode(',', $data->jenis_aplikasi); @endphp
                                    @foreach ($jenisaplikasi as $ktg)
                                        <?php $_ck = array_search($ktg->nama_jenis, $jenis) === false ? '' : 'checked'; ?>
                                        <div class="form-check">
                                            <span style='display:inline-block;'><input class=form-check-input
                                                    type="checkbox" value='{{ $ktg->nama_jenis }}' name=jenis_aplikasi[]
                                                    {{ $_ck }}>
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
                                    label="Nama Konsultan/Instansi Pengembang" isRequired="false"
                                    value="{{ $data->nama_konsultan }}" isReadonly=""
                                    placeholder="Nama Konsultan/Instansi Pengembang" />

                                <x-forms.select_v id="opd_id" name="opd_id"
                                    label="Unit Kerja/Perangkat Daerah Pengelola" isRequired="true" isSelect2="true">
                                    <option value="" selected disabled>[Pilih]</option>
                                    @foreach ($opd as $list)
                                        <option value="{{ $list->id }}"
                                            {{ $data->opd_id == $list->id ? ' selected' : '' }}>
                                            {{ $list->nama_opd }} ({{ $list->singkatan }})</option>
                                    @endforeach
                                </x-forms.select_v>

                                <x-forms.select_v id="sektor_id" name="sektor_id" label="Sektor" isRequired="true"
                                    isSelect2="true">
                                    <option value="" selected disabled>[Pilih]</option>
                                    @foreach ($sektor as $sk)
                                        <option value="{{ $sk->id }}"
                                            {{ $data->sektor_id == $sk->id ? ' selected' : '' }}>
                                            {{ $sk->nama_sektor }} </option>
                                    @endforeach
                                </x-forms.select_v>

                                <x-forms.select_v id="status_aktif" name="status_aktif" label="Status Aktif"
                                    isRequired="true" isSelect2="true">
                                    <option value="">[Pilih]</option>
                                    <option value="Aktif" {{ $data->status_aktif == 'Aktif' ? ' selected' : '' }}>Aktif
                                    </option>
                                    <option value="Tidak Aktif"
                                        {{ $data->status_aktif == 'Tidak Aktif' ? ' selected' : '' }}>Tidak Aktif</option>
                                </x-forms.select_v>

                                <div class="mb-3 {{ $errors->has('integrasi') ? ' has-error' : '' }}">
                                    <label class="form-label">Integrasi
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select name="integrasi" id="integrasi" width="100%"
                                        class="form-select form-select-sm" onchange="changeIntegrasi()">
                                        <option value="">[Pilih]</option>
                                        <option value="Ya" {{ $data->integrasi == 'Ya' ? ' selected' : '' }}>Ya
                                        </option>
                                        <option value="Tidak" {{ $data->integrasi == 'Tidak' ? ' selected' : '' }}>Tidak
                                        </option>
                                    </select>
                                    @if ($errors->has('integrasi'))
                                        <span class="text-danger">{{ $errors->first('integrasi') }}</span>
                                    @endif
                                </div>

                                <div id="c_integrasi">
                                    <x-forms.textarea_v id="app_integrasi" type="text" name="app_integrasi"
                                        label="Aplikasi yang Terintegrasi" isRequired="false"
                                        value="{{ $data->app_integrasi }}" isReadonly=""
                                        placeholder="Aplikasi Terintegrasi" />
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 {{ $errors->has('ada_perwal') ? ' has-error' : '' }}">
                                    <label class="form-label">Ada Perwal</label>
                                    <select name="ada_perwal" id="ada_perwal" width="100%"
                                        class="form-select form-select-sm" onchange="changePerwal()">
                                        <option value="">[Pilih]</option>
                                        <option value="Ya" {{ $data->ada_perwal == 'Ya' ? ' selected' : '' }}>Ya
                                        </option>
                                        <option value="Tidak" {{ $data->ada_perwal == 'Tidak' ? ' selected' : '' }}>Tidak
                                        </option>
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
                                            max size : 5mb</i><br>
                                        @if ($data->file_perwal != null)
                                            <button type="button" class="btn btn-info btn-sm mt-2 mb-2"
                                                data-bs-toggle="modal" data-bs-target="#exampleLargeModal"><i
                                                    class="fa fa-eye"></i> Lihat Perwal</button>
                                        @else
                                            <i class="text-danger">Belum ada File</i>
                                        @endif
                                    </x-forms.input_v>
                                </div>
                                <x-forms.input_v id="logo_aplikasi" type="file" name="logo_aplikasi"
                                    label="Logo Aplikasi" isRequired="false" value="" isReadonly=""
                                    placeholder="Logo Aplikasi">
                                    <i class="text-info">format file : jpeg, jpg, png <br>
                                        max size : 5mb</i><br>
                                    @if ($data->logo_aplikasi != null)
                                        <p class="m-2">
                                            <a href="{{ asset('images/logo_aplikasi/' . $data->logo_aplikasi) }}"
                                                target="_blank"><img
                                                    src="{{ asset('images/logo_aplikasi/' . $data->logo_aplikasi) }}"
                                                    width="100px"></a>
                                        </p>
                                    @else
                                        <i class="text-danger">Belum ada Gambar</i>
                                    @endif
                                </x-forms.input_v>

                                <x-forms.input_v id="gambar_home" type="file" name="gambar_home"
                                    label="Screenshot Halaman Awal Aplikasi" isRequired="false" value=""
                                    isReadonly="" placeholder="">
                                    <i class="text-info">format file : jpeg, jpg, png <br>
                                        max size : 5mb</i><br>
                                    @if ($data->gambar_home != null)
                                        <p class="m-2">
                                            <a href="{{ asset('images/gambar_home/' . $data->gambar_home) }}"
                                                target="_blank"><img
                                                    src="{{ asset('images/gambar_home/' . $data->gambar_home) }}"
                                                    width="100px"></a>
                                        </p>
                                    @else
                                        <i class="text-danger">Belum ada Gambar</i>
                                    @endif
                                </x-forms.input_v>
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
    <!-- Modal -->
    <div class="modal fade" id="exampleLargeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Preview Perwal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <embed src="{{ asset('dokumen/perwal/' . $data->file_perwal) }}" type="application/pdf"
                        frameBorder="0" height="720px" width="100%"></embed>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
