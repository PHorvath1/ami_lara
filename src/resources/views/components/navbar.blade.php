
{{--<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light" aria-label="Main navbar">--}}
{{--    <div class="container-xl">--}}
{{--        <x-nav.brand>My App</x-nav.brand>--}}
{{--        <x-nav.toggler />--}}

{{--        <div class="collapse navbar-collapse" id="navbarMain">--}}
{{--            <ul class="navbar-nav me-5 mb-2 mb-lg-0">--}}
{{--                <x-nav.link to="home" />--}}
{{--                <x-nav.link to="content" />--}}
{{--                <x-nav.link to="submissions" />--}}
{{--                <x-nav.link to="about" />--}}
{{--                @can('index', \App\Models\User::class)--}}
{{--                    <x-nav.link to="users.index">Users</x-nav.link>--}}
{{--                @endcan--}}
{{--            </ul>--}}
{{--            <div class="d-inline-block me-auto">--}}

{{--                <x-nav.search />--}}

{{--            </div>--}}
{{--            <div class="d-none d-lg-inline btn-group">--}}
{{--                <x-nav.auth />--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}
{{--</nav>--}}


<nav class="navbar navbar-light navbar-expand-md navigation-clean-search" style="background: rgb(249, 250, 177);width: auto;">
    <div class="container"><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse d-lg-flex align-content-start justify-content-lg-center" id="navcol-1" style="margin-left: 0px;">
            <ul class="navbar-nav d-lg-flex" style="margin: 5px;padding-right: 30px;">



   {{--             <li class="nav-item" style="margin: 0px;margin-right: 0px;"><a class="nav-link active" href="#" style="border-color: var(--bs-dark);border-right-width: 1px;border-right-style: solid;font-weight: bold;font-size: 20px;">Home</a></li>
                <li class="nav-item" style="margin: 0px;margin-right: 0px;"><a class="nav-link" href="#" style="font-size: 20px;font-weight: bold;border-right: 1px solid black ;">Contents</a></li>
                <li class="nav-item" style="margin: 0px;margin-right: 0px;"><a class="nav-link" href="#" style="font-size: 20px;font-weight: bold;border-right: 1px solid black ;">Submissions</a></li>
                <li class="nav-item" style="width: 102.4062px;margin: 0px;margin-right: 0px;"><a class="nav-link" href="About_us.html" style="font-size: 20px;width: 125px;font-weight: bold;">About us</a></li>
--}}

                <x-nav.link class="notlastlink" to="home"  />

                <x-nav.link class="notlastlink" to="content" />

                <x-nav.link class="notlastlink"  to="submissions" />

                <x-nav.link class="lastlink"  to="about" />

            </ul>
        </div>
             <div class="d-flex">
                 <x-nav.search />


                 <div class="d-none d-lg-inline btn-group">
                                     <x-nav.auth />
                                 </div>
{{--            <form class="d-lg-flex me-auto justify-content-lg-end search-form" target="_self">--}}
{{--                <div class="d-flex justify-content-lg-end"><input class="border rounded form-control search-field" type="search" id="search-field" name="search" style="background: white;width: 230px;"><button class="btn btn-primary d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center" type="button" style="background: rgba(13,110,253,0);border-color: rgba(255,255,255,0);border-right-color: rgba(13,110,253,0);;width: 40px;height: 40px;margin-right: 20px;margin-left: 5px;"><i class="fas fa-search" style="margin: 10px;color: black;"></i></button></div>--}}
{{--            </form><button class="btn btn-primary d-flex d-sm-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-xl-center align-items-xl-center" type="button" style="background: rgba(13,110,253,0);border-color: rgba(255,255,255,0);border-right-color: rgba(13,110,253,0);width: 40px;height: 40px;margin-right: 2.5px;"><i class="fas fa-bell" style="margin: 5px;margin-left: 10px;margin-right: 10px;color: var(--bs-dark);"></i></button><button class="btn btn-primary d-flex d-sm-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-xl-center align-items-xl-center" type="button" style="background: rgba(13,110,253,0);border-color: rgba(255,255,255,0);border-right-color: rgba(13,110,253,0);width: 40px;height: 40px;margin-left: 2.5px;"><i class="fas fa-user" style="margin: 5px;margin-left: 10px;margin-right: 10px;color: var(--bs-dark);"></i></button>--}}

         </div>
    </div>
</nav>

