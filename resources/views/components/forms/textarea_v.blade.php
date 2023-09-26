<div class="mb-3 {{ $errors->has($name) ? ' has-error' : '' }}">
    <label class="form-label" style="font-weight: bold;">{{ $label }}
        @if ($isRequired == 'true')
            <span class="text-danger">*</span>
        @endif
    </label>
    <textarea class="form-control form-control-sm" id="{{ $id }}" name="{{ $name }}">
    @if ($value != null)
{{ $value }}
@else
{{ old($name) }}
@endif
    </textarea>
    @if ($errors->has($name))
        <span class="text-danger">{{ $errors->first($name) }}</span>
    @endif
</div>
