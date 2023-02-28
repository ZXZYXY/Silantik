<div class="row mb-3 {{ $errors->has($name) ? ' has-error' : '' }}">
    <label class="col-sm-4 col-form-label">{{ $label }} @if ($isRequired == 'true')
            <span class="text-danger">*</span>
        @endif
    </label>
    <div class="col-sm-8">
        <input type="{{ $type }}" class="form-control form-control-sm @error($name) is-invalid @enderror"
            name="{{ $name }}" id="{{ $id }}"
            @if ($value != null) value="{{ $value }}" @else value="{{ old($name) }}" @endif
            @if ($isRequired == 'true') required @endif @if ($isReadonly == 'true') readonly @endif
            placeholder="{{ $placeholder }}">
        {{ $slot }}
        @if ($errors->has($name))
            <span class="invalid-feedback">{{ $errors->first($name) }}</span>
        @endif
    </div>
</div>
