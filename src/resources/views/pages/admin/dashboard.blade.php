@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <x-card header="Header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6 col-sm">
                    <x-adminlte-small-box title="111" text="Users Registered" icon="fas fa-users text-dark"
                                          theme="primary" url="#" url-text="View all users"/>
                </div>
                <div class="col-6 col-sm">
                    <x-adminlte-small-box title="222" text="Latest articles" icon="fas fa-book text-dark"
                                          theme="teal" url="#" url-text="View latest articles"/>
                </div>
                <div class="col-6 col-sm">
                    <x-adminlte-small-box title="{{$articles->count()}}" text="Article count" icon="fas fa-poll text-dark"
                                          theme="warning" url="#" url-text="View all articles"/>
                </div>
            </div>
        </div>
    </x-card>
        <div class="card">
            <div class="card-header ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title">
                    <i class="ion ion-clipboard mr-1"></i>
                    Last 10 articles
                </h3>
            </div>
            <div class="card-body">
                <ul class="todo-list ui-sortable" data-widget="todo-list">
                    @php /** @var \App\Models\Article $article */ @endphp
                    @foreach($articles as $article)
                        <li>
                            <span class="text">{{$article->name}}</span>
                            <small class="badge badge-success"><i class="far fa-clock"></i>
                                {{$article->created_at->diffForHumans() }}
                                {{-- TODO: Fix carbon parse --}}
                            </small>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

@stop

@section('css')
{{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
