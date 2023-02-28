@extends('layouts.master')
@section('title')
    Profil
@endsection
@push('style')
@endpush

@push('script')
@endpush

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profile</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">User Profile</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                        src="{{ auth()->user()->getAvatarProfil() }}" alt="User profile picture"
                                        style="object-fit: cover; position: relative; width:150px !important;height:150px !important;">
                                </div>

                                <h3 class="profile-username text-center">{{ $data->name }}</h3>

                                <p class="text-muted text-center">
                                    @if (!empty($data->getRoleNames()))
                                        @foreach ($data->getRoleNames() as $v)
                                            <span class="badge rounded-pill bg-primary">{{ strtoupper($v) }} </span>
                                        @endforeach
                                    @endif
                                </p>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#profil" data-toggle="tab">Edit
                                            Profil</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#ganti_password" data-toggle="tab">Ganti
                                            Password</a>
                                    </li>

                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="profil">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <form action="{{ url('profil/' . $data->uuid . '/update') }}"
                                                    class="form-horizontal" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <x-forms.input_h id="name" type="text" name="name"
                                                        label="Nama Lengkap" isRequired="true" value="{{ $data->name }}"
                                                        isReadonly="" placeholder="" />
                                                    {{-- <x-forms.input_h id="username" type="text" name="username" label="Username"
                                                isRequired="true" value="{{ $data->username }}" isReadonly=""
                                                placeholder="" /> --}}
                                                    <x-forms.input_h id="email" type="email" name="email"
                                                        label="E-mail" isRequired="true" value="{{ $data->email }}"
                                                        isReadonly="" placeholder="" />
                                                    {{-- <x-forms.input_h id="no_hp" type="text" name="no_hp" label="No. Hp"
                                                isRequired="false" value="{{ $data->no_hp }}" isReadonly=""
                                                placeholder="" /> --}}
                                                    <x-forms.input_h id="photo" type="file" name="photo"
                                                        label="Foto Profil" isRequired="false" value="" isReadonly=""
                                                        placeholder="">
                                                        <span class="text-info"><i>Tipe File : jpeg, jpg, png <br> Ukuran
                                                                Maksimal :
                                                                5mb</i></span>
                                                    </x-forms.input_h>


                                                    <div class="form-group row">
                                                        <label
                                                            class="label-text col-lg-4 col-form-label text-md-right"></label>
                                                        <div class="col-lg-6">
                                                            <button type="submit" class="btn btn-primary"><i
                                                                    class="fa fa-save"></i>
                                                                Simpan</button>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="ganti_password">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <form action="{{ url('profil/ganti_password') }}" method="post">
                                                    @csrf
                                                    <x-forms.input_h id="" type="password" name="password_lama"
                                                        label="Password Lama" isRequired="false" value=""
                                                        isReadonly="" placeholder="" />
                                                    <x-forms.input_h id="" type="password" name="password"
                                                        label="Password Baru" isRequired="false" value=""
                                                        isReadonly="" placeholder="" />
                                                    <x-forms.input_h id="" type="password" name="password_baru"
                                                        label="Konfirmasi Password Baru" isRequired="false"
                                                        value="" isReadonly="" placeholder="" />

                                                    <div class="form-group row">
                                                        <label
                                                            class="label-text col-lg-4 col-form-label text-md-right"></label>
                                                        <div class="col-lg-6">
                                                            <button type="submit" class="btn btn-primary"><i
                                                                    class="fa fa-save"></i>
                                                                Ubah</button>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
