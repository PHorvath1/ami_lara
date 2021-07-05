@php
  $method = $method ?? 'get';
@endphp

<form class="d-inline" action="{{ $route }}" method="{{ $method === 'get' ? 'get' : 'post' }}" @isset($confirm) onsubmit="return confirm('{{ $confirm }}')" @endisset>
    @if ($method !== 'get')
        @csrf
        @method($method)
    @endif
    @isset($parameters)
        @foreach($parameters as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endforeach
    @endisset
<input type="submit" class="btn {{ $class ?? '' }}" value="{{ $slot ?? '' }}">
</form>
