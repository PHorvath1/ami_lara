@extends('layouts.app')

@php
    /**
    * @var \App\Models\Article $article
    */
@endphp

@section('content')
    <div class="container-fluid p-4" id="container_color">
        <div id="cardtextbc" class="card text-center">
            <div id="articletitel" class="card-header">
                <h3 >Name: {{ $article->name }}</h3>
            </div>
            <div class="card-body">
                <h4 class="lefty">Summary: {{ $article->summary }}</h4>
            </div>
            <div class="articleshowcol">
                <div class="articleshowrow" id="row_rnd">
                    <h4>Article type: {{ $article->article_type }}</h4>
                </div>
                <div class="articleshowrow" id="row_btw">
                    <h4>Page count: {{ $article->page_count }}</h4>
                </div>
                <div class="articleshowrow" id="row_rnd">
                    <h4>State: {{ $article->state }}</h4>
                </div>
            </div>
            <div class="card-body">
                <h4 class="lefty">Note: {{ $article->note }}</h4>
            </div>
            <div class="articleshowcol2">
                <div class="articleshowrow" id="row_rnd">
                    <h4>Lang: {{ $article->language }}</h4>
                </div>
                <div class="articleshowrow" id="row_btw">
                    <h4>DOI: {{ $article->doi }}</h4>
                </div>
                <div class="articleshowrow" id="row_rnd">
                    <h4>Related url: {{ $article->related_url }}</h4>
                </div>
        </div>
            <div class="pdfdownload">
                <button id="pdfdownloadbtn" class="btn btn-danger" type="button">Download pdf</button>
            </div>

    </div>
@endsection
