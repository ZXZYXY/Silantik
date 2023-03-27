@extends('layouts.master')
@section('title')
    Role Management
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
                    <h4 class="mb-0">Edit Role</h4>
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
                    {!! Form::model($role, ['method' => 'PATCH', 'route' => ['roles.update', $role->id]]) !!}
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">Nama Role</label>
                                {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                            </div>

                            <div class="card mt-3">
                                <div class="card-header">
                                    <strong>Permission</strong>
                                </div>
                                <div class="card-body">
                                    @foreach ($permission as $value)
                                        <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, ['class' => 'name']) }}
                                            {{ $value->name }}</label>
                                        <br />
                                    @endforeach

                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary"><i class="lni lni-save"></i> Submit</button>
                        </div>
                    </div>

                    {!! Form::close() !!}


                </div>
            </div>
        </div>
    </div>



@endsection
