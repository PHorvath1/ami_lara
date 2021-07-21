@extends('layouts.app')

@section('content')
    @php
        /**
        * @var App\Models\Article $article
        * @var \Illuminate\Database\Eloquent\Collection $authors
        * @var App\Models\Volume $volume
        */
    @endphp

    <div class="container">
        <div class="row justify-content-start">
            <div class="col-3">
                <h6>Browse volumes or latest articles: </h6>
            </div>
        </div>
        <hr>
        <div class="row">
            @foreach($volumes as $v)
                <div class="col-sm col-md-5 mx-auto">
                    <a href="{{route('volumes.show',$v)}}" class="text-decoration-none text-dark">
                        <div class="card ami-yellow m-2">
                            <div class="article_header_color">
                                <h5 class="card-title article-card-header">Name: {{$v->name}} </h5>
                            </div>
                            <div class="card-body">
                                <p class="card-text">{{$v->description}}</p>
                                <p class="card-text"><br>Vol: {{$v->id}}. ({{$v->release_year}})</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div>
            {{ $volumes->render() }}
        </div>
    </div>
@endsection
