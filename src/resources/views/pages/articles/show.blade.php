@extends('layouts.app')

@php
    /**
    * @var \App\Models\Article $article
    * @var \App\Models\Revision $revision
    */
@endphp

@section('content')
    <div class="container-fluid p-4" id="container_color">

        <div class="card text-center" id="cardtextbc">
            <div class="card-header articletitle">
                <h4>Title: {{ $article->title }}</h4>
            </div>
            <div class="card-bodywrap">
                <h5 class="closer">Abstract:</h5>
                <p class="lefty">{{ $article->abstract }}</p>
            </div>
            <div class="articleshowcol">
                <div class="articleshowrow row_rnd">
                    <h5>Type: {{ $types->where('id', 'LIKE', $article->type_id)->first()->name }}</h5>
                </div>
                <div class="articleshowrow row_btw">
                    <h5>Page count: {{ $article->page_count }}</h5>
                </div>
                <div class="articleshowrow row_rnd">
                    <h5>State: {{ $article->stateText }}</h5>

                </div>
            </div>
            <div class="articleshowcol2">
                <div class="articleshowrow row_rnd">
                    <h5>Lang: {{ $article->language }}</h5>
                </div>
                <div class="articleshowrow row_btw">
                    <h5>DOI: {{ $article->doi }}</h5>
                </div>
            </div>
            <div class="pdfdownload">
                <form method="get" action="{{route('download', $article->revisions->last()->pdf_path)}}" target="_blank">
                    <button  id="pdfdownloadbtn" class="btn-danger">
                        Download pdf
                    </button >
                </form>
                <div class="rightfloat">
                    @php
                        $author=$article->user;
                        $contains = false;

                        if ($author->id === Auth::user()->id) {
                            $contains = true;
                        }

                    @endphp
                    @if(\App\Utils\Bouncer::can('edit', $article) || $contains)

                        <div class="btnd">
                            <x-button.magic class="btn-warning"
                                            :route="route('articles.edit', [$article])">
                                Edit
                            </x-button.magic>
                        </div>
                        <div class="btnd">
                            <x-button.magic class="btn-danger" :route="route('articles.destroy', [$article])"
                                            confirm="Are you sure? This can not be undone!">Delete
                            </x-button.magic>
                        </div>
                    @endif
                </div>
            </div>

        </div>


    </div>


@endsection
