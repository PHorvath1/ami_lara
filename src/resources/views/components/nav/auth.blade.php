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

{{--<button class="btn btn-primary d-flex d-sm-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-xl-center align-items-xl-center" type="button" style="background: rgba(13,110,253,0);border-color: rgba(255,255,255,0);border-right-color: rgba(13,110,253,0);width: 40px;height: 40px;margin-left: 2.5px;"><i class="fas fa-user" style="margin: 5px;margin-left: 10px;margin-right: 10px;color: var(--bs-dark);"></i></button>--}}
