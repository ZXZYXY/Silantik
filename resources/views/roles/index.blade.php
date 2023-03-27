@extends('layouts.master')
@section('title')
    Role Management
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
                ajax: "{{ route('table.role') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
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
                var role_name = $(this).attr('role-name'),
                    title = role_name.replace(/\w\S*/g, function(txt) {
                        return txt.charAt(0).toUpperCase() + txt.substr(1).toUpperCase();
                    });

                role_id = $(this).attr('role-id');
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
                                url: "/setting/roles/" + role_id,
                                type: "POST",
                                data: {
                                    _method: "DELETE",
                                    _token: token,
                                },
                                success: function(response) {
                                    $("#datatable").DataTable().ajax.reload(null, false);
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
    <div class="page-content-wrapper">
        <div class="page-content">
            @can('role-create')
                <a class="btn btn-primary btn-sm mb-3" href="{{ route('roles.create') }}"><i class="fa fa-plus-circle"></i>
                    Tambah</a>
            @endcan
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-0">Data Role</h4>
                    <hr>

                    <table class="table table-hover table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
@endsection
