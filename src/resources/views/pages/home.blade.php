@extends('layouts.app')

@section('content')
    <main style="padding-top: 0px;margin-top: -34px;">
        <div id="containerhome" class="container-fluid" >
            <div class="col" id="colwrap" >
                <div class="row">
                    <div class="col" id="coltitel" >
                        <p class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center" id="ptitel"><strong>Annales Mathematicae et Informaticae&nbsp;53&nbsp;(2021)</strong><br><br></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col" id="colp1">
                        <p id="pdesc1"><br>Selected papers of the 1st Conference on Information Technology and Data Science<br><br>The conference was organized by Faculty of Informatics, University of Debrecen, Hungary, November 6–8, 2020<br><br>Conference Chairmen: István Fazekas and András Hajdu<br><br>The conference was supported by the construction EFOP-3.6.3-VEKOP-16-2017-00002. The project was supported by the European Union, co-financed by the European Social Fund.<em>ISSN 1787-6117 (Online)</em><br><br></p>
                    </div>
                </div>
                <div class="row">
                    <div id="colp2" class="col d-xl-flex justify-content-xl-center align-items-xl-center" >
                        <picture><img class="border rounded" src="img/main/small_53cover.png"></picture>
                    </div>
                    <div class="col" >
                        <p id="pbord1" >Editorial Board<br></p>
                        <p id="pbord2" >Sándor Bácsó, Sonja Gorjanc, Tibor Gyimóthy, Miklós Hoffmann, József Holovács, Tibor Juhász, László Kovács, Gergely Kovásznai, László Kozma, Kálmán Liptai, Florian Luca, Giuseppe Mastroianni, Ferenc Mátyás, Ákos Pintér, Miklós Rontó, László Szalay, János Sztrik, Gary Walsh<br></p>
                        <p id="ptech"  >Technical&nbsp;Editor<br></p>
                        <p>Tibor Tómács<br></p>
                    </div>
                </div>
                <div id="cardwrap" class="container">
                    <div id="latestCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div id="carouselwrap" class="carousel-inner">
                            <div class="carousel-item active">
                                <div id="card1" class="row">
                                    <x-cards.latest-article class="col mx-2 " id="cc1"  />
                                    <x-cards.latest-article class="col mx-2" id="cc2" />
                                </div>
                            </div>
                            <div  class="carousel-item">
                                <div id="card2" class="row">
                                    <x-cards.latest-article class="col mx-2 " />
                                    <x-cards.latest-article class="col mx-2 "  />
                                </div>
                            </div>
                            <div  class="carousel-item">
                                <div id="card3" class="row ">
                                    <x-cards.latest-article class="col mx-2 " />
                                    <x-cards.latest-article class="col mx-2 " />
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev p-0 m-0" type="button" data-bs-target="#latestCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#latestCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <div class="">
                        <div id="spacer" class="mb-2"></div>
                        <button class="btn ami-yellow mx-2" onclick="prevContent()">&lt;</button>
                        <button class="btn ami-yellow mx-2 float-end" onclick="nextContent()">&gt;</button>
                    </div>
                </div>
            </div>
        </div>
    </main>


@endsection

@push('js')
    <script>
        let carousel

        document.addEventListener("DOMContentLoaded", function(){
            const myCarousel = document.querySelector('#latestCarousel')
            carousel = new bootstrap.Carousel(myCarousel, {interval: 99999})
        });

        function nextContent() {
            carousel.next()
        }

        function prevContent() {
            carousel.prev()
        }

    </script>
@endpush
