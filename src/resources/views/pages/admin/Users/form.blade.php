@extends('layouts.admin')

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
                    <x-form :to="$user ? route('admin:users.update', [$user]) : route('admin:users.store')" :method="$user ? 'put' : 'post'">
                        <label for="full_name">Full name</label>
                        <x-form.input name="name"
                                      class="my-3"
                                      placeholder="Some Name"
                                      :value="old('name') ?? $user->name ?? ''"
                                      :required="true">
                        </x-form.input>
                        <label for="email_address">Email address</label>
                        <x-form.input type="email"
                                      name="email"
                                      class="my-3"
                                      placeholder="someone@example.com"
                                      :value="old('email') ?? $user->email ?? ''"
                                      :required="true">
                        </x-form.input>
                        <x-form.submit />
                    </x-form>
                </div>
            </div>
            <div class="col-auto col-lg-3"></div>
        </div>
    </div>
@endsection
