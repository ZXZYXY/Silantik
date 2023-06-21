@extends('layouts.master')
@section('title')
    Pengaduan {{ ucfirst($jenis) }}
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
    <script type="text/javascript">
        $(document).ready(function() {
            $(".add-more").click(function() {
                var html = $(".copy").html();
                $(".after-add-more").after(html);
            });

            // saat tombol remove dklik control group akan dihapus 
            $("body").on("click", ".remove", function() {
                $(this).parents(".control-group").remove();
            });
        });
    </script>
    <script type="text/javascript">
        var i = 0;
        var max = 3;

        $("#add").click(function() {
            ++i;

            if (i <= 3) {
                console.log(i);
                $("#dynamicTable").append(`
                <tr>
                    <td><input type="file" name="foto_pengaduan[]" placeholder="" class="form-control form-control-sm" /></td>
                    <td><button type="button" class="btn btn-danger btn-xs remove-tr" id="remove"><i class="fa fa-trash"></i> Remove</button></td>
                </tr>`);
            } else {
                --i;
            }



        });

        // $("#remove").click(function() {
        //     $(this).parents('tr').remove();
        //     --i;
        // });

        $(document).on('click', '.remove-tr', function() {
            $(this).parents('tr').remove();
            --i;
            console.log(i);
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
                    <h4 class="mb-0">Form Pengaduan {{ ucfirst($jenis) }}</h4>
                    <hr>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ url('pengaduan/store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" name="jenis_pengaduan" value="{{ $jenis }}">
                                <x-forms.input_v id="judul" type="text" name="judul" label="Topik Masalah"
                                    isRequired="true" value="" isReadonly="" placeholder="Topik Masalah" />

                                @if ($jenis == 'aplikasi')
                                    <x-forms.select_v id="nama_aplikasi" name="nama_aplikasi" label="Nama Aplikasi"
                                        isRequired="true" isSelect2="true">
                                        <option value="" selected disabled>[Pilih]</option>
                                        @foreach ($daftar_aplikasi as $data)
                                            <option value="{{ $data->nama_aplikasi }}"
                                                {{ old('nama_aplikasi') == $data->nama_aplikasi ? ' selected' : '' }}>
                                                {{ $data->nama_aplikasi }} </option>
                                        @endforeach
                                    </x-forms.select_v>
                                @endif

                                <x-forms.textarea_v id="isi" type="text" name="isi" label="Detail Pengaduan"
                                    isRequired="true" value="" isReadonly="" placeholder="" />

                                <div id="pelatihan_sertifikat">
                                    <span class="text-danger">* Format : pdf, jpg, jpeg, png</span><br>
                                    <span class="text-danger">** Ukuran Maksimal : 5mb</span>
                                    <table width="100%" class="" id="dynamicTable" cellpadding="4" cellspacing="0">
                                        <tr>
                                            <th>Foto / Screenshoot Error</th>
                                            <th width="15%">Aksi</th>
                                        </tr>
                                        <tr>
                                            <td><input type="file" name="foto_pengaduan[]" placeholder=""
                                                    class="form-control form-control-sm" /></td>
                                            <td><button type="button" name="add" id="add"
                                                    class="btn btn-success btn-sm"><i class="fa fa-plus"></i>
                                                    Tambah</button></td>
                                        </tr>
                                    </table>

                                </div>
                                <button type="submit" class="btn btn-primary"><i class="lni lni-save"></i> Submit</button>

                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>

@endsection
