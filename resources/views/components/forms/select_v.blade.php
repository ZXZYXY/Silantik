<div class="mb-3 {{ $errors->has($name) ? ' has-error' : '' }}">
    <label class="form-label" style="font-weight: bold;">{{ $label }}@if ($isRequired == 'true')
            <span class="text-danger">*</span>
        @endif
    </label>
    <select name="{{ $name }}" id="{{ $id }}" width="100%"
        class="form-select form-select-sm @if ($isSelect2 == 'true') select2 @endif">
        {{ $slot }}
    </select>
    @if ($errors->has($name))
        <span class="text-danger">{{ $errors->first($name) }}</span>
    @endif
</div>
