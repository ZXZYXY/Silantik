@extends('layouts.master')
@section('title')
    Detail Aplikasi
@endsection
@push('style')
    <link href="{{ asset('theme') }}/select2/css/select2.min.css" rel="stylesheet" />
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
                                    <td>{{ $data->sektor->nama_sektor }}</td>
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
                                                <i class="text-danger">Belum ada File</i>
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
                                            <i class="text-danger">Belum ada File</i>
                                        @endif
                                    </td>
                                </tr>
                            </table>
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
@endsection
