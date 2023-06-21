@extends('layouts.master')
@section('title')
    Pengaduan {{ ucfirst($jenis) }}
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
            var jenis = "{{ $jenis }}";
            $('#datatable').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: "{{ url('table/pengaduan') }}" + "/" + jenis,
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'id'
                    },
                    {
                        data: 'kd_pengaduan',
                        name: 'kd_pengaduan'
                    },
                    {
                        data: 'tanggal',
                        name: 'tanggal'
                    },
                    {
                        data: 'judul',
                        name: 'judul'
                    },
                    @if ($jenis == 'aplikasi')
                        {
                            data: 'nama_aplikasi',
                            name: 'nama_aplikasi'
                        },
                    @endif {
                        data: 'isi',
                        name: 'isi'
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
                var pengaduan_name = $(this).attr('pengaduan-name'),
                    title = pengaduan_name.replace(/\w\S*/g, function(txt) {
                        return txt.charAt(0).toUpperCase() + txt.substr(1).toUpperCase();
                    });
                pengaduan_id = $(this).attr('pengaduan-id');
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
                                url: "/pengaduan/delete/" + pengaduan_id,
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
            @can('pengaduan-create')
                <div class="ms-auto mb-3">
                    <a class="btn btn-primary btn-sm text-right" href="{{ url('pengaduan/' . $jenis . '/create') }}"><i
                            class="fa fa-plus-circle"></i> Tambah
                    </a>
                </div>
            @endcan


            <div class="card">
                <div class="card-body">
                    <h4 class="mb-0">Data Pengaduan {{ ucfirst($jenis) }}</h4>
                    <hr>


                    <table id="datatable" class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Pengaduan</th>
                                <th>Tanggal</th>
                                <th>Topik Masalah</th>
                                @if ($jenis == 'aplikasi')
                                    <th>Nama Aplikasi</th>
                                @endif
                                <th>Isi Pengaduan</th>
                                <th>Status</th>
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
@endsection
