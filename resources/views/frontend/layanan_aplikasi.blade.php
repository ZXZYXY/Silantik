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
                                        <div class="progress-bar" role="progressbar" style="width: 0%;"
                                            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">25%</div>
                                    </div>
                                    <hr>

                                    <div class="">
                                        <div class="form-body">
                                            <h4>1. Data Pemohon</h4>
                                            <p>Masukan NIP (Nomor Induk Pegawai) PIC Pemohon Pengajuan Aplikasi</p>
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
                                            @if (session()->has('gagal'))
                                                <div
                                                    class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                                                    <div class="text-white">{{ session('gagal') }}!</div>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                        aria-label="Close"></button>
                                                </div>
                                            @endif
                                            <form action="{{ url('layanan/aplikasi/cek-nip') }}" method="get"
                                                class="">


                                                <div class="col-12">
                                                    <input type="text" name="nip" class="form-control"
                                                        placeholder="NIP (Nomor Induk Pegawai)">
                                                </div>

                                                <div class="col-12">
                                                    <div class="d-grid">
                                                        <button type="submit" class="btn btn-primary mt-2"><i
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


</body>

</html>
