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
</head>

<body class="bg-register">
    <!-- wrapper -->
    <div class="wrapper">
        <div class="pengaduan-area full-bg"
            style="background-image: url('../frontend/img/your-background-image.jpg');">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="content" data-animation="animated fadeInUp">
                            <h2>Pengaduan</h2>
                            <p>Jika Anda memiliki masalah terhadap aplikasi atau jaringan anda, silakan klik tombol di bawah ini untuk mengisi form pengaduan.</p>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pengaduanModal">Buat Pengaduan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="pengaduanModal" tabindex="-1" aria-labelledby="pengaduanModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="pengaduanModalLabel">Form Pengaduan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('submit-pengaduan-aplikasi') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="mb-3">
                                <label class="form-label" style="font-weight: bold;">Judul Pengaduan
                                    <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm @error('judul') is-invalid @enderror"
                                    name="judul" id="judul" value="{{ old('judul') }}" />
                                @error('judul')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" style="font-weight: bold;">Isi Pengaduan
                                    <span class="text-danger">*</span></label>
                                <textarea class="form-control form-control-sm @error('isi') is-invalid @enderror"
                                    name="isi" id="isi" rows="4">{{ old('isi') }}</textarea>
                                @error('isi')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" style="font-weight: bold;">Nama Aplikasi
                                    <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm @error('nama_aplikasi') is-invalid @enderror"
                                    name="nama_aplikasi" id="nama_aplikasi" value="{{ old('nama_aplikasi') }}" />
                                @error('nama_aplikasi')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" style="font-weight: bold;">Jenis Pengaduan
                                    <span class="text-danger">*</span></label>
                                <select name="jenis_pengaduan" id="jenis_pengaduan"
                                    class="form-control form-control-sm @error('jenis_pengaduan') is-invalid @enderror">
                                    <option value="" selected disabled>[Pilih]</option>
                                    <option value="jaringan" {{ old('jenis_pengaduan') == 'jaringan' ? ' selected' : '' }}>Jaringan</option>
                                    <option value="aplikasi" {{ old('jenis_pengaduan') == 'aplikasi' ? ' selected' : '' }}>Aplikasi</option>
                                </select>
                                @error('jenis_pengaduan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" style="font-weight: bold;">Foto Pengaduan
                                    <span class="text-danger">*</span></label>
                                <input type="file" class="form-control form-control-sm @error('foto_pengaduan') is-invalid @enderror"
                                    name="foto_pengaduan[]" id="foto_pengaduan" multiple />
                                @error('foto_pengaduan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-12">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary"><i
                                            class="fa fa-arrow-right me-1"></i>Kirim Pengaduan</button>
                                </div>
                            </div>
                        </form>
                    </div>
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
