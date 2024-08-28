<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Layanan Pembuatan Aplikasi - SILANTIK</title>
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
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Syne:wght@400..800&display=swap');
        .font-weight-bold{
            font-weight: bold;
            font-family: "Montserrat", Sans-serif;
        }
    </style>
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
                                        <h4 class="mt-4 font-weight-bold">Layanan Pembuatan/Pengembangan Aplikasi</h4>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 50%;"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">50%</div>
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
                                            <form action="{{ url('submit-permohonan-aplikasi') }}" method="post"
                                                class="" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="nip" value="{{ $getNIP->data->nip }}">
                                                <input type="hidden" name="nama" value="{{ $getNIP->data->nama }}">
                                                <input type="hidden" name="jabatan" value="{{ $getNIP->data->njab }}">
                                                <!-- Nomer WhatsApp -->
                                                <div class="mb-3 {{ $errors->has('no_hp') ? ' has-error' : '' }}">
                                                    <label class="form-label" style="font-weight: bold;">No.
                                                        Whatsapp<span class="text-danger">*</span>
                                                        <a type="button" data-bs-toggle="modal"
                                                            data-bs-target="#exampleVerticallycenteredModal1"><i
                                                                class="fa fa-info-circle"></i>
                                                        </a>
                                                    </label>
                                                    <input type="text" placeholder=""
                                                        class="form-control form-control-sm @error('no_hp') is-invalid @enderror"
                                                        name="no_hp" id="no_hp" value="{{ old('no_hp') }}" />

                                                    @if ($errors->has('no_hp'))
                                                        <span class="text-danger">{{ $errors->first('no_hp') }}</span>
                                                    @endif
                                                </div>
                                                <!-- Unit Kerja -->
                                                <div class="mb-3 {{ $errors->has('opd_id') ? ' has-error' : '' }}">
                                                    <label for="opd_id" class="form-label" style="font-weight: bold;">Unit 
                                                        Kerja<span class="text-danger">*</span>
                                                        <a type="button" data-bs-toggle="modal"
                                                            data-bs-target="#exampleVerticallycenteredModal2"><i
                                                                class="fa fa-info-circle"></i>
                                                        </a>
                                                    </label>
                                                    <select id="opd_id" name="opd_id" class="form-control form-control-sm @error('opd_id') is-invalid @enderror" required>
                                                        <option value="">[Pilih]</option>
                                                        @foreach ($opd as $list)
                                                            <option value="{{ $list->id }}" {{ old('opd_id') == $list->id ? ' selected' : '' }}>
                                                                {{ $list->nama_opd }} ({{ $list->singkatan }})
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                    @if ($errors->has('opd_id'))
                                                        <span class="text-danger">{{ $errors->first('opd_id') }}</span>
                                                    @endif
                                                </div>
                                                {{-- <x-forms.input_v id="no_hp" type="text" name="no_hp"
                                                    label="Nomor WA" isRequired="true" value="" isReadonly=""
                                                    placeholder="Nomor WA" /> --}}
                                                <!-- Jenis Permohonan -->
                                                <div class="mb-3 {{ $errors->has('jenis_permohonan') ? ' has-error' : '' }}">
                                                    <label for="jenis_permohonan" class="form-label" style="font-weight: bold;">
                                                        Jenis Permohonan<span class="text-danger">*</span>
                                                        <a type="button" data-bs-toggle="modal"
                                                            data-bs-target="#exampleVerticallycenteredModal3"><i
                                                                class="fa fa-info-circle"></i>
                                                        </a>
                                                    </label>
                                                    <select id="jenis_permohonan" name="jenis_permohonan" class="form-control form-control-sm @error('jenis_permohonan') is-invalid @enderror" required>
                                                        <option value="" selected disabled>[Pilih]</option>
                                                        <option value="pembuatan" {{ old('jenis_permohonan') == 'pembuatan' ? ' selected' : '' }}>
                                                            Pembuatan Aplikasi Baru
                                                        </option>
                                                        <option value="pembaruan" {{ old('jenis_permohonan') == 'pembaruan' ? ' selected' : '' }}>
                                                            Pembaruan/Pengembangan Aplikasi
                                                        </option>
                                                        <option value="penggunaan_domain" {{ old('jenis_permohonan') == 'penggunaan_domain' ? ' selected' : '' }}>
                                                            Permintaan Penggunaan Domain
                                                        </option>
                                                    </select>

                                                    @if ($errors->has('jenis_permohonan'))
                                                        <span class="text-danger">{{ $errors->first('jenis_permohonan') }}</span>
                                                    @endif
                                                </div>
                                                <!-- Nama Aplikasi -->
                                                <div class="mb-3 {{ $errors->has('nama_aplikasi') ? ' has-error' : '' }}">
                                                    <label for="nama_aplikasi" class="form-label" style="font-weight: bold;">
                                                        Nama Aplikasi<span class="text-danger">*</span>
                                                        <a type="button" data-bs-toggle="modal"
                                                            data-bs-target="#exampleVerticallycenteredModal4"><i
                                                                class="fa fa-info-circle"></i>
                                                        </a>
                                                    </label>
                                                    <input type="text" placeholder="Nama Aplikasi" class="form-control form-control-sm @error('nama_aplikasi') is-invalid @enderror"
                                                        name="nama_aplikasi" id="nama_aplikasi" value="{{ old('nama_aplikasi') }}" required />

                                                    @if ($errors->has('nama_aplikasi'))
                                                        <span class="text-danger">{{ $errors->first('nama_aplikasi') }}</span>
                                                    @endif
                                                </div>
                                                <!-- Jenis Aplikasi -->
                                                <div class="mb-3 {{ $errors->has('jenis_aplikasi') ? ' has-error' : '' }}">
                                                    <label for="jenis_aplikasi" class="form-label" style="font-weight: bold;">
                                                        Jenis Aplikasi<span class="text-danger">*</span>
                                                        <a type="button" data-bs-toggle="modal"
                                                            data-bs-target="#exampleVerticallycenteredModal5"><i
                                                                class="fa fa-info-circle"></i>
                                                        </a>
                                                    </label>
                                                    <select id="jenis_aplikasi" name="jenis_aplikasi" class="form-control form-control-sm @error('jenis_aplikasi') is-invalid @enderror" required>
                                                        <option value="" selected disabled>[Pilih]</option>
                                                        @foreach ($jenisaplikasi as $list)
                                                            <option value="{{ $list->nama_jenis }}" {{ old('jenis_aplikasi') == $list->nama_jenis ? ' selected' : '' }}>
                                                                {{ $list->nama_jenis }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                    @if ($errors->has('jenis_aplikasi'))
                                                        <span class="text-danger">{{ $errors->first('jenis_aplikasi') }}</span>
                                                    @endif
                                                </div>
                                                <div class="mb-3 {{ $errors->has('deskripsi') ? ' has-error' : '' }}">
                                                    <label for="deskripsi" class="form-label" style="font-weight: bold;">
                                                        Deskripsi Aplikasi<span class="text-danger">*</span>
                                                        <a type="button" data-bs-toggle="modal"
                                                            data-bs-target="#exampleVerticallycenteredModal6"><i
                                                                class="fa fa-info-circle"></i>
                                                        </a>
                                                    </label>
                                                    <textarea id="deskripsi" name="deskripsi" placeholder="Deskripsi Aplikasi"
                                                        class="form-control form-control-sm @error('deskripsi') is-invalid @enderror" required>{{ old('deskripsi') }}</textarea>

                                                    @if ($errors->has('deskripsi'))
                                                        <span class="text-danger">{{ $errors->first('deskripsi') }}</span>
                                                    @endif
                                                </div>
                                                {{-- <x-forms.input_v id="file_surat" type="file" name="file_surat"
                                                    label="Surat Permohonan" isRequired="true" value=""
                                                    isReadonly="" placeholder="Surat Permohonan">
                                                    <span class="text-danger" style="font-style: italic">ukuran
                                                        maksimal: 5mb <br>format file :
                                                        pdf</span>
                                                </x-forms.input_v> --}}
                                                <div
                                                    class="mb-3 {{ $errors->has('file_surat') ? ' has-error' : '' }}">
                                                    <label class="form-label" style="font-weight: bold;">Surat
                                                        Permohonan<span class="text-danger">*</span>
                                                         <a type="button" data-bs-toggle="modal"
                                                            data-bs-target="#exampleVerticallycenteredModal7"><i
                                                                class="fa fa-info-circle"></i>
                                                        </a>

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
    <div class="modal fade" id="exampleVerticallycenteredModal1" tabindex="-1" aria-hidden="true">
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
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleVerticallycenteredModal2" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Informasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        Pastikan isi sesuai dengan instansi kerja anda

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleVerticallycenteredModal3" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Informasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        Pastikan pilih sesuai dengan jenis permohonan yang dibutuhkan
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleVerticallycenteredModal4" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Informasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        Pastikan isi nama aplikasi dengan benar

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleVerticallycenteredModal5" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Informasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        Pastikan pilih jenis aplikasi sesuai dengan yang dibutuhkan
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleVerticallycenteredModal6" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Informasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                      Pastikan aplikasi yang ingin diajukan dideskripsikan dengan jelas 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleVerticallycenteredModal7" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Informasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        Pastikan surat permohonan sudah benar dengan format PDF dan masksimal ukuran 2MB. 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="{{ asset('theme') }}/assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('theme') }}/assets/js/jquery.min.js"></script>
    <script src="{{ asset('theme') }}/assets/js/bootstrap.bundle.min.js"></script>

    <!-- Include Select2 CSS and JS if not already included -->
    <script>
        $(document).ready(function() {
            $('#opd_id').select2();
        });

        $(document).ready(function() {
            $('#jenis_aplikasi').select2();
        });
    </script>

</body>

</html>
