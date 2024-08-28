@extends('layouts.master')
@section('title')
    Data Permohonan Aplikasi
@endsection

@push('style')
    <!-- Data Tables -->
    <link rel="stylesheet" href="{{ asset('theme/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        /* Ganti background berdasarkan status */
        .status-pending {
            background-color: lightgrey;
            padding: 2px 5px;
            border-radius: 3px;
        }
        .status-disetujui {
            background-color: green;
            padding: 2px 5px;
            border-radius: 3px;
            color: white; /* Teks putih untuk kontras */
        }
        .status-ditolak {
            background-color: red;
            padding: 2px 5px;
            border-radius: 3px;
            color: white; /* Teks putih untuk kontras */
        }
        .status-proses {
            background-color: yellow;
            padding: 2px 5px;
            border-radius: 3px;
            color: black; /* Teks hitam untuk kontras */
        }
        .status-selesai {
            background-color: darkblue;
            padding: 2px 5px;
            border-radius: 3px;
            color: white; /* Teks putih untuk kontras */
        }
        .status-ditunda {
            background-color: orange;
            padding: 2px 5px;
            border-radius: 3px;
            color: white; /* Teks putih untuk kontras */
        }
    </style>
@endpush

@push('script')
    <!-- Data Tables js -->
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
                ajax: "{{ url('table/permohonan') }}",
                columns: [
                    { data: 'DT_RowIndex', name: 'id' },
                    { data: 'kd_permohonan', name: 'kd_permohonan' },
                    { data: 'jenis_permohonan', name: 'jenis_permohonan' },
                    { data: 'tanggal', name: 'tanggal' },
                    { data: 'nama_aplikasi', name: 'nama_aplikasi' },
                    { data: 'jenis_aplikasi', name: 'jenis_aplikasi' },
                    { data: 'deskripsi', name: 'deskripsi' },
                    { data: 'nama_opd', name: 'nama_opd' },
                    { 
                        data: 'status',
                        name: 'status',
                        render: function(data, type, full, meta) {
                            switch (data) {
                                case 'Pending':
                                    return '<span class="status-pending">' + data + '</span>';
                                case 'Permohonan Disetujui':
                                    return '<span class="status-disetujui">' + data + '</span>';
                                case 'permohonan ditolak':
                                    return '<span class="status-ditolak">' + data + '</span>';
                                case 'dalam proses pembuatan':
                                    return '<span class="status-proses">' + data + '</span>';
                                case 'selesai':
                                    return '<span class="status-selesai">' + data + '</span>';
                                case 'ditunda':
                                    return '<span class="status-ditunda">' + data + '</span>';
                                default:
                                    return data;
                            }
                        }
                    },
                    { data: 'action', name: 'action' },
                ]
            });

            $('body').on('click', '.hapus', function(event) {
                event.preventDefault();
                var token = $("meta[name='csrf-token']").attr("content");
                var permohonan_name = $(this).attr('permohonan-name'),
                    title = permohonan_name.replace(/\w\S*/g, function(txt) {
                        return txt.charAt(0).toUpperCase() + txt.substr(1).toUpperCase();
                    });
                permohonan_id = $(this).attr('permohonan-id');
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
                                url: "{{ route('permohonan.destroy', ':id') }}".replace(':id', permohonan_id),
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
                                    swal("Oops...", "Terjadi Kesalahan: " + xhr.responseJSON.messages, "error");
                                }
                            });
                        }
                    });
            });

            $(document).on('change', '.change_status', function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var aktif = $(this).prop('checked') == true ? 'Aktif' : 'NonAktif';
                var user_id = $(this).data('id');
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
            @can('permohonan-create')
                <div class="ms-auto mb-3">
                    {{-- <a class="btn btn-primary btn-sm text-right" href="{{ url('permohonan/' . $jenis . '/create') }}"><i
                            class="fa fa-plus-circle"></i> Buat Permohonan
                    </a> --}}
                </div>
            @endcan
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-0">Data Permohonan Aplikasi</h4>
                    <hr>
                    <table id="datatable" class="table table-hover table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Permohonan</th>
                                <th>Jenis Permohonan</th>
                                <th>Tanggal</th>
                                <th>Nama Aplikasi</th>
                                <th>Jenis Aplikasi</th>
                                <th>Deskripsi</th>
                                <th>Unit Kerja</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data akan diisi oleh DataTables -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--end page-content-wrapper-->
@endsection
