@extends('layouts.master')
@section('title')
    Detail Pengaduan {{ ucfirst($jenis) }}
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
                    <h4 class="mb-0">Detail Pengaduan {{ ucfirst($jenis) }}</h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-hover">

                                <tr>
                                    <th>Kode Permohonan</th>
                                    <td>:</td>
                                    <td>{{ $data->kd_pengaduan }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal</th>
                                    <td>:</td>
                                    <td>{{ TanggalAja($data->tanggal) }}</td>
                                </tr>
                                <tr>
                                    <th>Topik Masalah</th>
                                    <td>:</td>
                                    <td>{{ $data->judul }}</td>
                                </tr>
                                @if ($jenis == 'aplikasi')
                                    <tr>
                                        <th>Nama Aplikasi</th>
                                        <td>:</td>
                                        <td>{{ $data->nama_aplikasi }}</td>
                                    </tr>
                                @endif
                                <tr>
                                    <th>Detail Masalah</th>
                                    <td>:</td>
                                    <td>{{ $data->isi }}</td>
                                </tr>


                            </table>
                            <h5>Foto / Screnshoot Aplikasi</h5>
                            <div class="row g-3">
                                @foreach ($foto as $f)
                                    <div class="col-12 col-lg-3">
                                        <a href="{{ asset('images/foto_pengaduan/' . $f->nama_foto) }}" target="_blank">
                                            <img src="{{ asset('images/foto_pengaduan/' . $f->nama_foto) }}"
                                                class="img-thumbnail" alt="">
                                        </a>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--end page-content-wrapper-->
@endsection
