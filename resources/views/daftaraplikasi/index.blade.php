@extends('layouts.master')
@section('title')
    Daftar Aplikasi
@endsection
@push('style')
    <!--Data Tables -->
    <link rel="stylesheet" href="{{ asset('theme/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@push('script')
    <!--Data Tables js-->
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
                ajax: "{{ route('table.daftaraplikasi') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'id'
                    },
                    {
                        data: 'tahun_pembuatan',
                        name: 'tahun_pembuatan'
                    },
                    {
                        data: 'nama_aplikasi',
                        name: 'nama_aplikasi'
                    },
                    {
                        data: 'link_app',
                        name: 'link_app'
                    },
                    {
                        data: 'opd',
                        name: 'opd'
                    },
                    {
                        data: 'jenis',
                        name: 'jenis'
                    },
                    {
                        data: 'screenshoot',
                        name: 'screenshoot'
                    },
                    {
                        data: 'file_pendukung',
                        name: 'file_pendukung'
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
                var user_name = $(this).attr('user-name'),
                    title = user_name.replace(/\w\S*/g, function(txt) {
                        return txt.charAt(0).toUpperCase() + txt.substr(1).toUpperCase();
                    });
                user_id = $(this).attr('user-id');
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
                                url: "/users/" + user_id,
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

            $(document).on('change', '.change_status', function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var aktif = $(this).prop('checked') == true ? 'Aktif' : 'NonAktif';
                var user_id = $(this).data('id');
                //alert(user_id);
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/changeStatus',
                    data: {
                        'status': status,
                        'user_id': user_id
                    },
                    success: function(data) {
                        console.log(data.success)
                        $('#aktif' + user_id).text(aktif);
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
            @can('daftaraplikasi-create')
                <div class="ms-auto mb-3">
                    <a class="btn btn-primary btn-sm" href="{{ route('daftaraplikasi.create') }}"><i
                            class="fa fa-plus-circle"></i>
                        Tambah</a>
                </div>
            @endcan
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-0">Data Aplikasi</h4>
                    <hr>

                    <div class="table-responsive">
                        <table id="datatable" class="table table-hover table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tahun Pembuatan</th>
                                    <th>Nama Aplikasi</th>
                                    <th>Link App</th>
                                    <th>OPD</th>
                                    <th>Jenis</th>
                                    <th>Screenshoot Aplikasi</th>
                                    <th>File Pendukung</th>
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
