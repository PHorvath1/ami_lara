@extends('layouts.admin')

@section('content_header')
    <h1>Roles</h1>
@stop

@section('content')
    <div class="card">
        <div class="container align-middle p-3 pl-4 card-header">
        <span>
            <a href="{{route('admin:roles.create')}}" class="btn btn-success">
                <i class="fa fa-plus text-light"></i>
                <span class="text-light">Add</span>
            </a>
        </span>
        </div>
        <div class="card-body">
            <ul class="todo-list" data-widget="todo-list">
                @foreach($roles as $role)
                    <div class="mb-4 rounded">
                        <a href="{{route('admin:roles.show',[$role])}}">
                            <li class="m-2">
                                <span class="text text-dark text-bold">{{$role->title}}</span>
                            </li>
                        </a>
                        <a href="{{route('admin:roles.edit',[$role])}}" class="btn btn-warning">Edit</a>
                        <x-button.magic :route='route("admin:roles.destroy", [$role])' method="delete" confirm="Are you sure? This can not be undone!" class="btn btn-danger">
                            Delete
                        </x-button.magic>
                    </div>
                    <hr>
                @endforeach
            </ul>
        </div>
    </div>

@stop
