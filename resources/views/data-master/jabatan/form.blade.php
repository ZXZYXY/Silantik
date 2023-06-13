{!! Form::model($model, [
    'route' => $model->exists ? ['jabatan.update', $model->id] : 'jabatan.store',
    'method' => $model->exists ? 'PUT' : 'POST',
]) !!}

<div class="mb-3">
    <label class="form-label">Nama Jabatan <small style="color: red;">*</small></label>
    {!! Form::text('nama_jabatan', null, [
        'class' => 'form-control form-control-sm',
        'id' => 'nama_jabatan',
        'placeholder' => 'Nama Jabatan',
    ]) !!}
</div>

{!! Form::close() !!}
