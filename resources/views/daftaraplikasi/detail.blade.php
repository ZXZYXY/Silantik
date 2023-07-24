@extends('layouts.master')
@section('title')
    Detail Aplikasi
@endsection
@push('style')
    <link href="{{ asset('theme') }}/select2/css/select2.min.css" rel="stylesheet" />
    <style>
        .foto_ss {
            position: relative;
            width: 100%;
        }

        .image_ss {
            opacity: 1;
            display: block;
            width: 100%;
            height: auto;
            transition: .5s ease;
            backface-visibility: hidden;
        }

        .middle {
            transition: .5s ease;
            opacity: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            text-align: center;
        }

        .foto_ss:hover .img-thumbnail {
            opacity: 0.3;
        }

        .foto_ss:hover .middle {
            opacity: 1;
        }

        .text {
            background-color: #04AA6D;
            color: white;
            font-size: 16px;
            padding: 16px 32px;
        }
    </style>
@endpush

@push('script')
    <script src="{{ asset('theme') }}/select2/js/select2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endpush

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <button class="btn btn-primary btn-sm mb-3" onclick="window.history.back();"><i class="fa fa-reply"></i>
                Kembali</button>
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-0">Detail Aplikasi</h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-hover">
                                <tr>
                                    <th>Tahun Pembuatan</th>
                                    <td>:</td>
                                    <td>{{ $data->tahun_pembuatan }}</td>
                                </tr>
                                <tr>
                                    <th>Nama Aplikasi</th>
                                    <td>:</td>
                                    <td>{{ $data->nama_aplikasi }}</td>
                                </tr>
                                <tr>
                                    <th>Deskripsi</th>
                                    <td>:</td>
                                    <td>{{ $data->deskripsi }}</td>
                                </tr>
                                <tr>
                                    <th>Link Aplikasi</th>
                                    <td>:</td>
                                    <td><a href="{{ $data->link_app }}" target="_blank">{{ $data->link_app }}</a></td>
                                </tr>
                                <tr>
                                    <th>Jenis Aplikasi</th>
                                    <td>:</td>
                                    <td>{{ $data->jenis_aplikasi }}</td>
                                </tr>
                                <tr>
                                    <th>Unit Kerja/Perangkat Daerah Pengelola</th>
                                    <td>:</td>
                                    <td>{{ $data->opd->nama_opd }} ({{ $data->opd->singkatan }})</td>
                                </tr>
                                <tr>
                                    <th>Nama Konsultan/Instansi Pengembang</th>
                                    <td>:</td>
                                    <td>{{ $data->nama_konsultan }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-hover">

                                <tr>
                                    <th>Sektor</th>
                                    <td>:</td>
                                    <td>
                                        @if ($data->sektor_id != null)
                                            {{ $data->sektor->nama_sektor }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Status Aktif</th>
                                    <td>:</td>
                                    <td>
                                        @if ($data->status_aktif == 'Aktif')
                                            <span
                                                class="badge rounded-pill bg-primary">{{ strtoupper($data->status_aktif) }}</span>
                                        @else
                                            <span
                                                class="badge rounded-pill bg-danger">{{ strtoupper($data->status_aktif) }}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Integrasi</th>
                                    <td>:</td>
                                    <td>{{ $data->integrasi }}</td>
                                </tr>
                                @if ($data->integrasi == 'Ya')
                                    <tr>
                                        <th>Aplikasi yang Terintegrasi</th>
                                        <td>:</td>
                                        <td>{{ $data->app_integrasi }}</td>
                                    </tr>
                                @else
                                @endif

                                <tr>
                                    <th>Perwal</th>
                                    <td>:</td>
                                    <td>{{ $data->ada_perwal }}</td>
                                </tr>
                                @if ($data->ada_perwal == 'Ya')
                                    <tr>
                                        <th>Dokumen Perwal</th>
                                        <td>:</td>
                                        <td>
                                            @if ($data->file_perwal != null)
                                                <button type="button" class="btn btn-info btn-sm mt-2 mb-2"
                                                    data-bs-toggle="modal" data-bs-target="#exampleLargeModal"><i
                                                        class="fa fa-eye"></i> Lihat
                                                    Perwal</button>
                                            @else
                                                <i class="text-danger">Belum ada Dokumen</i>
                                            @endif
                                        </td>
                                    </tr>
                                @else
                                @endif
                                <tr>
                                    <th>Logo Aplikasi</th>
                                    <td>:</td>
                                    <td>
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
                                    </td>
                                </tr>

                                <tr>
                                    <th>Halaman Awal Aplikasi</th>
                                    <td>:</td>
                                    <td>
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
                                    </td>
                                </tr>
                            </table>
                        </div>

                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Screenshot Aplikasi</h5>
                            <button type="button" class="btn btn-info btn-sm mt-2 mb-2" data-bs-toggle="modal"
                                data-bs-target="#tambahScreenshot"><i class="fa fa-plus-circle"></i> Tambah</button>

                            <div class="row g-3">
                                @if (count($ss_aplikasi) >= 1)
                                    @foreach ($ss_aplikasi as $item)
                                        <div class="col-12 col-lg-3">
                                            <div class="foto_ss">
                                                <img src="{{ asset('storage/images/ss/' . $item->nama_file) }}"
                                                    class="img-thumbnail" alt=""
                                                    style="object-fit: cover; position: relative; width: 250px; height: 150px; overflow: hidden;">
                                                <div class="middle">
                                                    <a href="{{ asset('storage/images/ss/' . $item->nama_file) }}"
                                                        target="_blank" class="btn btn-info"><i class="lni lni-eye"></i></a>
                                                    <button class="btn btn-danger"><i class="lni lni-trash"></i></button>
                                                </div>
                                            </div>

                                        </div>
                                    @endforeach
                                @else
                                    <div class="m-4">
                                        Tidak ada Data
                                    </div>
                                @endif

                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5>Dokumen Pendukung</h5>
                            <button type="button" class="btn btn-info btn-sm mt-2 mb-2" data-bs-toggle="modal"
                                data-bs-target="#tambahDokumen"><i class="fa fa-plus-circle"></i> Tambah Dokumen</button>
                        </div>
                    </div>


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

                    <embed src="{{ asset('dokumen/perwal/' . $data->file_perwal) }}" type="application/pdf" frameBorder="0"
                        height="720px" width="100%"></embed>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal screenshoot-->
    <div class="modal fade" id="tambahScreenshot" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Screenshoot</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('upload.images') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="daftaraplikasi_id" value="{{ $data->id }}">
                        <input type="text" name="kategori" value="ss">
                        <div class="mb-3">
                            <label class="form-label">Screenshoot Aplikasi</label>
                            <input type="file" placeholder="" class="form-control form-control-sm" name="foto_ss[]"
                                id="foto_ss" multiple />
                        </div>

                        <button class="btn btn-primary" type="submit">Upload</button>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Dokumen-->
    <div class="modal fade" id="tambahDokumen" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Dokumen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('upload.images') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="daftaraplikasi_id" value="{{ $data->id }}">
                        <input type="text" name="kategori" value="dokumen">

                        <div class="mb-3">
                            <label class="form-label">Dokumen</label>
                            <input type="file" placeholder="" class="form-control form-control-sm" name="foto_ss[]"
                                id="foto_ss" multiple />
                        </div>

                        <button class="btn btn-primary" type="submit">Upload</button>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
