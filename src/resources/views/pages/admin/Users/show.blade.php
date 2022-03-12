@extends('layouts.admin')

@section('content')
    @php
        /**
        * @var User $user
        */
        use App\Models\User;
    @endphp

    <div class="container-fluid p-4 volume_container_color">
        <div class="card text-center">
            <div class="card-header">
                <h3>Name: {{ $user->name }}</h3>
            </div>
            <div class="card-body">
                <h4>Email: {{ $user->email }}</h4>
            </div>
            <div class="card-footer text-muted">
                Registration date: {{ $user->created_at }}
            </div>
        </div>
    </div>
@endsection
