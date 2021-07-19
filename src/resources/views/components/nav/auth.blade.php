<div class="btn-group ms-3 dropdown" id="Profilbtn">
    <a class="dropdown-toggle btn btn-outline-primary" href="#" id="profileDropdown" data-bs-toggle="dropdown"
       aria-expanded="false">{{ Auth::user()->name ?? 'Guest' }} <i class="fas fa-user"></i></a>
    <ul class="dropdown-menu" aria-labelledby="profileDropdown">
        @auth
            <li><a class="dropdown-item" href="{{ route('user.profile') }}">Profile</a></li>
            <li><a class="dropdown-item" href="{{ route('signout') }}">Logout</a></li>
        @else
            <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
            <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
        @endauth
    </ul>
</div>
