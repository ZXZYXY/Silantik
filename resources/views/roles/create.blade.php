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
            <button class="btn btn-primary mb-3">Kembali</button>
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-0">Tambah Role</h4>
                    <hr>

                    {!! Form::open(['route' => 'roles.store', 'method' => 'POST']) !!}
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nama Role</label>
                                {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                            </div>

                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <strong>Permission</strong>
                                </div>
                                <div class="card-body">
                                    @foreach ($permission as $value)
                                        <label>{{ Form::checkbox('permission[]', $value->id, false, ['class' => 'name']) }}
                                            {{ $value->name }}</label>&nbsp; &nbsp; &nbsp; &nbsp;
                                    @endforeach
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>

                    {!! Form::close() !!}


                </div>
            </div>
        </div>
    </div>
@endsection
