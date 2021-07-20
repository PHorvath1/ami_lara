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
        <div class="row">
            <div class="col-md-4">
                <h5>Browse volumes or latest articles: </h5>
                <select name="" id="" class="form-control input-sm" >
                    @foreach($volumes as $vol)
                        <option value="{{$vol->id}}"> Vol: {{$vol->id}}. ({{$vol->release_year}})</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="wrapper">
            @foreach($volumes as $v)
                <a href="{{route('volumes.show',$v)}}" class="text-decoration-none text-dark"><div class="card ami-yellow m-2">
                        <div class="article_header_color">
                            <h5 class="card-title article-card-header">{{$v->name}}</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{$v->description}}</p>
                            <p class="card-text">{{$v->release_year}}</p>
                        </div>
                    </div></a>
            @endforeach
            <div>
                {{ $volumes->render() }}
            </div>
        </div>
    </div>
@endsection
