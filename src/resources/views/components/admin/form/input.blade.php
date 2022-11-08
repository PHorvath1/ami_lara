@php
    $type = $type ?? 'text';
@endphp

<div class="@if($type !== 'file') form-floating @endif {{ $class ?? '' }}">
    <label class="mt-2 mb-0" for="{{ $id ?? $name }}">{{ $slot ?? '' }}</label>
    @switch($type)
        @case('select')
        <input list="{{ \Illuminate\Support\Str::plural($name) }}"
               class="form-control {{ $inputClass ?? '' }} @error($name) is-invalid @enderror"
               name="{{ $name }}" id="{{ $id ?? $name }}"
               value="{{ $value ?? '' }}"
               @if($required ?? false) required @endif()
               @if($disabled ?? false) disabled @endif()/>

        <datalist id="{{ \Illuminate\Support\Str::plural($name) }}">
            @foreach($options as $value)
                <option value="{{ $value }}"></option>
            @endforeach
        </datalist>
        @break
        @case('textarea')
        <textarea class="form-control {{ $inputClass ?? '' }} @error($name) is-invalid @enderror"
                  name="{{ $name }}" id="{{ $id ?? $name }}"
                  placeholder="{{ $placeholder ?? '' }}"
                  @if($required ?? false) required @endif()
                  @if($disabled ?? false) disabled @endif()>{{ $value ?? '' }}</textarea>
        {{--  Text area does includes any spaces or tabs between tags, so watch out  --}}
        @break
        @default
        <input type="{{ $type }}"
               class="form-control {{ $inputClass ?? '' }} @error($name) is-invalid @enderror"
               name="{{ $name }}" id="{{ $id ?? $name }}"
               placeholder="{{ $placeholder ?? '' }}"
               value="{{ $value ?? '' }}"
               @if($required ?? false) required @endif()
               @if($disabled ?? false) disabled @endif()/>
    @endswitch

    @error($name)
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
