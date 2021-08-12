@extends('layouts.app')

@section('content')
    @php
        $user = $user ?? null; //If you do not set a variable it throws an error, so we set it to something easy to check
    @endphp
    <div class="container">
        <div class="wrapper row">
            <div class="col-auto col-lg-3"></div>
            <div class="card col-12 col-lg-6">
                <div class="card-header">
                    <h4>{{$user ? 'Edit' : 'Create'}} Profile</h4>
                </div>
                <div class="card-body">
                    <x-form :to="$user ? route('users.update', [$user]) : route('users.store')" :method="$user ? 'put' : 'post'">
                        <x-form.input name="name"
                                      class="my-3"
                                      placeholder="Some Name"
                                      :value="old('name') ?? $user->name ?? ''"
                                      :required="true">
                            Full name
                        </x-form.input>
                        <x-form.input type="email"
                                      name="email"
                                      class="my-3"
                                      placeholder="someone@example.com"
                                      :value="old('email') ?? $user->email ?? ''"
                                      :required="true">
                            Email address
                        </x-form.input>
                        <x-divider />
                        <x-form.input type="password"
                                      name="password"
                                      class="my-3"
                                      placeholder="********"
                                      :required="!$user"
                        >
                            New Password {{$user ? '(Empty for unchanged)' : ''}}
                        </x-form.input>
                        <x-form.input type="password"
                                      name="password_confirmation"
                                      class="my-3"
                                      placeholder="********"
                                      :required="!$user"
                        >
                            Confirm new Password
                        </x-form.input>
                        <x-divider />
                        <x-form.input type="password"
                                      name="current_password"
                                      class="my-3"
                                      placeholder="********"
                                      :required="true">
                            Your Current Password
                        </x-form.input>

                        <x-form.submit />
                    </x-form>
                </div>
            </div>
            <div class="col-auto col-lg-3"></div>
        </div>
    </div>
@endsection
