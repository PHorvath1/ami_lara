<div class="form-check my-2 border-1">
    <input type="checkbox" value="{{ $value ?? '' }}" class="form-check-input" name="{{ $name ?? $slot }}"
           id="{{ $id ?? ($name ?? $slot) }}" @if ($checked ?? false) checked @endif />
    <label for="{{ $id ?? ($name ?? $slot) }}" class="form-check-label">{!! $slot !!}</label>
</div>
