<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Layanan Jaringan - SILANTIK</title>
    <!--favicon-->
    <link rel="icon" href="{{ asset('images/' . konfigurasi()->favicon) }}">
    <!-- loader-->
    <link href="{{ asset('theme') }}/assets/css/pace.min.css" rel="stylesheet" />
    <script src="{{ asset('theme') }}/assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('theme') }}/assets/css/bootstrap.min.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&family=Roboto&display=swap" />
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{ asset('theme') }}/assets/css/icons.css" />
    <!-- App CSS -->
    <link rel="stylesheet" href="{{ asset('theme') }}/assets/css/app.css" />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('theme') }}/plugins/fontawesome-free/css/all.min.css">
    <link href="{{ asset('theme') }}/assets/plugins/smart-wizard/css/smart_wizard_all.min.css" rel="stylesheet"
        type="text/css" />
</head>

<body class="bg-register">
    <!-- wrapper -->
    <div class="wrapper">
        <div class="section-authentication-register d-flex align-items-center justify-content-center">
            <div class="row">
                <div class="col-12 col-lg-12 mx-auto">
                    <div class="card radius-15 overflow-hidden">
                        <div class="row">
                            {{-- <div class="col-xl-6 bg-login-color d-flex align-items-center justify-content-center">
                                <img src="{{ asset('theme') }}/assets/images/login-images/register-frent-img.jpg"
                                    class="img-fluid" width="700px" alt="...">
                            </div> --}}
                            <div class="col-xl-12">
                                <div class="card-body p-md-5">
                                    <div class="text-center">
                                        <img src="{{ asset('images') }}/logo_diskominfo_warna.png" width="200px"
                                            alt="logo-dark" />
                                        <h4 class="mt-4 font-weight-bold">Layanan Jaringan Infrastruktur</h4>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 50%;"
                                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                                    </div>
                                    <hr>

                                    <div class="">
                                        <div class="form-body">
                                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                                <strong>Data NIP Ditemukan!</strong> <br>
                                                NIP : {{ $getNIP->data->nip }}<br>
                                                Nama : {{ $getNIP->data->nama }}<br>
                                                Jabatan : {{ $getNIP->data->njab }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul style="margin-bottom:0px;list-style-type: none;margin:0px;padding:0px;">
                                                        @foreach ($errors->all() as $error)
                                                            <li><i class="fa fa-exclamation"></i> {{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <div class="col-12">

                                            </div>
                                            <hr>
                                            <h4>2. Data Permohonan</h4>
                                            {{-- <p>Masukan Detail Permohonan</p> --}}
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul
                                                        style="margin-bottom:0px;list-style-type: none;margin:0px;padding:0px;">
                                                        @foreach ($errors->all() as $error)
                                                            <li><i class="fa fa-exclamation"></i> {{ $error }}
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <form action="{{ url('submit-jaringan') }}" method="post"
                                                class="" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="nip" value="{{ $getNIP->data->nip }}">
                                                <input type="hidden" name="nama" value="{{ $getNIP->data->nama }}">
                                                <input type="hidden" name="jabatan" value="{{ $getNIP->data->njab }}">

                                                <div class="mb-3 {{ $errors->has('no_hp') ? ' has-error' : '' }}">
                                                    <label class="form-label" style="font-weight: bold;">No.
                                                        Whatsapp<span class="text-danger">*</span>
                                                        <a type="button" data-bs-toggle="modal"
                                                            data-bs-target="#exampleVerticallycenteredModal"><i
                                                                class="fa fa-info-circle"></i></a>

                                                    </label>
                                                    <input type="text" placeholder=""
                                                        class="form-control form-control-sm @error('no_hp') is-invalid @enderror"
                                                        name="no_hp" id="no_hp" value="{{ old('no_hp') }}" />

                                                    @if ($errors->has('no_hp'))
                                                        <span class="text-danger">{{ $errors->first('no_hp') }}</span>
                                                    @endif
                                                </div>
                                                <x-forms.select_v id="opd_id" name="opd_id" label="Unit Kerja"
                                                    isRequired="true" isSelect2="true">
                                                    <option value="">[Pilih]</option>
                                                    @foreach ($opd as $list)
                                                        <option value="{{ $list->id }}"
                                                            {{ old('opd_id') == $list->id ? ' selected' : '' }}>
                                                            {{ $list->nama_opd }} ({{ $list->singkatan }})</option>
                                                    @endforeach
                                                </x-forms.select_v>
                                                {{-- <x-forms.input_v id="no_hp" type="text" name="no_hp"
                                                    label="Nomor WA" isRequired="true" value="" isReadonly=""
                                                    placeholder="Nomor WA" /> --}}

                                                

                                                <x-forms.input_v id="alamat" type="text" name="alamat"
                                                    label="Alamat" isRequired="true" value=""
                                                    isReadonly="" placeholder="Alamat" />

                                                <x-forms.input_v id="longitude" type="text" name="longitude"
                                                    label="Dipasang dari" isRequired="true" value=""
                                                    isReadonly="" placeholder="dipasang dari" />

                                                <x-forms.input_v id="latitude" type="text" name="latitude"
                                                    label="Sampai" isRequired="true" value=""
                                                    isReadonly="" placeholder="Sampai" />

                                                <x-forms.input_v id="jarak_kabel" type="text" name="jarak_kabel"
                                                    label="Jarak Kabel" isRequired="true" value=""
                                                    isReadonly="" placeholder="Dalam Satuan Meter" />
                                                
                                                <x-forms.input_v id="jumlah_aksespoint" type="text" name="jumlah_aksespoint"
                                                    label="Jumlah Akses Point" isRequired="true" value=""
                                                    isReadonly="" placeholder="jumlah Akses Point" />

                                                <x-forms.select_v id="jenis_koneksi" name="jenis_koneksi"
                                                    label="Jenis Koneksi" isRequired="true" isSelect2="true">
                                                    <option value="" selected disabled>[Pilih]</option>
                                                    <option value="optik" {{ old('jenis_koneksi') == 'optik' ? ' selected' : '' }}>Optik</option>
                                                    <option value="wireless" {{ old('jenis_koneksi') == 'wireless' ? ' selected' : '' }}>Wireless</option>
                                                    
                                                </x-forms.select_v>

                                                
                                                <div
                                                    class="mb-3 {{ $errors->has('file_surat') ? ' has-error' : '' }}">
                                                    <label class="form-label" style="font-weight: bold;">Surat
                                                        Permohonan<span class="text-danger">*</span>
                                                        {{-- <a type="button" data-bs-toggle="modal"
                                                            data-bs-target="#infoSurat"><i
                                                                class="fa fa-info-circle"></i></a> --}}

                                                    </label>
                                                    <input type="file" placeholder=""
                                                        class="form-control form-control-sm @error('file_surat') is-invalid @enderror"
                                                        name="file_surat" id="file_surat"
                                                        value="{{ old('file_surat') }}" />

                                                    @if ($errors->has('file_surat'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('file_surat') }}</span>
                                                    @endif
                                                </div>

                                                <div class="col-12">
                                                    <div class="d-grid">
                                                        <button type="submit" class="btn btn-primary"><i
                                                                class="fa fa-arrow-right me-1"></i>Lanjut</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <!--end row-->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleVerticallycenteredModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Informasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        Pastikan Nomor Whatsapp Aktif untuk mendapatkan Notifikasi Nomor Permohonan

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap JS -->
    <script src="{{ asset('theme') }}/assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('theme') }}/assets/js/jquery.min.js"></script>
    <script src="{{ asset('theme') }}/assets/js/bootstrap.bundle.min.js"></script>


</body>

</html>
