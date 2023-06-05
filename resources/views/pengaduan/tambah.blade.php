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

        $("#add").click(function() {

            ++i;

            $("#dynamicTable").append(`
        <tr>
          <td>
            <select name="jenis_pelatihan[]" class="form-control form-control-sm">
              <option value="" selected disabled>[Pilih Jenis Pelatihan]</option>
              <option value="Kursus Orientasi" @if (old('jenis_pelatihan') == 'Kursus Orientasi') selected @endif>Kursus Orientasi</option>
              <option value="KMD (Kursus Mahir Tingkat Dasar)" @if (old('jenis_pelatihan') == 'KMD (Kursus Mahir Tingkat Dasar)') selected @endif>KMD (Kursus Mahir Tingkat Dasar)</option>
              <option value="KML (Kursus Mahir Tingkat Lanjutan)" @if (old('jenis_pelatihan') == 'KML (Kursus Mahir Tingkat Lanjutan)') selected @endif>KML (Kursus Mahir Tingkat Lanjutan)</option>
              <option value="KPD (Kursus Pelatih Tingkat Dasar)" @if (old('jenis_pelatihan') == 'KPD (Kursus Pelatih Tingkat Dasar)') selected @endif>KPD (Kursus Pelatih Tingkat Dasar)</option>
              <option value="KPL (Kursus Pelatih Tingkat Lanjutan)" @if (old('jenis_pelatihan') == 'KPL (Kursus Pelatih Tingkat Lanjutan)') selected @endif>KPL (Kursus Pelatih Tingkat Lanjutan)</option>
            </select>
          </td>
          <td><input type="text" name="tahun_pelatihan[]" placeholder="Tahun" class="form-control form-control-sm" /></td>
          <td><input type="file" name="file_sertifikat[]" placeholder="" class="form-control form-control-sm" /></td><td><button type="button" class="btn btn-danger btn-xs remove-tr"><i class="fa fa-trash"></i> Remove</button>
          </td>
        </tr>`);
        });

        $(document).on('click', '.remove-tr', function() {
            $(this).parents('tr').remove();
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
                    <form action="{{ url('pengaduan/store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" name="jenis_pengaduan" value="{{ $jenis }}">
                                <x-forms.input_v id="judul" type="text" name="judul" label="Judul"
                                    isRequired="true" value="" isReadonly="" placeholder="Judul" />

                                <x-forms.textarea_v id="isi" type="text" name="isi" label="Detail Pengaduan"
                                    isRequired="true" value="" isReadonly="" placeholder="" />

                                <div id="pelatihan_sertifikat">

                                    <span class="text-danger">* Format : pdf, jpg, jpeg, png</span><br>
                                    <span class="text-danger">** Ukuran Maksimal : 5mb</span>
                                    <table width="100%" class="" id="dynamicTable" cellpadding="4" cellspacing="0">
                                        <tr>
                                            <th>Foto</th>
                                            <th width="15%">Aksi</th>
                                        </tr>
                                        <tr>
                                            <td><input type="file" name="file_sertifikat[]" placeholder=""
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
