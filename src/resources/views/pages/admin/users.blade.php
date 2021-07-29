@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
    <h1>List Users</h1>
@stop

@section('content')
        <div class="container">

            <div class="wrapper">
                <x-table.datatable
                    id="user_data"
                    class="table-responsive"
                    prefix="admin."
                    :for="$users"
                    :as="['Name', 'Email', 'Created At']"
                    :view="true"
                    :delete="true"
                    :edit="true"
                />
            </div>
        </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop
