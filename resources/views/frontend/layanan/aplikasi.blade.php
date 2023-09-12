<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Layanan Pembuatan Aplikasi - SILANTIK</title>
    <!--favicon-->
    <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
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
</head>

<body class="bg-register">
    <!-- wrapper -->
    <div class="wrapper">
        <div class="section-authentication-register d-flex align-items-center justify-content-center">
            <div class="row">
                <div class="col-12 col-lg-10 mx-auto">
                    <div class="card radius-15 overflow-hidden">
                        <div class="row g-0">
                            <div class="col-xl-6 bg-login-color d-flex align-items-center justify-content-center">
                                <img src="{{ asset('theme') }}/assets/images/login-images/register-frent-img.jpg"
                                    class="img-fluid" width="700px" alt="...">
                            </div>
                            <div class="col-xl-6">
                                <div class="card-body p-md-5">
                                    <div class="text-center">

                                        <img src="{{ asset('images') }}/logo_diskominfo_warna.png" width="200px"
                                            alt="logo-dark" />
                                        <h4 class="mt-4 font-weight-bold">Layanan Pembuatan/Pengembangan Aplikasi</h4>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 25%;"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
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
                                            <p>Masukan Detail Permohonan</p>
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



                                            <form action="{{ url('layanan-aplikasi') }}" method="get"
                                                class="row g-3">


                                                {{-- <div class="col-12">
                                                    <label for="">No HP</label>
                                                    <input type="text" name="no_hp"
                                                        class="form-control"placeholder="Nomor HP">
                                                </div> --}}

                                                <x-forms.select_v id="jenis_permohonan" name="jenis_permohonan"
                                                    label="Jenis Permohonan" isRequired="true" isSelect2="true">
                                                    <option value="" selected disabled>[Pilih]</option>
                                                    <option value="pembuatan">Pembuatan Aplikasi Baru</option>
                                                    <option value="pembaruan">Pembaruan/Pengembangan Aplikasi</option>
                                                </x-forms.select_v>

                                                <x-forms.input_v id="nama_aplikasi" type="text" name="nama_aplikasi"
                                                    label="Nama Aplikasi" isRequired="true" value=""
                                                    isReadonly="" placeholder="Nama Aplikasi" />

                                                <x-forms.select_v id="jenis_aplikasi" name="jenis_aplikasi"
                                                    label="Jenis Aplikasi" isRequired="true" isSelect2="true">
                                                    <option value="" selected disabled>[Pilih]</option>
                                                    @foreach ($jenisaplikasi as $list)
                                                        <option value="{{ $list->nama_jenis }}"
                                                            {{ old('roles') == $list->nama_jenis ? ' selected' : '' }}>
                                                            {{ $list->nama_jenis }} </option>
                                                    @endforeach
                                                </x-forms.select_v>

                                                <x-forms.textarea_v id="deskripsi" type="text" name="deskripsi"
                                                    label="Deskripsi Aplikasi" isRequired="true" value=""
                                                    isReadonly="" placeholder="Deskripsi Aplikasi" />

                                                <x-forms.input_v id="file_surat" type="file" name="file_surat"
                                                    label="Surat Permohonan" isRequired="false" value=""
                                                    isReadonly="" placeholder="Surat Permohonan" />

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

    <script src="{{ asset('theme') }}/assets/js/jquery.min.js"></script>
    <script src="{{ asset('theme') }}/assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>
