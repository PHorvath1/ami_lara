@extends('layouts.admin')

@section('content')
    @php
        /**
        * @var Volume $volume
        * @var LengthAwarePaginator $articles
        * @var Article $article
        */use App\Models\Article;use App\Models\Volume;use Illuminate\Pagination\LengthAwarePaginator;

    @endphp

    <div class="container-fluid p-4 volume_container_color">
        <div class="card text-center">
            <div class="card-header">
                <h3><span class="font-weight-bold">Title:</span> {{$article->title}}</h3>
            </div>
            <div class="card-body">
                <h4><span class="font-weight-bold">Author:</span> {{ $article->user()->first()->name }}</h4>
                <h4><span class="font-weight-bold">Abstract:</span> {{ $article->abstract }}</h4>
                <h4><span class="font-weight-bold">Type:</span> {{ $types->where('id', 'LIKE', $article->type_id)->first()->name }}</h4>
                <h4><span class="font-weight-bold">State:</span> {{ $article->stateText }}</h4>
            </div>
            <div class="card-footer text-muted  align-content-center">
                <form class="d-inline" action="{{route('download', $article->revisions->last()->pdf_path)}}" method="get">
                    <input type="submit" class="btn btn-info" value="Download pdf">
                </form>
                <x-button.magic :route='route("admin:articles.edit",[$article])' method="get" class="btn btn-warning">
                    Edit
                </x-button.magic>
                <x-button.magic :route='route("admin:articles.destroy", [$article])' method="delete" confirm="Are you sure? This can not be undone!" class="btn btn-danger">
                    Delete
                </x-button.magic>
            </div>
        </div>
        <hr>

    </div>
@endsection
