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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&family=Roboto&display=swap" />
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{ asset('theme') }}/assets/css/icons.css" />
    <!-- App CSS -->
    <link rel="stylesheet" href="{{ asset('theme') }}/assets/css/app.css" />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('theme') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="{{ asset('theme/sweetalert2/sweetalert2.min.css') }}">

    <style>
        .card {
            padding: 10px 30px 50px;
        }
    </style>
</head>
<body class="bg-register">
    <!-- wrapper -->
    <div class="wrapper">
        <div class="section-authentication-register2 d-flex align-items-center justify-content-center">
            <div class="row">
                <div class="col-12 col-lg-13 mx-auto">
                    <div class="card radius-15 overflow-hidden">
                        <div class="row g-0">
                            <div class="col-xl-12">
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="{{ asset('images') }}/logo_diskominfo_warna.png" width="200px" alt="logo-dark" />
                                        <h4 class="mt-4 font-weight-bold">Pengaduan Aplikasi</h4>
                                    </div>
                                    <hr>
                                    <div class="">
                                        <div class="form-body">
                                            <h3 class="text-center"><i class="fa fa-check-circle text-success"></i> <br>
                                                Pengaduan Berhasil</h3>
                                            <h5 class="text-center">Mohon tunggu tanggapan dari admin melalui nomor WA</h5>
                                            <div class="text-center mt-4">
                                                <a href="{{ url('/') }}" class="btn btn-primary">Kembali ke Beranda</a>
                                            </div>
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

    <!-- Scripts -->
    <script src="{{ asset('theme') }}/assets/js/jquery.min.js"></script>
    <script src="{{ asset('theme/sweetalert2/sweetalert2.min.js') }}"></script>
    <script>
        @if (session()->has('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                timer: 1500,
                showConfirmButton: false
            });
        @elseif (session()->has('gagal'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '{{ session('gagal') }}'
            });
        @endif
    </script>
</body>
</html>
