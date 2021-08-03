@php
    $method = $method ?? 'get';
@endphp

<form
    class="{{ $class ?? ''}}"
    action="{{ $to }}"
    method="{{ $method === 'get' ? 'get' : 'post' }}"
    @if($allowFile ?? false) enctype="multipart/form-data" @endif
>
    @if( $method !== 'get' )
        @csrf
        @method($method)
    @endif
    @foreach(($parameters ?? []) as $key => $value)
        <input type="hidden" name="{{ $key }}" value="{{ $value }}" />
    @endforeach
    {!! $slot ?? '' !!}
</form>
