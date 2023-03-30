@extends('layouts.master')
@section('title')
    Tambah User
@endsection
@push('style')
@endpush

@push('script')
@endpush

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <button class="btn btn-primary btn-sm mb-3" onclick="window.history.back();"><i class="fa fa-reply"></i>
                Kembali</button>
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-0">Tambah User</h4>
                    <hr>
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
                                <x-forms.input_v id="name" type="text" name="name" label="Nama"
                                    isRequired="true" value="" isReadonly="" placeholder="Nama" />

                                <x-forms.input_v id="username" type="text" name="username" label="Username"
                                    isRequired="true" value="" isReadonly="" placeholder="Username" />

                                <x-forms.input_v id="email" type="email" name="email" label="Email"
                                    isRequired="true" value="" isReadonly="" placeholder="Email" />

                                <x-forms.input_v id="password" type="password" name="password" label="Password"
                                    isRequired="true" value="" isReadonly="" placeholder="Password" />

                                <x-forms.input_v id="confirm-password" type="password" name="confirm-password"
                                    label="Confirm Password" isRequired="true" value="" isReadonly=""
                                    placeholder="Confirm Password" />

                                <x-forms.select_v id="roles" name="roles" label="Role" isRequired="true"
                                    isSelect2="false">
                                    <option value="" selected disabled>[Pilih]</option>
                                    @foreach ($roles as $list)
                                        <option value="{{ $list->name }}"
                                            {{ old('roles') == $list->name ? ' selected' : '' }}>
                                            {{ $list->name }}</option>
                                    @endforeach
                                </x-forms.select_v>

                                <x-forms.select_v id="is_active" name="is_active" label="Status" isRequired="true"
                                    isSelect2="false">
                                    <option value="">[Pilih]</option>
                                    <option value="1" {{ old('is_active') == '1' ? ' selected' : '' }}>
                                        Aktif</option>
                                    <option value="0" {{ old('is_active') == '0' ? ' selected' : '' }}>Non
                                        Aktif</option>
                                </x-forms.select_v>

                                <button type="submit" class="btn btn-primary"><i class="lni lni-save"></i> Submit</button>

                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>

@endsection
