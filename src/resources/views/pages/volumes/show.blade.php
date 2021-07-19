@extends('layouts.app')

@section('content')
    @php
    /**
    * @var \App\Models\Volume $volume
    * @var \Illuminate\Pagination\LengthAwarePaginator $articles
    * @var \App\Models\Article $article
    */
    @endphp
   <div class="container-fluid p-4" id="container_color">
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
       <div>
           {{ $articles->render() }}
       </div>
       <div class="row">
           <div class="row px-4">
                @foreach ($articles as $article)
                    @php
                        /**
                        * @var App\Models\Article $article
                        * @var \Illuminate\Database\Eloquent\Collection $authors
                        * @var App\Models\Volume $volume
                        */
                        $authors=$article->users;
                        $author_text=$authors->map(fn(\App\Models\User $user) => $user->name)->implode(', ');
                        $pivot = null;
                        foreach ($volume->articles as $temp_article){
                            if($temp_article->id = $article->id){
                                    $pivot = $temp_article->pivot;
                                    //dd($pivot);
                                    break;
                            }
                        }
                    @endphp
                    <div class="col-4 col-md-4">
                        <div class="card m-3">
                            <div class="card-body p-5 mx-auto" id="card_color">
                                <h4 class="card-title">{{ $article->name }}</h4>
                                <h6 class="text-muted card-subtitle mb-2">by: {{ $author_text }}<br></h6>
                                <p class="card-text"><em>Pages: {{ $pivot->from_page }} - {{$pivot->to_page }}</em><br></p>
                                <p class="card-text">DOI:&nbsp;{{ $article->doi }}<br></p>
                                <p class="card-text">Summary: {{ $article->summary }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
           </div>
       </div>
   </div>
@endsection
