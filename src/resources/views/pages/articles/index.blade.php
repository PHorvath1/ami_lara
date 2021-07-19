@extends('layouts.app')

@push('pre-js')
    {{--    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>--}}
    {{--    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>--}}
@endpush

@section('content')
    <div class="container">
        <div class="wrapper">
            <div>
                {{ $articles->render() }}
            </div>
            @foreach($articles as $a)
                <a href="{{route('articles.show',$a)}}" class="text-decoration-none text-dark"><div class="card ami-yellow m-2">
                    <div class="article_header_color">
                        <h5 class="card-title article-card-header">{{$a->name}}</h5>
                        @foreach($a->users as $author)
                            <span class="article-card-header text-muted">{{$author->name}} </span>
                        @endforeach
                        <h6 class="card-subtitle article-card-header mb-2 text-muted">{{$a->created_at}}</h6>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{$a->summary}}</p>
                        <p class="card-text">{{$a->language}}</p>
                        <p class="card-text text-muted">{{$a->doi}}</p>
                    </div>
                    </div></a>
            @endforeach
            <div>
                {{ $articles->render() }}
            </div>
        </div>
    </div>
@endsection
