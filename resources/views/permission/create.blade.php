@extends('layouts.master')
@section('title')
    Permission Management
@endsection
@push('style')
@endpush

@push('script')
@endpush

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Permission Management</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Permission Management</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-tools">
                                    <a class="btn btn-primary btn-sm text-right" href="{{ route('permission.index') }}"> <i
                                            class="fa fa-reply"></i></a>
                                </div>
                            </div>

                            <div class="card-body">
                                {!! Form::open(['route' => 'permission.store', 'method' => 'POST']) !!}
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Group</label>
                                            {!! Form::text('group', null, ['placeholder' => 'Group', 'class' => 'form-control']) !!}
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Permission</label>
                                            {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                                        </div>

                                        <div class="form-group">
                                            <label>Guard Name</label>
                                            {!! Form::text('guard_name', 'web', ['placeholder' => 'Guard Name', 'class' => 'form-control']) !!}
                                        </div>

                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>

                                {!! Form::close() !!}
                            </div>
                        </div><!-- /.card -->
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
