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
        <div class="section-authentication-register2 d-flex align-items-center justify-content-center">
            <div class="row">
                <div class="col-12 col-lg-8 mx-auto">
                    <div class="card radius-15 overflow-hidden">
                        <div class="row g-0">
                            <div class="col-xl-6 bg-login-color d-flex align-items-center justify-content-center">
                                <img src="{{ asset('theme') }}/assets/images/login-images/register-frent-img.jpg"
                                    class="img-fluid" width="700px" alt="...">
                            </div>
                            <div class="col-xl-6">
                                <div class="card-body">
                                    <div class="text-center">

                                        <img src="{{ asset('images') }}/logo_diskominfo_warna.png" width="200px"
                                            alt="logo-dark" />
                                        <h4 class="mt-4">Layanan Pembuatan/Pembaruan Aplikasi</h4>
                                    </div>

                                    <hr>

                                    <div class="">
                                        <div class="form-body">
                                            <h3 class="text-center"><i class="fa fa-check-circle text-success"></i> <br>
                                                Permohonan Berhasil</h3>
                                            <h5 class="text-center">Nomor Permohonan anda :
                                                <strong>{{ $permohonan->kd_permohonan }}</strong>
                                            </h5>
                                            <p class="text-center">Mohon untuk menunggu konfimasi dari admin melalui nomor whatsapp atau anda bisa mengeceknya dengan nomor permohonan anda. <br></p>
                                            <div class="text-center mt-5">
                                                <a href="{{ url('/') }}" class="btn btn-primary font-weight-bold">Kembali ke Beranda</a>
                                                <a href="{{ url('cek-permohonan') }}" class="btn btn-primary font-weight-bold">Cek Permohonan</a>
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

    <script src="{{ asset('theme') }}/assets/js/jquery.min.js"></script>
    <script src="{{ asset('theme/sweetalert/sweetalert.min.js') }}"></script>
    <script>
        @if (session()->has('success'))
            swal({
                icon: "success",
                title: "BERHASIL!",
                text: "{{ session('success') }}",
                timer: 1500,
                buttons: false,
            });
        @elseif (session()->has('gagal'))
            swal({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('gagal') }}",
            });
        @else
        @endif
    </script>

</body>

</html>
