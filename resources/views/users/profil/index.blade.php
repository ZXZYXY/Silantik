@extends('layouts.master')
@section('title')
    Profil
@endsection
@push('style')
@endpush

@push('script')
@endpush

@section('content')
    <!--page-content-wrapper-->
    <div class="page-content-wrapper">
        <div class="page-content">
            <h4 class="mb-3">Profil</h4>
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card">
                        <div class="card-body box-profile">
                            <div class="text-center mb-3">
                                <img src="{{ auth()->user()->getAvatarProfil() }}" class="rounded-circle shadow"
                                    width="130" height="130" alt="User profile picture" />

                            </div>

                            <h4 class="profile-username text-center">{{ $data->name }}</h4>

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
                        <div class="card-header">
                            <h4>Edit</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('profil/' . $data->uuid . '/update') }}" class="form-horizontal"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                <x-forms.input_h id="name" type="text" name="name" label="Nama Lengkap"
                                    isRequired="true" value="{{ $data->name }}" isReadonly="" placeholder="" />
                                {{-- <x-forms.input_h id="username" type="text" name="username" label="Username"
                                                isRequired="true" value="{{ $data->username }}" isReadonly=""
                                                placeholder="" /> --}}
                                <x-forms.input_h id="email" type="email" name="email" label="E-mail"
                                    isRequired="true" value="{{ $data->email }}" isReadonly="" placeholder="" />
                                {{-- <x-forms.input_h id="no_hp" type="text" name="no_hp" label="No. Hp"
                                                isRequired="false" value="{{ $data->no_hp }}" isReadonly=""
                                                placeholder="" /> --}}
                                <x-forms.input_h id="photo" type="file" name="photo" label="Foto Profil"
                                    isRequired="false" value="" isReadonly="" placeholder="">
                                    <span class="text-info"><i>Tipe File : jpeg, jpg, png <br> Ukuran
                                            Maksimal :
                                            5mb</i></span>
                                </x-forms.input_h>


                                <div class="form-group row">
                                    <label class="label-text col-lg-4 col-form-label text-md-right"></label>
                                    <div class="col-lg-6">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>
                                            Simpan</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4>Ganti Password</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('profil/ganti_password') }}" method="post">
                                @csrf
                                <x-forms.input_h id="" type="password" name="password_lama" label="Password Lama"
                                    isRequired="false" value="" isReadonly="" placeholder="" />
                                <x-forms.input_h id="" type="password" name="password" label="Password Baru"
                                    isRequired="false" value="" isReadonly="" placeholder="" />
                                <x-forms.input_h id="" type="password" name="password_baru"
                                    label="Konfirmasi Password Baru" isRequired="false" value="" isReadonly=""
                                    placeholder="" />

                                <div class="form-group row">
                                    <label class="label-text col-lg-4 col-form-label text-md-right"></label>
                                    <div class="col-lg-6">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>
                                            Ubah</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>






                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
    </div>
    <!--end page-content-wrapper-->
@endsection
