@extends('layouts.app')

@push('pre-js')
    {{--    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>--}}
    {{--    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>--}}
@endpush

@section('content')
    <div class="container">
        <div class="wrapper">
            <div>
                <form class="d-lg-flex me-auto justify-content-lg-start search-form float-lg-end" target="_self">
                    <div class="d-flex justify-content-lg-end"><input class="border rounded form-control search-field" type="search" id="search-field" name="search" style="background: white;width: 230px;">
                        <button id="searchbtn" class="btn btn-primary d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center" type="button"><i class="fas fa-search"></i></button></div>
                    <div class="dropdown">
                        <button class="btn rounded dropdown-toggle btn-advanced-search" id="btn-advanced-search" type="button" data-bs-toggle="dropdown" aria-expanded="false">Advanced search</button>
                        <ul class="dropdown-menu" aria-labelledby="btn-advanced-search">
                            <li><label for="author" class="m-1">Author:</label></li>
                            <li><input type="text" id="author" class="dropdown-item" name="author-search" placeholder="Author"></li>
                            <li><label for="year" class="m-1">Year:</label></li>
                            <li><input type="text" id="year" class="dropdown-item" name="year-search" placeholder="Year"></li>
                            <li><label for="category" class="m-1">Category:</label></li>
                            <li><input type="text" id="category" class="dropdown-item" name="category-search" placeholder="Categories"></li>
                            <li><button class="btn btn-primary rounded" name="btn-filter" type="submit">Filter search</button></li>
                        </ul>
                    </div>
                </form>
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
