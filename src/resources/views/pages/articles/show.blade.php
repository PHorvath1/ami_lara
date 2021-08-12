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
                <h5 class="closer">Summary:</h5>
                <p class="lefty">Abstract {{ $article->abstract }}</p>
            </div>
            <div class="articleshowcol">
                <div class="articleshowrow row_rnd">
                    <h5>Type: {{ $article->type }}</h5>
                </div>
                <div class="articleshowrow row_btw">
                    <h5>Page count: {{ $article->page_count }}</h5>
                </div>
                <div class="articleshowrow row_rnd">
                    <h5>State: {{ $article->stateText }}</h5>

                </div>
            </div>
            <div class="card-bodywrap">
                <h5 class="closer">Note:</h5>
                <p class="lefty"> {{ $article->note }}</p>
            </div>
            <div class="articleshowcol2">
                <div class="articleshowrow row_rnd">
                    <h5>Lang: {{ $article->language }}</h5>
                </div>
                <div class="articleshowrow row_btw">
                    <h5>DOI: {{ $article->doi }}</h5>
                </div>
                <div class="articleshowrow row_rnd">
                    <h5>Related url: {{ $article->related_url }}</h5>
                </div>
            </div>
            <div class="pdfdownload">
                <form method="get" action="{{route('download', $article->revisions->last()->pdf_path)}}" target="_blank">
                    <button  id="pdfdownloadbtn" class="btn-danger">
                        Download pdf
                    </button >
                </form>
                <div class="rightfloat">
                    @if(\App\Utils\Bouncer::can('edit', $article))

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

        <div class="container-fluid p-4" id="comm_container_c">
            <div class="col">
                <div class="row">
                    <div class="comment">

                        <form class="commentfrom" method="post" action="{{route('comment.store',$article)}}">
                            @csrf
                            <input type="hidden" name="user_id" value="{{Auth::id()}}"/>
                            <input type="hidden" name="revision_id" value="{{$article->revisions->last()->id}}"/>
                            <div class="d-inline-block mb-3">
                                <label for="feedback">Feedback:</label>
                                <select id="review"
                                        name="review"
                                        class="w-25"
                                        required>
                                    @foreach($article->revisions->last()->comments->last()->getReviews() as $review)
                                        <option value="{{$review}}">{{$review}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <textarea name="content" id="title" type="text "rows="2" cols="60" placeholder="Write a comment......"></textarea>
                            <input class="commentbtn" type="submit" value="Post"/>

                        </form>
                    </div>
                </div>
                @foreach($article->revisions as $r)
                    @foreach($r->comments()->latest()->get() as $comment)
                        <div class="row_comment">
                            <div>{{ $comment->user->name }}</div>
                            <div class="text-muted">{{$comment->created_at}}</div>
                            <div>{{$comment->content}}</div>
                            <div class="row_comment_border"></div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>

    </div>


@endsection
