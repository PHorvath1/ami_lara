@extends('adminlte::page')

@section('title', 'Manage user')

@section('content_header')
    <h1>Show User</h1>
@stop

@section('content')
    <div class="container my-2 my-lg-5">
        <table class="table-responsive mx-auto">
            <thead>
            <tr>
                <th colspan="2" class="h3">{{ $user->name }}</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row" class="text-end p-1">Email:</th>
                <td class="p-1">{{ $user->email }}</td>
            </tr>
            <tr>
                <th scope="row" class="text-end p-1">Registered at:</th>
                <td class="p-1">{{ $user->created_at }}</td>
            </tr>
            </tbody>
        </table>

        <table class="table-responsive mx-auto mt-2 mt-md-5">
            <thead>
            <tr>
                <th colspan="2" class="h4">Roles:</th>
            </tr>
            <tr>
                <th scope="col" class="text-end p-3">Role name:</th>
                <th scope="col" class="p-3">Provides:</th>
            </tr>
            </thead>
            <tbody>
            @foreach($user->roles as $role)
                <tr>
                    <td class="text-end p-3">{{ $role->title }}</td>
                    <td class="p-3">{{ $role->abilities->implode('title', ', ') }}</td>
                </tr>
            @endforeach
            <tr>
                <td>
                    <x-button.magic class="btn-warning"
                                    :route="Auth::id() === $user->id ? route('user.profile.edit') : route('admin:users.edit', [$user])">
                        Edit
                    </x-button.magic>
                </td>
                <td>
                    <x-button.magic class="btn-danger" method="delete" :route='route("admin:users.destroy", [$user])'
                                    confirm="Are you sure? This can not be undone!">Delete
                    </x-button.magic>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
