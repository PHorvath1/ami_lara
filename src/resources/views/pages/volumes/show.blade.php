@extends('layouts.app')

@section('content')
    @php
        /**
        * @var Volume $volume
        * @var LengthAwarePaginator $articles
        * @var Article $article
        */use App\Models\Article;use App\Models\Volume;use Illuminate\Pagination\LengthAwarePaginator;

    @endphp

    <div class="container-fluid p-4 volume_container_color">
        <div class="card text-center">
            <div class="card-header">
                <h3>Name: {{ $volume->title }}</h3>
            </div>
            <div class="card-body">
                <h4>Description: {{ $volume->description }}</h4>
                <h6 class="card-text">Release year<{{ $volume->release_year }}></h6>
            </div>
            <div class="card-footer text-muted">
                {{$volume->created_at->diffForHumans()}}
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
            {{ $articles->links() }}
        </div>
        <div class="row">
            <div class="row px-4">
                @foreach ($articles as $article)
                    <div class="col-4 col-md-4">
                        <div class="card m-3">
                            <a href="{{route('articles.show', $article->id)}}" class="text-decoration-none text-dark">
                                <div class="card-body p-5 mx-auto card_color">
                                    <h4 class="card-title"> {{ $article->title }}</h4>
                                    <h6 class="text-muted card-subtitle mb-2">by: {{ $article->user->name }}<br></h6>
                                    <p class="card-text">Summary: {{ $article->abstract }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
