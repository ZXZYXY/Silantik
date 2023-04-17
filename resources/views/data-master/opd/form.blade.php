{!! Form::model($model, [
    'route' => $model->exists ? ['opd.update', $model->id] : 'opd.store',
    'method' => $model->exists ? 'PUT' : 'POST',
]) !!}

<div class="mb-3">
    <label class="form-label">Nama OPD <small style="color: red;">*</small></label>
    {!! Form::text('nama_opd', null, [
        'class' => 'form-control form-control-sm',
        'id' => 'nama_opd',
        'placeholder' => 'Nama OPD',
    ]) !!}
</div>

<div class="mb-3">
    <label class="form-label">Singkatan <small style="color: red;">*</small></label>
    {!! Form::text('singkatan', null, [
        'class' => 'form-control form-control-sm',
        'id' => 'singkatan',
        'placeholder' => 'Singkatan',
    ]) !!}
</div>

{!! Form::close() !!}
