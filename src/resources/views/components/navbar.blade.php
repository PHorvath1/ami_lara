
<nav class="navbar navbar-light navbar-expand-md navigation-clean-search" id="navclass">
    <div class="container"><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse d-lg-flex align-content-start justify-content-lg-center" id="navcol-1" >
            <ul class="navbar-nav d-lg-flex align-content-start justify-content-lg-center" id="navul">

                <x-nav.link class="notlastlink" to="home"  />

                <x-nav.link class="notlastlink" to="content">Browse</x-nav.link>

                <x-nav.link class="notlastlink"  to="submissions" />

                <x-nav.link class="lastlink"  to="about" />

            </ul>
        </div>
        <div id="divdflexcontainer" class="d-flex">

            <x-nav.search />


            <x-nav.auth />


        </div>
    </div>
</nav>

