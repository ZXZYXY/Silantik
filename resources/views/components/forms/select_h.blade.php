<div class="row mb-3 {{ $errors->has($name) ? ' has-error' : '' }}">
    <label class="col-sm-4 col-form-label" style="font-weight: bold;">{{ $label }} @if ($isRequired == 'true')
            <span class="text-danger">*</span>
        @endif
    </label>
    <div class="col-sm-8">
        <select name="{{ $name }}" id="{{ $id }}" width="100%"
            class="form-control form-control-sm @if ($isSelect2 == 'true') select2 @endif">
            {{ $slot }}
        </select>

        @if ($errors->has($name))
            <span class="text-danger">{{ $errors->first($name) }}</span>
        @endif
    </div>
</div>
