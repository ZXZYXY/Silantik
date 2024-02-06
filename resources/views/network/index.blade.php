@extends('layouts.master')
@section('title')
    Infrastruktur Jaringan
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
                ajax: "{{ route('table.network') }}",
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
                        data: 'link',
                        name: 'link'
                    },
                    {
                        data: 'opd',
                        name: 'opd'
                    },
                    {
                        data: 'jenis_aplikasi',
                        name: 'jenis_aplikasi'
                    },
                    {
                        data: 'status_aktif',
                        name: 'status_aktif'
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
                var network_name = $(this).attr('network-name'),
                    title = network_name.replace(/\w\S*/g, function(txt) {
                        return txt.charAt(0).toUpperCase() + txt.substr(1).toUpperCase();
                    });
                network_id = $(this).attr('network-id');
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
                                url: "/network/" + network_id,
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
            @can('network-create')
                <div class="ms-auto mb-3">
                    <a class="btn btn-primary btn-sm" href="{{ route('network.create') }}"><i class="fa fa-plus-circle"></i>
                        Tambah</a>
                </div>
            @endcan
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-0">Infrastruktur Jaringan</h4>
                    <div style="align-content: right">
                        <p align="right">
                            <button type="button" class="btn btn-secondary btn-sm mt-2 mb-2" data-bs-toggle="modal"
                                data-bs-target="#laporan"><i
                                    class="fa fa-print                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  "></i>
                                Laporan</button>
                        </p>
                    </div>
                    <hr>
                    <table id="datatable" class="table table-hover table-bordered table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Unit Kerja/Perangkat Daerah</th>
                                <th>Titik Koordinat (long,lat)</th>
                                <th>Jarak KAbel</th>
                                <th>Jumlah Accespoint</th>
                                <th>Jenis Koneksi</th>
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
    <!-- Modal -->
    <div class="modal fade" id="laporan" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Laporan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Cooming Soon

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection