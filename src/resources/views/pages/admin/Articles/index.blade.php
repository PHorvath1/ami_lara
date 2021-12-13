@extends('layouts.app')
@extends('layouts.admin')

@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endpush

@push('pre-js')
    {{--    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>--}}
    {{--    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>--}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
@endpush

@section('content_header')
    <h1>Articles</h1>
@endsection

@section('content')
    <div class="container">
        <div class="wrapper">
            <div class="d-inline-block advanced-searchbar-width">
                <form class="d-lg-flex me-auto justify-content-lg-start search-form float-lg-end" target="_self">
                    <div class="d-flex justify-content-lg-end"><input class="border rounded form-control search-field" type="text" id="search-field" name="name">
                        <button id="searchbtn" class="btn btn-primary d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center" type="submit"><i class="fas fa-search"></i></button>
                        <button class="btn rounded btn-advanced-search" id="btn-advanced-search" type="button" data-bs-toggle="collapse" data-bs-target="#searchCollapse" aria-expanded="false" aria-controls="collapse">Advanced search</button>
                    </div>
                </form>
                {{ $articles->appends(request()->except('page'))->links() }}
            </div>
            <div class="collapse" id="searchCollapse">
                <form target="_self">
                    <div class="row m-2 align-items-center">
                        <div class="col-2">
                            <label for="author">Author:</label>
                        </div>
                        <div class="col-4">
                            <input type="text" id="author" name="author" placeholder="Author">
                        </div>
                    </div>
                    <div class="row m-2 align-items-center">
                        <div class="col-2">
                            <label for="date">Date:</label>
                        </div>
                        <div class="col-4">
                            <input type="text" id="date" name="date" value="{{date('Y-m-d')}}">
                        </div>
                    </div>
                    <div class="row m-2 align-items-center">
                        <div class="col-2">
                            <label for="category">Categories:</label>
                        </div>
                        <div class="col-4">
                            <input type="text" id="category" name="categories" placeholder="Categories">
                        </div>
                    </div>
                    <div class="m-2">
                        <button class="btn btn-primary rounded" type="submit">Filter search</button>
                    </div>
                </form>
            </div>
            @foreach($articles as $a)
                <a href="{{route('admin:articles.show',$a)}}" class="text-decoration-none text-dark"><div class="card ami-yellow m-2">
                        <div class="article_header_color">
                            <h5 class="card-title article-card-header">{{$a->title}}</h5>
                            <h6>State: {{ $a->stateText }}</h6>
                            <span class="article-card-header text-muted">{{$a->user->name}} </span>
                            <h6 class="card-subtitle article-card-header mb-2 text-muted">{{$a->created_at}}</h6>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{$a->abstract}}</p>
                            <p class="card-text">{{$a->language}}</p>
                        </div>
                    </div></a>
                <a href="{{route('admin:articles.edit',[$article])}}" class="btn btn-warning">Edit</a>
                <x-button.magic :route='route("admin:articles.destroy", [$article])' method="delete" confirm="Are you sure? This can not be undone!" class="btn btn-danger">
                    Delete
                </x-button.magic>
            @endforeach
            <div>
                {{ $articles->appends(request()->except('page'))->links() }}
            </div>
        </div>
    </div>

    <script>
        $(function() {
            $('input[name="date"]').daterangepicker({
                timePicker: true,
                timePicker24Hour: true,
                opens: 'left',
                locale: {
                    format: 'YYYY/MM/DD H:mm:ss'
                }
            }).click( function(e) {
                e.stopPropagation();
            });
        });
    </script>
@endsection
