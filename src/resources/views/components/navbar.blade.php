<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light" aria-label="Main navbar">
    <div class="container-xl">
        <x-nav.brand>My App</x-nav.brand>
        <x-nav.toggler />

        <div class="collapse navbar-collapse" id="navbarMain">
            <ul class="navbar-nav me-5 mb-2 mb-lg-0">
                <x-nav.link to="home" />
                @can('index', \App\Models\User::class)
                    <x-nav.link to="users.index">Users</x-nav.link>
                @endcan
            </ul>
            <div class="d-inline-block me-auto">
{{--                <x-nav.search />--}}
            </div>
            <div class="d-none d-lg-inline btn-group">
                <x-nav.auth />
            </div>

        </div>
    </div>
</nav>
