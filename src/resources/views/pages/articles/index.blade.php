@extends('layouts.app')

@push('pre-js')
    {{--    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>--}}
    {{--    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>--}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
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
                        <ul class="dropdown-menu advanced-search-dropdown" aria-labelledby="btn-advanced-search">
                            <li class="mx-3"><label for="contributor" class="m-1">Contributor:</label>
                            <input type="text" id="contributor" class="dropdown-item" name="contributor-search" placeholder="Contributor"></li>
                            <li class="mx-3"><label for="date" class="m-1">Date:</label>
                            <input type="text" id="date" class="dropdown-item" name="date-search" value="01/01/2020 - 01/01/2020"></li>
                            <li class="mx-3"><label for="category" class="m-1">Categories:</label>
                            <input type="text" id="category" class="dropdown-item" name="category-search" placeholder="Categories"></li>
                            <li class="mx-3 my-2"><button class="btn btn-primary rounded float-lg-end" name="btn-filter" type="submit">Filter search</button></li>
                        </ul>
                    </div>
                </form>
                {{ $articles->links() }}
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
                {{ $articles->links() }}
            </div>
        </div>
    </div>

    <script>
        $(function() {
            $('input[name="date-search"]').daterangepicker({
                opens: 'left'
            });
        });
    </script>
@endsection
