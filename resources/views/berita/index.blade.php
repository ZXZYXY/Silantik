@extends('layouts.master')
@section('title')
    Berita
@endsection
@push('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('theme/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@push('script')
    <script src="{{ asset('theme/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('theme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('theme/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('theme/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('theme/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('theme/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: "{{ route('table.berita') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'id'
                    },
                    {
                        data: 'judul',
                        name: 'judul'
                    },
                    {
                        data: 'kategori',
                        name: 'kategori'
                    },
                    {
                        data: 'gambar',
                        name: 'gambar'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                ]
            });

            $('body').on('click', '.hapus', function(event) {
                event.preventDefault();

                var token = $("meta[name='csrf-token']").attr("content");
                var berita_name = $(this).attr('berita-name'),
                    title = berita_name.replace(/\w\S*/g, function(txt) {
                        return txt.charAt(0).toUpperCase() + txt.substr(1).toUpperCase();
                    });
                berita_id = $(this).attr('berita-id');
                swal({
                        title: "Anda Yakin?",
                        text: "Mau Menghapus Data : " + title + "?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((result) => {
                        if (result) {

                            $.ajax({
                                url: "/berita/" + berita_id,
                                type: "POST",
                                data: {
                                    _method: "DELETE",
                                    _token: token,
                                },

                                success: function(response) {
                                    $('#datatable').DataTable().ajax.reload();
                                    swal("Berhasil", "Data Berhasil Dihapus", "success");
                                },
                                error: function(xhr) {
                                    swal("Oops...", "Terjadi Kesalahan", "error");

                                }
                            });
                        }
                    });
            });

        });
    </script>
@endpush

@section('content')
    <!--page-content-wrapper-->
    <div class="page-content-wrapper">
        <div class="page-content">
            @can('berita-create')
                <div class="ms-auto mb-3">
                    <a class="btn btn-primary btn-sm text-right" href="{{ route('berita.create') }}"><i
                            class="fa fa-plus-circle"></i>
                    </a>
                </div>
            @endcan


            <div class="card">
                <div class="card-body">
                    <h4 class="mb-0">Data Berita</h4>
                    <hr>

                    <div class="table-responsive">
                        <table id="datatable" class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul Halaman</th>
                                    <th>Kategori</th>
                                    <th>Gambar</th>
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
    </div>
    <!--end page-content-wrapper-->
@endsection
