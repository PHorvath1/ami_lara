<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>My APP</title>

    <!-- Scripts before page load-->
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="https://kit.fontawesome.com/{{ env('FONTAWESOME_KIT') }}.js" crossorigin="anonymous"></script>
    @stack('pre-js')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @stack('css')
    @if($liveWire ?? false)
        @livewireStyles
    @endif

</head>
<body>
    <div id="app">
        <x-navbar />
        <x-header />

        <main class="py-4">
            @yield('content')
        </main>
        <footer class="footer mt-auto">
            <x-footer />
        </footer>


    </div>

    @stack('js')
    @if($liveWire ?? false)
        @livewireScripts
    @endif
    {!! Brian2694\Toastr\Facades\Toastr::message() !!}
</body>
</html>
