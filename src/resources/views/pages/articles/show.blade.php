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
                <h4 >Name: {{ $article->name }}</h4>
            </div>
            <div class="card-body">
                <h5 class="lefty">Summary: {{ $article->summary }}</h5>
            </div>
            <div class="articleshowcol">
                <div class="articleshowrow" id="row_rnd">
                    <h5>Article type: {{ $article->article_type }}</h5>
                </div>
                <div class="articleshowrow" id="row_btw">
                    <h5>Page count: {{ $article->page_count }}</h5>
                </div>
                <div class="articleshowrow" id="row_rnd">
                    <h5>State: {{ $article->state }}</h5>
                </div>
            </div>
            <div class="card-body">
                <h5 class="lefty">Note: {{ $article->note }}</h5>
            </div>
            <div class="articleshowcol2">
                <div class="articleshowrow" id="row_rnd">
                    <h5>Lang: {{ $article->language }}</h5>
                </div>
                <div class="articleshowrow" id="row_btw">
                    <h5>DOI: {{ $article->doi }}</h5>
                </div>
                <div class="articleshowrow" id="row_rnd">
                    <h5>Related url: {{ $article->related_url }}</h5>
                </div>
        </div>
            <div class="pdfdownload">
                <button id="pdfdownloadbtn" class="btn btn-danger" type="button">Download pdf</button>
            </div>
        @can('see-revisions')
        @endcan
    </div>
        <div class="container-fluid p-4" id="comm_container_c">
            <div class="col">
                <div class="row">
                    <div class="comment">
                        <form>
                            <textarea id="title" type="text "rows="2" cols="60" placeholder="Write a comment......"></textarea>
                            <input type="submit" value="Post" onclick="insert()" style="width:100px;" />
                        </form>
                    </div>
                </div>
                @foreach($article->revisions as $r)
                    @if($r->article_id === $article->id)
                        @foreach($r->comments as $comment)
                            <div class="row_comment">
                                <div>{{$users->find($comment->user_id)->name }}</div>
                                <div class="text-muted">{{$comment->created_at}}</div>
                                <div>{{$comment->content}}</div>
                                <div class="row_comment_border"></div>
                            </div>
                        @endforeach
                    @endif
                @endforeach
            </div>
        </div>
@endsection
