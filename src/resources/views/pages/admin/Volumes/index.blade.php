@extends('layouts.admin')

@section('content_header')
    <h1>Volumes</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header d-inline-block align-middle">
            <span>
                <a href="{{route('admin:volumes.create')}}" class="btn btn-success">
                    <i class="fa fa-plus text-light"></i>
                    <span class="text-light">Add</span>
                </a>
            </span>
        </div>
        <div class="card-body">
            <ul class="todo-list" data-widget="todo-list">
                @foreach($volumes as $volume)
                    <div class="mb-4 rounded">
                        <a href="{{route('admin:volumes.show',[$volume])}}">
                            <li class="m-2">
                                <span class="text text-dark text-bold">{{$volume->Title}}</span>
                                <span class="ml-2 text-muted">#{{$volume->id}}</span>
                                <div>
                                    <p class="text-muted">{{$volume->release_year}}</p>
                                    <p class="text-dark">{{$volume->description}}</p>
                                </div>
                            </li>
                        </a>
                        <a href="{{route('admin:volumes.edit',[$volume])}}" class="btn btn-warning">Edit</a>
                        <x-button.magic :route='route("admin:volumes.destroy", [$volume])' method="delete" confirm="Are you sure? This can not be undone!" class="btn btn-danger">
                            Delete
                        </x-button.magic>
                    </div>
                    <hr>
                @endforeach
            </ul>
        </div>
    </div>

@stop
