
<nav class="navbar navbar-light navbar-expand-md navigation-clean-search" style="background: rgb(249, 250, 177);width: auto;">
    <div class="container"><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse d-lg-flex align-content-start justify-content-lg-center" id="navcol-1" style="margin-left: 0px;">
            <ul class="navbar-nav d-lg-flex" style="margin: 5px;padding-right: 30px;">

                <x-nav.link class="notlastlink" to="home"  />

                <x-nav.link class="notlastlink" to="content" />

                <x-nav.link class="notlastlink"  to="submissions" />

                <x-nav.link class="lastlink"  to="about" />

            </ul>
        </div>
             <div class="d-flex">
                 <x-nav.search />


                 <div class="btn btn-primary d-flex d-sm-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-xl-center align-items-xl-center">
                                     <x-nav.auth />
                                 </div>

         </div>
    </div>
</nav>

