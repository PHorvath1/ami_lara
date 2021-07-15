@extends('layouts.app')

@section('content')
    @php
    /**
    * @var \App\Models\Volume $volume
    * @var \Illuminate\Pagination\LengthAwarePaginator $articles
    * @var \App\Models\Article $article
    */
    @endphp
   <div class="container-fluid p-4" style="background: #FBFAFA">
       <div class="card text-center">
           <div class="card-header">
               <h3>Name: {{ $volume->name }}</h3>
           </div>
           <div class="card-body">
               <h4>Description: {{ $volume->description }}</h4>
               <h6 class="card-text">Release year<{{ $volume->release_year }}></h6>
           </div>
           <div class="card-footer text-muted">
               2 days ago
           </div>
       </div>
       <hr>
       <div class="row text-center">
            <div class="col-md-12">
                <h2>Content</h2>
                <p>Articles</p>
                <hr>
            </div>
       </div>
       <div class="row">
            <div class="swiper-container">
       <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="row px-4">
                    @foreach ($articles as $article)
                        <div class="col-4 col-md-4">
                            <div class="card m-3">
                                <div class="card-body p-5 mx-auto" style="background: rgb(249, 250, 177)">
                                    <h4 class="card-title">{{ $article->name }}</h4>
                                    <h6 class="text-muted card-subtitle mb-2">by: Andrea Bodonyi<br></h6>
                                    <p class="card-text"><em>Pages: 5–19</em><br></p>
                                    <p class="card-text">DOI:&nbsp;10.33039/ami.2021.02.001<br></p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, amet consequuntur corporis culpa cum dolores eius, eum ex id ipsam nisi nostrum obcaecati optio placeat praesentium suscipit tempore vel vero.</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
       </div>
       <!-- Add Pagination -->
       <div class="swiper-pagination"></div>
       <!-- Add Arrows -->
       <div class="swiper-button-next"></div>
       <div class="swiper-button-prev"></div>
            </div>
        </div>
   </div>

@endsection
