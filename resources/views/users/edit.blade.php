@extends('layouts.master')
@section('title')
    Edit User
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
                    <h4 class="mb-0">Edit User</h4>
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
                    {!! Form::model($user, ['method' => 'PATCH', 'route' => ['users.update', $user->id]]) !!}
                    <div class="row">
                        <div class="col-md-6">
                            <x-forms.input_v id="name" type="text" name="name" label="Nama" isRequired="true"
                                value="{{ $user->name }}" isReadonly="" placeholder="Nama" />

                            <x-forms.input_v id="email" type="email" name="email" label="Email" isRequired="true"
                                value="{{ $user->email }}" isReadonly="" placeholder="Email" />

                            <x-forms.input_v id="password" type="password" name="password" label="Password"
                                isRequired="false" value="" isReadonly="" placeholder="Password" />

                            <x-forms.input_v id="confirm-password" type="password" name="confirm-password"
                                label="Confirm Password" isRequired="false" value="" isReadonly=""
                                placeholder="Confirm Password" />

                            <x-forms.select_v id="roles" name="roles" label="Role" isRequired="true"
                                isSelect2="false">
                                <option value="" selected disabled>[Pilih]</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}"
                                        {{ in_array($role->name, $userRole) ? 'selected' : '' }}
                                        {{ collect(old('role'))->contains($role->name) ? 'selected' : '' }}>
                                        {{ $role->name }}</option>
                                @endforeach
                            </x-forms.select_v>

                            <x-forms.select_v id="is_active" name="is_active" label="Status" isRequired="true"
                                isSelect2="false">
                                <option value="">[Pilih]</option>
                                <option value="1" {{ $user->is_active == '1' ? ' selected' : '' }}>
                                    Aktif</option>
                                <option value="0" {{ $user->is_active == '0' ? ' selected' : '' }}>Non
                                    Aktif</option>
                            </x-forms.select_v>

                            <button type="submit" class="btn btn-primary"><i class="lni lni-save"></i> Submit</button>

                        </div>
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>




@endsection
