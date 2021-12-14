@extends('layouts.admin')

@section('content')
    <div class="containerusershow">


        <div class="colgrid">
            <div class="row profrow">
                <h3 class="h3title">{{ $user->name }}</h3>
                <span class="spanbold">
                   Email:
                   <p class="cleantext">{{ $user->email }}</p>
               </span>
                <span class="spanbold">
                   Registered at:
                   <p class="cleantext">{{ $user->created_at }}</p>
               </span>
            </div>
            <div class="rowgrid topmarginrowgrid">
                <div class="rowgrid rowgridcolor">
                    <h3 class="h3title">Roles:</h3>
                </div>
                <div class="row">
                    <div class="colgrid">
                        <span class="spanbold">
                            Role name:
                            @foreach($user->roles as $role)
                                <p class="cleantext">{{ $role->title }}</p>
                            @endforeach
                        </span>
                        <div class="buttonwraper">
                            <x-button.magic class="btn-warning"
                                            :route="Auth::id() === $user->id ? route('user.profile.edit') : route('users.edit', [$user])">
                                Edit
                            </x-button.magic>
                        </div>
                    </div>
                    <div class="colgrid">
                        <span class="spanbold">
                            Provides:
                            @foreach($user->roles as $role)
                                <p class="cleantext">{{ $role->abilities->implode('title', ', ') }}</p>
                            @endforeach
                        </span>
                        <x-button.magic class="btn-danger" :route="route('users.destroy', [$user])"
                                        confirm="Are you sure? This can not be undone!">Delete
                        </x-button.magic>
                    </div>
                </div>
                <div class="row">

                </div>
            </div>
        </div>


    </div>
@endsection
