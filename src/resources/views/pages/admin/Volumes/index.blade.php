@extends('layouts.admin')

@section('content_header')
    <h1>Volumes</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header d-inline-block align-middle">
            <span>
                <a href="#" class="btn btn-success">
                    <i class="fa fa-plus text-light"></i>
                    <span class="text-light">Add</span>
                </a>
            </span>
        </div>
        <div class="card-body">
            <ul class="todo-list" data-widget="todo-list">
                @foreach($volumes as $volume)
                    <div class="mb-4 rounded">
                        <a href="#">
                            <li class="m-2">
                                <span class="text text-dark text-bold">{{$volume->Title}}</span>
                                <span class="ml-2 text-muted">#{{$volume->id}}</span>
                                <div>
                                    <p class="text-muted">{{$volume->release_year}}</p>
                                    <p class="text-dark">{{$volume->description}}</p>
                                </div>
                            </li>
                        </a>
                        <a href="#" class="btn btn-warning">Edit</a>
                        <a href="#" class="btn btn-danger">Delete</a>
                    </div>
                    <hr>
                @endforeach
            </ul>
        </div>
    </div>

@stop
