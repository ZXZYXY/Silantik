@extends('layouts.master')
@section('title')
    Permission Management
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
                    <h4 class="mb-0">Tambah Permission</h4>
                    <hr>

                    {!! Form::open(['route' => 'permission.store', 'method' => 'POST']) !!}
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">Group</label>
                                {!! Form::text('group', null, ['placeholder' => 'Group', 'class' => 'form-control']) !!}
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Permission</label>
                                {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Guard Name</label>
                                {!! Form::text('guard_name', 'web', ['placeholder' => 'Guard Name', 'class' => 'form-control']) !!}
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
