@extends('layouts.admin')

@section('content')
    @php
        /**
        * @var Role $role
        */
        use App\Models\Role;
    @endphp

    <div class="container-fluid p-4 volume_container_color">
        <div class="card text-center">
            <div class="card-header">
                <h3>Name: {{ $role->name }}</h3>
            </div>
            <div class="card-body">
                <h4>Title: {{ $role->title }}</h4>
                <h4>Level: {{ $role->level }}</h4>
                <h4>Scope: {{ $role->scope }}</h4>
            </div>
            <div class="card-footer text-muted">
                <a href="{{route('admin:roles.edit',[$role])}}" class="btn btn-warning">Edit</a>
                <x-button.magic :route='route("admin:roles.destroy", [$role])' method="delete" confirm="Are you sure? This can not be undone!" class="btn btn-danger">
                    Delete
                </x-button.magic>
            </div>
        </div>
    </div>
@endsection
