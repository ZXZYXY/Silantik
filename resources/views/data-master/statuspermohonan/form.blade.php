{!! Form::model($model, [
    'route' => $model->exists ? ['statuspermohonan.update', $model->id] : 'statuspermohonan.store',
    'method' => $model->exists ? 'PUT' : 'POST',
]) !!}

<div class="mb-3">
    <label class="form-label">Nama Status <small style="color: red;">*</small></label>
    {!! Form::text('nama_status', null, [
        'class' => 'form-control form-control-sm',
        'id' => 'nama_status',
        'placeholder' => 'Nama Status',
    ]) !!}
</div>

{!! Form::close() !!}
