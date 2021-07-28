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
                    <x-adminlte-small-box title="333" text="Article count" icon="fas fa-poll text-dark"
                                          theme="warning" url="#" url-text="View all articles"/>
                </div>
            </div>
        </div>
    </x-card>
@stop

@section('css')
{{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
