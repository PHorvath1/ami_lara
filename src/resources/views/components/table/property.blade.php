@php
    /** @var \Illuminate\Database\Eloquent\Model $item */
    $prop = $prop === 'ID' ? 'id' : $prop = \Illuminate\Support\Str::snake($prop);
@endphp
<td class="{{ $class ?? '' }}">{{ $item->$prop }}</td>
