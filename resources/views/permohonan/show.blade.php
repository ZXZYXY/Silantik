@extends('layouts.master')
@section('title')
    Detail {{ ucfirst($jenis) }} Aplikasi
@endsection
@push('style')
@endpush

@push('script')
@endpush

@section('content')
    <!--page-content-wrapper-->
    <div class="page-content-wrapper">
        <div class="page-content">
            <button class="btn btn-primary btn-sm mb-3" onclick="window.history.back();"><i class="fa fa-reply"></i>
                Kembali</button>
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-0">Detail Permohonan {{ ucfirst($jenis) }} Aplikasi</h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card bg-info radius-15">
                                <div class="card-body">
                                    <table class="card-text text-white">
                                        <tr>
                                            <td colspan="3">
                                                <h4>Data Permohonan</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Kode Permohonan</th>
                                            <td>:</td>
                                            <td>{{ $data->kd_permohonan }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal</th>
                                            <td>:</td>
                                            <td>{{ TanggalAja($data->tanggal) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Nama Aplikasi</th>
                                            <td>:</td>
                                            <td>{{ $data->nama_aplikasi }}</td>
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
                                        <tr>
                                            <th>OPD</th>
                                            <td>:</td>
                                            <td>{{ $data->nama_opd }}</td>
                                        </tr>

                                        <tr>
                                            <th>File Surat Permohonan</th>
                                            <td>:</td>
                                            <td>{{ $data->file_surat }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <hr>
                            <div class="card bg-info radius-15">
                                <div class="card-body">
                                    <table class="card-text text-white">
                                        <tr>
                                            <td colspan="3">
                                                <h4>Data Pemohon</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Nama</th>
                                            <td>:</td>
                                            <td>{{ $pemohon->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Username</th>
                                            <td>:</td>
                                            <td>{{ $pemohon->username }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>:</td>
                                            <td>{{ $pemohon->email }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!--end page-content-wrapper-->
@endsection
