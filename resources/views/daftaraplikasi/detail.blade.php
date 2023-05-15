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
                            <th>Link Aplikasi</th>
                            <td>:</td>
                            <td>{{ $data->link_app }}</td>
                        </tr>
                        <tr>
                            <th>OPD</th>
                            <td>:</td>
                            <td>{{ $data->opd->nama_opd }}</td>
                        </tr>
                        <tr>
                            <th>Jenis Aplikasi</th>
                            <td>:</td>
                            <td>{{ $data->jenis_aplikasi }}</td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td>:</td>
                            <td>{{ $data->deskripsi }}</td>
                        </tr>
                    </table>


                </div>
            </div>
        </div>
    </div>
@endsection
