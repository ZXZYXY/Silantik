{!! Form::model($model, [
    'route' => $model->exists ? ['jenisaplikasi.update', $model->id] : 'jenisaplikasi.store',
    'method' => $model->exists ? 'PUT' : 'POST',
]) !!}

<div class="mb-3">
    <label class="form-label">Nama Jenis <small style="color: red;">*</small></label>
    {!! Form::text('nama_jenis', null, [
        'class' => 'form-control form-control-sm',
        'id' => 'nama_jenis',
        'placeholder' => 'Nama Jenis',
    ]) !!}
</div>

{!! Form::close() !!}
