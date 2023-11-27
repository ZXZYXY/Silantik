@extends('layouts.master')
@section('title')
    Detail Permohonan Aplikasi
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
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4>Detail</h4>
                            <table class="table table-hover">
                                <tr>
                                    <td colspan="3">
                                        <h5>Data Pemohon</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Nama</th>
                                    <td>:</td>
                                    <td>{{ $data->nama }}</td>
                                </tr>
                                <tr>
                                    <th>NIP</th>
                                    <td>:</td>
                                    <td>{{ $data->nip }}</td>
                                </tr>
                                <tr>
                                    <th>Jabatan</th>
                                    <td>:</td>
                                    <td>{{ $data->jabatan }}</td>
                                </tr>
                                <tr>
                                    <th>No. WA</th>
                                    <td>:</td>
                                    <td>{{ $data->no_hp }}</td>
                                </tr>
                            </table>

                            <table class="table table-hover">
                                <tr>
                                    <td colspan="3">
                                        <h5>Data Permohonan</h5>
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
                                    <th>Unit Kerja/Perangkat Daerah</th>
                                    <td>:</td>
                                    <td>{{ $data->nama_opd }}</td>
                                </tr>

                                <tr>
                                    <th>File Surat Permohonan</th>
                                    <td>:</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm mt-2 mb-2" data-bs-toggle="modal"
                                            data-bs-target="#exampleLargeModal"><i class="fa fa-eye"></i> Lihat
                                            File</button>



                                    </td>
                                </tr>
                            </table>

                            @if (auth()->user()->role == 'admin' or auth()->user()->role == 'superadmin')
                                <div class="card bg-info radius-15">
                                    <div class="card-body text-white">
                                        <h4>Proses</h4>

                                        <form action="{{ url('permohonan/proses') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="uuid" value="{{ $data->uuid }}">
                                            <x-forms.select_v id="status" name="status" label="Status" isRequired="true"
                                                value="" isSelect2="false">
                                                <option value="">[Pilih]</option>
                                                @foreach ($status as $list)
                                                    <option value="{{ $list->nama_status }}"
                                                        {{ $data->status == $list->nama_status ? ' selected' : '' }}>
                                                        {{ $list->nama_status }} </option>
                                                @endforeach
                                            </x-forms.select_v>

                                            <x-forms.textarea_v id="keterangan_status" type="text"
                                                name="keterangan_status" label="Keterangan Status/Tanggapan"
                                                isRequired="false" value="{{ $data->keterangan_status }}" isReadonly=""
                                                placeholder="Keterangan Status" />

                                            <button type="submit" class="btn btn-primary btn-block"><i
                                                    class="fa fa-save"></i>
                                                Simpan</button>

                                        </form>
                                    </div>
                                </div>
                            @endif

                        </div>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4>Riwayat</h4>
                            <ul class="list-group">
                                @foreach ($histori as $h)
                                    <div class="list-group mt-3">
                                        <a href="#" class="list-group-item list-group-item-action bg-light">
                                            <div class="d-flex w-100 justify-content-between ">
                                                <h5 class="mb-1">{{ $h->status }}</h5>
                                                <small>{{ TanggalAja($h->created_at) }}</small>
                                            </div>
                                            <p class="mb-1">
                                                Keterangan : {{ $h->keterangan_status }} <br>
                                                <small>Admin : {{ $h->name }}</small>
                                            </p>
                                        </a>

                                    </div>
                                @endforeach


                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end page-content-wrapper-->

    <div class="modal fade" id="exampleLargeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Surat Permohonan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <embed src="{{ asset('storage/file_surat/' . $data->file_surat) }}" type="application/pdf"
                        frameBorder="0" height="720px" width="100%"></embed>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
