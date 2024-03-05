@extends('layouts.master')

@section('title')
    FAQ
@endsection
@push('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('theme/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('theme/plugins/summernote/summernote-bs4.min.css') }}">
@endpush

@section('content')
    <!--page-content-wrapper-->
    <div class="page-content-wrapper">
        <div class="page-content">
            @can('faq-create')
                <div class="ms-auto mb-3">
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#ShowTambah"><i
                            class="fa fa-plus-circle"></i> Tambah</button>
                </div>
            @endcan
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-0">FAQ</h4>
                    <hr>

                    <table id="datatable" class="table table-hover table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Pertanyaan</th>
                                <th>Jawaban</th>
                                <th>Kategori</th>
                                <th>Urutan</th>
                                <th>Publish</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <!--end page-content-wrapper-->

    @include('faq.tambah')
@endsection
@push('script')
    <script src="{{ asset('theme/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('theme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('theme/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('theme/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('theme/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('theme/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('crud/app.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('theme/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#jawaban').summernote()
            //Tabel
            $('#datatable').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: "{{ route('table.faq') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'id'
                    },
                    {
                        data: 'pertanyaan'
                    },
                    {
                        data: 'jawaban'
                    },
                    {
                        data: 'kategori'
                    },
                    {
                        data: 'urutan'
                    },
                    {
                        data: 'publish'
                    },
                    {
                        data: 'action'
                    }
                ]
            });

            //Hapus
            $('body').on('click', '.hapus', function(event) {
                event.preventDefault();

                var faq_name = $(this).attr('faq-name'),
                    title = faq_name.replace(/\w\S*/g, function(txt) {
                        return txt.charAt(0).toUpperCase() + txt.substr(1).toUpperCase();
                    });
                faq_id = $(this).attr('faq-id');
                swal({
                    title: "Anda Yakin?",
                    text: "Mau Menghapus Data : " + title + "?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((result) => {
                    if (result) {
                        $.ajax({
                            url: "/faq/" + faq_id + "/delete",

                            success: function(response) {
                                $('#datatable').DataTable().ajax.reload();
                                swal({
                                    type: "success",
                                    icon: "success",
                                    title: "BERHASIL!",
                                    text: "Data Berhasil Dihapus",
                                    timer: 1500,
                                    showConfirmButton: false,
                                    showCancelButton: false,
                                    buttons: false,
                                });
                            },
                            error: function(xhr) {
                                swal("Oops...", "Terjadi Kesalahan", "error");

                            }
                        });
                    }
                });
            });

            //Edit
            $("#ShowEDIT").on("show.bs.modal", function(e) {
                var id = $(e.relatedTarget).data('target-id');
                $.ajax({
                    url: "/faq" + '/' + id + '/edit',
                    dataType: 'html',
                    success: function(response) {
                        $('.isi').html(response);
                    }
                });

            });


        });
    </script>
@endpush
