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
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-0">Detail Permohonan</h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-hover table-bordered">
                                <tr>
                                    <td colspan="3">
                                        <h4>Data Pemohon</h4>
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

                            <hr>



                        </div>
                        <div class="col-md-6">
                            <table class="table table-hover table-bordered">
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
                                    <th>Unit Kerja/Perangkat Daerah</th>
                                    <td>:</td>
                                    <td>{{ $data->nama_opd }}</td>
                                </tr>

                                <tr>
                                    <th>File Surat Permohonan</th>
                                    <td>:</td>
                                    <td>
                                        <a href="{{ asset('storage/file_surat/' . $data->file_surat) }}" target="_blank"
                                            class="btn btn-info"><i class="fa fa-eye"></i> Lihat File</a>
                                    </td>
                                </tr>
                            </table>

                        </div>
                    </div>
                    <div class="row">
                        @if (auth()->user()->role == 'admin' or auth()->user()->role == 'superadmin')
                            <div class="col-md-6">
                                <div class="card bg-info radius-15">
                                    <div class="card-body text-white">
                                        <h4>Proses Permohonan</h4>

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

                                <hr>

                            </div>
                        @endif
                        <div class="col-md-6">
                            <h4>Histori Permohonan</h4>
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
@endsection
