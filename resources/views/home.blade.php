@extends('layouts.master')
@section('title')
    Dashboard
@endsection
@section('content')
    <!--page-content-wrapper-->
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-12 col-lg-3">
                    <div class="card radius-15 bg-voilet">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h2 class="mb-0 text-white">{{ $data['jml_permohonan'] }}
                                    </h2>
                                </div>
                                <div class="ms-auto font-35 text-white"><i class="bx bx-comment-edit"></i>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-white">Permohonan</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="card radius-15 bg-primary-blue">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h2 class="mb-0 text-white">{{ $data['jml_pengaduan'] }}
                                    </h2>
                                </div>
                                <div class="ms-auto font-35 text-white"><i class="bx bx-help-circle"></i>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-white">Pengaduan</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="card radius-15 bg-rose">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h2 class="mb-0 text-white">{{ $data['jml_aplikasi'] }}
                                    </h2>
                                </div>
                                <div class="ms-auto font-35 text-white"><i class="bx bx-archive"></i>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-white">Jumlah Aplikasi</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="card radius-15 bg-sunset">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h2 class="mb-0 text-white">{{ $data['jml_user'] }}
                                    </h2>
                                </div>
                                <div class="ms-auto font-35 text-white"><i class="bx bx-user"></i>
                                </div>
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

            <div class="row">
                <div class="col-md-6">
                    <div class="card radius-15">
                        <div class="card-header border-bottom-0">
                            <div class="d-lg-flex align-items-center">
                                <div>
                                    <h5 class="mb-2 mb-lg-0">Permohonan/Pengaduan Terbaru</h5>
                                </div>

                            </div>
                        </div>
                        <div class="card-body">
                            <table></table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
