<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hasil Permohonan</title>
    <!--favicon-->
    <link rel="icon" href="{{ asset('images/' . konfigurasi()->favicon) }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('theme') }}/assets/css/bootstrap.min.css">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{ asset('theme') }}/assets/css/icons.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{ asset('theme') }}/assets/css/app.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('theme') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- Smart Wizard CSS -->
    <link href="{{ asset('theme') }}/assets/plugins/smart-wizard/css/smart_wizard_all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Syne:wght@400..800&display=swap');

        .card-body .custom-box {
            background-color: #E9F0FD;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .custom-box h3 {
            margin-bottom: 15px;
            font-size: 1.2rem;
        }

        .custom-box p {
            font-size: 1rem;
            color: #6c757d;
            margin-bottom: 0;
        }

        .cards {
            position: relative;
            display: flex;
            flex-direction: column;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 2px solid rgba(0, 0, 0, .125);
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.3);
            border-radius: .25rem;
            padding: 20px;
            max-width: 1000px;
            margin: 0 auto;
        }

        .custom-box .form-group {
            display: flex;
            flex-direction: column; /* Stack label and p vertically */
            align-items: flex-start;
            margin-bottom: 1rem;
        }

        .custom-box .form-label {
            font-weight: bold;
            margin-bottom: 5px; /* Space between label and p */
            font-size: 1rem;
        }

        .custom-box .form-content p {
            font-size: 1rem;
            color: #6c757d;
            margin-bottom: 0;
            flex: 1;
        }

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

        .font-weight-bold {
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
                <div class="col-12 col-lg-13 mx-auto">
                    <div class="card radius-15 overflow-hidden">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card-body p-md-5">
                                    <div class="text-center">
                                        <img src="{{ asset('images') }}/logo_diskominfo_warna.png" width="200px"
                                            alt="logo-dark" />
                                        <h4 class="mt-5 font-weight-bold">Hasil Permohonan</h4>
                                    </div>

                                    @if ($permohonan)
                                    <div class="cards mt-4">
                                        <div class="card-body">

                                            <div class="custom-box">
                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                    <h3 class="card-title mb-1 font-weight-bold">Kode Permohonan:</h3>
                                                    <p>{{ $permohonan->kd_permohonan }}</p>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                    <h3 class="card-title mb-0 font-weight-bold">Status:</h3>
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
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="custom-box">
                                                <h3 class="card-title font-weight-bold">Detail Pemohon</h3>
                                                
                                                <div class="form-group">
                                                    <label class="form-label">NIP :</label>
                                                    <div class="form-content">
                                                        <p>{{ $permohonan->nip }}</p>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label">Nama :</label>
                                                    <div class="form-content">
                                                        <p>{{ $permohonan->nama }}</p>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label">Jabatan :</label>
                                                    <div class="form-content">
                                                        <p>{{ $permohonan->jabatan }}</p>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label">Nama OPD :</label>
                                                    <div class="form-content">
                                                        <p>{{ $permohonan->nama_opd }}</p>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label">Nomor HP :</label>
                                                    <div class="form-content">
                                                        <p>{{ $permohonan->no_hp }}</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="custom-box">
                                                <h3 class="card-title font-weight-bold">Detail Aplikasi</h3>
                                                
                                                <div class="form-group">
                                                    <label class="form-label">Jenis Permohonan:</label>
                                                    <div class="form-content">
                                                        <p>{{ $permohonan->jenis_permohonan }}</p>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label">Nama Aplikasi:</label>
                                                    <div class="form-content">
                                                        <p>{{ $permohonan->nama_aplikasi }}</p>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label">Jenis Aplikasi:</label>
                                                    <div class="form-content">
                                                        <p>{{ $permohonan->jenis_aplikasi }}</p>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label">Deskripsi Aplikasi:</label>
                                                    <div class="form-content">
                                                        <p>{{ $permohonan->deskripsi }}</p>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="text-center mt-4 d-grid">
                                            <a href="{{ url('/') }}" class="btn btn-primary">Kembali ke Beranda</a>
                                        </div>
                                    </div>
                                    @else
                                    <div class="alert alert-danger mt-4">
                                        Data permohonan tidak ditemukan.
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!--end row-->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="{{ asset('theme') }}/assets/js/jquery.min.js"></script>
    <script src="{{ asset('theme') }}/assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
