{!! Form::model($model, [
    'route' => $model->exists ? ['sektor.update', $model->id] : 'sektor.store',
    'method' => $model->exists ? 'PUT' : 'POST',
]) !!}

<div class="mb-3">
    <label class="form-label">Nama Sektor <small style="color: red;">*</small></label>
    {!! Form::text('nama_sektor', null, [
        'class' => 'form-control form-control-sm',
        'id' => 'nama_sektor',
        'placeholder' => 'Nama Sektor',
    ]) !!}
</div>

{!! Form::close() !!}
