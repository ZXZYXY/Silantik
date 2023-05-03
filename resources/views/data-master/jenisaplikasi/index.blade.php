@extends('layouts.master')
@section('title')
    Data Jenis Aplikasi
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
    <script src="{{ asset('crud/app.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: "{{ route('table.jenisaplikasi') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'id'
                    },
                    {
                        data: 'nama_jenis'
                    },

                    {
                        data: 'action',
                        name: 'action'
                    }
                ]
            });
        });
    </script>
@endpush

@section('content')
    <!--page-content-wrapper-->
    <div class="page-content-wrapper">
        <div class="page-content">

            @can('jenisaplikasi-create')
                <p>
                    <a href="{{ route('jenisaplikasi.create') }}" class="btn btn-primary btn-sm modal-show"
                        title="Tambah Jenis Aplikasi"><i class="fa fa-plus-circle"></i> Tambah</a>
                </p>
            @endcan
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-0">Data Jenis Aplikasi</h4>
                    <hr>

                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Jenis</th>
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
    @include('layouts._modal')
@endsection
