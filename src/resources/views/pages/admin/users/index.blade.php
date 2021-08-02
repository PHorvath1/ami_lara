@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
    <h1>List Users</h1>
@stop

@section('content')
    <div class="container">

        <div class="wrapper">
            <div>
                <span>
                    <a class="btn btn-success" href="{{route('admin:users.create')}}">
                        <i class="fa fa-plus"></i>
                        Add
                    </a>
                </span>
            </div>
           <x-card header="">
                   <x-table.datatable
                       id="user_data"
                       class="table-responsive w-100"
                       prefix="admin:"
                       :for="$users"
                       :as="['Name', 'Email', 'Created At']"
                       :view="true"
                       :delete="true"
                       :edit="true"
                   />
           </x-card>
        </div>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    {!! \App\Datatable\Datatable::css() !!}
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
@stop
