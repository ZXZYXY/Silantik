@extends('layouts.master')
@section('title')
    Tambah User
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
                        <h1 class="m-0">Users Management</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">User</a></li>
                            <li class="breadcrumb-item active">Tambah</li>
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
                                <h3 class="card-title"> Form Tambah</h3>
                                <div class="card-tools">
                                    <a class="btn btn-primary btn-sm text-right" href="{{ route('users.index') }}"> <i
                                            class="fa fa-reply"></i></a>
                                </div>
                            </div>

                            <div class="card-body">
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form action="{{ route('users.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <x-forms.input_h id="name" type="text" name="name" label="Nama"
                                                isRequired="true" value="" isReadonly="" placeholder="Nama" />

                                            <x-forms.input_h id="email" type="email" name="email" label="Email"
                                                isRequired="true" value="" isReadonly="" placeholder="Email" />

                                            <x-forms.input_h id="password" type="password" name="password" label="Password"
                                                isRequired="true" value="" isReadonly="" placeholder="Password" />

                                            <x-forms.input_h id="confirm-password" type="password" name="confirm-password"
                                                label="Confirm Password" isRequired="true" value="" isReadonly=""
                                                placeholder="Confirm Password" />

                                            <x-forms.select_h id="roles" name="roles" label="Role" isRequired="true"
                                                isSelect2="false">
                                                <option value="" selected disabled>[Pilih]</option>
                                                @foreach ($roles as $list)
                                                    <option value="{{ $list->name }}"
                                                        {{ old('roles') == $list->name ? ' selected' : '' }}>
                                                        {{ $list->name }}</option>
                                                @endforeach
                                            </x-forms.select_h>

                                            <x-forms.select_h id="is_active" name="is_active" label="Status"
                                                isRequired="true" isSelect2="false">
                                                <option value="">[Pilih]</option>
                                                <option value="1" {{ old('is_active') == '1' ? ' selected' : '' }}>
                                                    Aktif</option>
                                                <option value="0" {{ old('is_active') == '0' ? ' selected' : '' }}>Non
                                                    Aktif</option>
                                            </x-forms.select_h>

                                            <button type="submit" class="btn btn-primary">Submit</button>

                                        </div>
                                    </div>
                                </form>


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
