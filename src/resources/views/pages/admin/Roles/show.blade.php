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
                Registration date: {{ $role->created_at }}
            </div>
        </div>
    </div>
@endsection