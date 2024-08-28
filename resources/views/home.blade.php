@extends('layouts.master')
@section('title')
    Dashboard
@endsection
@push('style')
    <style>
        .card-body {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .table-responsive {
            overflow-y: auto; /* Ensure vertical scroll */
        }

        .dataTables_wrapper {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .dataTables_wrapper .dataTables_paginate {
            margin-top: 1rem; /* Space between table and pagination */
        }
    </style>
@endpush


@section('content')
    <!--page-content-wrapper-->
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row">
                <!-- Card Permohonan -->
                <div class="col-12 col-lg-3">
                    <div class="card radius-15 bg-voilet">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h2 class="mb-0 text-white">{{ $data['jml_permohonan'] }}</h2>
                                </div>
                                <div class="ms-auto font-35 text-white"><i class="bx bx-comment-edit"></i></div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-white">Permohonan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card Pengaduan -->
                <div class="col-12 col-lg-3">
                    <div class="card radius-15 bg-primary-blue">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h2 class="mb-0 text-white">{{ $data['jml_pengaduan'] }}</h2>
                                </div>
                                <div class="ms-auto font-35 text-white"><i class="bx bx-help-circle"></i></div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-white">Pengaduan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card Jumlah Aplikasi -->
                <div class="col-12 col-lg-3">
                    <div class="card radius-15 bg-rose">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h2 class="mb-0 text-white">{{ $data['jml_aplikasi'] }}</h2>
                                </div>
                                <div class="ms-auto font-35 text-white"><i class="bx bx-archive"></i></div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-white">Jumlah Aplikasi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card Users -->
                <div class="col-12 col-lg-3">
                    <div class="card radius-15 bg-sunset">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h2 class="mb-0 text-white">{{ $data['jml_user'] }}</h2>
                                </div>
                                <div class="ms-auto font-35 text-white"><i class="bx bx-user"></i></div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-white">Users</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->

            <!-- Tabel Permohonan dan Logo -->
                <div class="row">
                    <!-- Tabel Permohonan -->
                    <div class="col-md-8">
                        <div class="card radius-15 h-100">
                            <div class="card-header border-bottom-0">
                                <div class="d-lg-flex align-items-center">
                                    <div>
                                        <h5 class="mb-6 mb-lg-0">Permohonan Terbaru</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="recentRequestsTable" class="table table-hover table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Permohonan</th>
                                                <th>Jenis Permohonan</th>
                                                <th>Tanggal</th>
                                                <th>Nama Aplikasi</th>
                                                <th>Jenis Aplikasi</th>
                                                
                                                <th>Unit Kerja</th>
                                                <th>Status</th>
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

                    <!-- Logo dan Deskripsi -->
                    <div class="col-md-4">
                        <div class="card radius-15 h-100">
                            <div class="card-body text-center">
                                <img src="{{ asset('frontend') }}/img/illustrations/logo3.png" alt="Logo" style="height: auto; padding-top: 20px;">
                                <h5></h5>
                                <div class="text-justify">
                                    <h3 style="font-weight: bold; text-align: left; color: #0b32ff; padding-bottom: 20px;">Information</h3>
                                    <p style="text-align: justify; font-size: 18px;">
                                        Untuk panduan lebih detailnya bisa akses melalui <a href="#" target="_blank">Buku Panduan</a>.
                                    </p>
                                    <hr style="border: 1px solid #ccc;">
                                    
                                    <p style="text-align: justify; font-size: 18px;">
                                        Browser: <span id="user-browser"></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection

@push('script')
    <!-- Chart.js Script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- DataTables Script -->
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#recentRequestsTable').DataTable();
        }); 
    </script>
    <script>
        // Script to fetch user's IP address and browser information
        async function fetchIpAndBrowser() {
            
            
    
            // Getting Browser Information
            let browserInfo = navigator.userAgent;
            document.getElementById('user-browser').textContent = browserInfo;
        }
    
        // Call the function to fetch IP and browser info
        fetchIpAndBrowser();
    </script>

<script>
    $(document).ready(function() {
        // Hancurkan DataTables jika sudah ada sebelum inisialisasi ulang
        if ($.fn.DataTable.isDataTable('#recentRequestsTable')) {
            $('#recentRequestsTable').DataTable().destroy();
        }
        
        $('#recentRequestsTable').DataTable({
            responsive: true,
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: {
                    url: "{{ url('table/recent') }}",
                    dataSrc: function (json) {
                        console.log("Data received:", json); // Debugging data received
                        return json.data;
                    },
                    error: function (xhr, error, thrown) {
                        console.error("AJAX Error:", xhr.responseText); // Debugging AJAX error
                    }
                },
                columns: [
                { data: 'DT_RowIndex', name: 'id' },
                { data: 'kd_permohonan', name: 'kd_permohonan' },
                { data: 'jenis_permohonan', name: 'jenis_permohonan' },
                { data: 'tanggal', name: 'tanggal' },
                { data: 'nama_aplikasi', name: 'nama_aplikasi' },
                { data: 'jenis_aplikasi', name: 'jenis_aplikasi' },
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
                                return data ? data : '<span class="status-pending">Belum dikonfirmasi</span>';
                        }
                    }
                },
            ]
        });
    });
</script>

@endpush
