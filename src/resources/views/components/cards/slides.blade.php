<div id="cardwrap" class="container">
    <div id="latestCarousel" class="carousel slide" data-bs-ride="carousel">
        <div id="carouselwrap" class="carousel-inner">
            <div class="carousel-item active">
                <div  class="rowcarousel">
                    <x-cards.latest-article class="col mx-2 " id="cc1"  />
                    <x-cards.latest-article class="col mx-2" id="cc2" />
                </div>
            </div>
            <div  class="carousel-item">
                <div  class="rowcarousel">
                    <x-cards.latest-article class="col mx-2 " />
                    <x-cards.latest-article class="col mx-2 "  />
                </div>
            </div>
            <div  class="carousel-item">
                <div  class="rowcarousel">
                    <x-cards.latest-article class="col mx-2 " />
                    <x-cards.latest-article class="col mx-2 " />
                </div>
            </div>
        </div>
        <button id="prevbtn" class="carousel-control-prev p-0 m-0" type="button" data-bs-target="#latestCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button id="nextbtn" class="carousel-control-next" type="button" data-bs-target="#latestCarousel" data-bs-slide="next">
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

