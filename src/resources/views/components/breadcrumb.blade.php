<div class="float-end" aria-label="breadcrumb">
    <ol class="breadcrumb">
        @foreach($path as $route => $label)
            <li class="breadcrumb-item"><a href="{{ route($route) }}">{{ $label }}</a></li>
        @endforeach
        <li class="breadcrumb-item active" aria-current="page">{{ $slot }}</li>
    </ol>
</div>
