<div class="mb-3 {{ $errors->has($name) ? ' has-error' : '' }}">
    <label class="form-label" style="font-weight: bold;">{{ $label }} @if ($isRequired == 'true')
            <span class="text-danger">*</span>
        @endif
    </label>
    <input type="{{ $type }}" placeholder="{{ $placeholder }}"
        class="form-control form-control-sm @error($name) is-invalid @enderror" name="{{ $name }}"
        id="{{ $id }}"
        @if ($value != null) value="{{ $value }}"
    @else
        value="{{ old($name) }}" @endif
        @if ($isRequired == 'true') required @endif @if ($isReadonly == 'true') readonly @endif />
    {{ $slot }}
    @if ($errors->has($name))
        <span class="text-danger">{{ $errors->first($name) }}</span>
    @endif
</div>
