@extends('layouts.app')

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

            <x-form.advanced-search :articles="$articles"/>

            @forelse($articles as $a)
                <a href="{{route('articles.show',$a)}}" class="text-decoration-none text-dark"><div class="card ami-yellow m-2">
                        <div class="article_header_color">
                            <h5 class="card-title article-card-header">{{$a->title}}</h5>
                             <h6 class="article-card-header">State: {{ $a->stateText }}</h6>
                            <span class="article-card-header text-muted">{{$a->user->name}} </span>
                            <h6 class="card-subtitle article-card-header mb-2 text-muted">{{$a->created_at}}</h6>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{$a->abstract}}</p>
                            <p class="card-text">{{$a->language}}</p>
                        </div>
                    </div></a>
            @empty
                <div class="flex justify-center font-sans font-bold text-2xl text-black">
                    <p>No articles found</p>
                </div>
            @endforelse
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
