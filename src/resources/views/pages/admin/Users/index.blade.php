@extends('layouts.admin')

@section('content_header')
    <h1>Users</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul class="todo-list" data-widget="todo-list">
                @foreach($users as $user)
                    <div class="mb-4 rounded">
                        <a href="{{route('admin:users.show',[$user])}}">
                            <li class="m-2">
                                <span class="text text-dark text-bold">{{$user->name}}</span>
                                <div>
                                    <p class="text-dark">{{$user->email}}</p>
                                    <p class="text-dark">Created at: {{$user->created_at}}</p>
                                </div>
                            </li>
                        </a>
                        <a href="{{route('admin:users.edit',[$user])}}" class="btn btn-warning">Edit</a>
                        <x-button.magic :route='route("admin:users.destroy", [$user])' method="delete" confirm="Are you sure? This can not be undone!" class="btn btn-danger">
                            Delete
                        </x-button.magic>
                    </div>
                    <hr>
                @endforeach
            </ul>
        </div>
    </div>

@stop
