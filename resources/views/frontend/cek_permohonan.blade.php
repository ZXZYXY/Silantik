<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Cek Status Permohonan</title>
        <!--favicon-->
        <link rel="icon" href="{{ asset('images/' . konfigurasi()->favicon) }}">
        <!-- loader-->
        <link href="{{ asset('theme') }}/assets/css/pace.min.css" rel="stylesheet">
        <script src="{{ asset('theme') }}/assets/js/pace.min.js"></script>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('theme') }}/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&family=Roboto&display=swap">
        <!-- Icons CSS -->
        <link rel="stylesheet" href="{{ asset('theme') }}/assets/css/icons.css">
        <!-- App CSS -->
        <link rel="stylesheet" href="{{ asset('theme') }}/assets/css/app.css">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{ asset('theme') }}/plugins/fontawesome-free/css/all.min.css">

        <style>
            @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Syne:wght@400..800&display=swap');
            .status-pending {
                background-color: lightgrey;
                padding: 2px 5px;
                border-radius: 3px;
            }
            .status-disetujui {
                background-color: green;
                padding: 2px 5px;
                border-radius: 3px;
            }
            .status-ditolak {
                background-color: red;
                padding: 2px 5px;
                border-radius: 3px;
            }
            .status-proses {
                background-color: yellow;
                padding: 2px 5px;
                border-radius: 3px;
            }
            .status-selesai {
                background-color: blue;
                padding: 2px 5px;
                border-radius: 3px;
                color: white;
            }
            .status-ditunda {
                background-color: orange;
                padding: 2px 5px;
                border-radius: 3px;
                color: white;
            }
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
                    <div class="col-md-12 col-lg-13 mx-auto">
                        <div class="card radius-15 overflow-hidden">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card-body p-md-5">
                                        <div class="text-center">
                                            <img src="{{ asset('images') }}/logo_diskominfo_warna.png" width="200px" alt="logo-dark">
                                            <h4 class="mt-4 font-weight-bold">Cek Status Permohonan</h4>
                                        </div>
                                        <hr>
                                        @if (session('error'))
                                            <div class="alert alert-danger">
                                                {{ session('error') }}
                                            </div>
                                        @endif
                                        <form action="{{ route('cek_permohonan_status') }}" method="GET">
                                            <div class="form-group font-weight-bold">
                                                <label for="kd_permohonan">Masukkan Kode Permohonan:</label>
                                                <input type="text" class="form-control" id="kd_permohonan" name="kd_permohonan" required>
                                            </div>
                                            <!-- Tombol Tampilkan Hasil Permohonan -->
                                            <div class="text-center mt-4 ">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary mt-2 ">Cek Status</button>
                                                </div>
                                            </div>
                                        </form>
                                        
                                        @isset($permohonan)
                                        <!-- Tampilkan hasil permohonan jika sudah ada -->
                                        <div class="text-center mt-4">
                                            <p>Status: 
                                                <span class="
                                                    @if ($permohonan->status == 'Pending') status-pending
                                                    @elseif ($permohonan->status == 'Permohonan Disetujui') status-disetujui
                                                    @elseif ($permohonan->status == 'Permohonan Ditolak') status-ditolak
                                                    @elseif ($permohonan->status == 'Dalam Proses Pembuatan') status-proses
                                                    @elseif ($permohonan->status == 'Selesai') status-selesai
                                                    @elseif ($permohonan->status == 'Ditunda') status-ditunda
                                                    @endif
                                                ">
                                                {{ $permohonan->status }}
                                                </span>
                                            </p>
                                            <h3 class="font-weight-bold">Detail Permohonan:</h3>
                                            <!-- Tombol untuk melihat hasil permohonan -->
                                            <div class="d-grid">
                                                <a href="{{ route('hasil_permohonan', $permohonan->id) }}" class="btn btn-primary">Hasil Permohonan Lengkapnya</a>
                                            </div>
                                        </div>
                                        @endisset
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
