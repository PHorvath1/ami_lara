@extends('layouts.admin')

@section('content')
    @php
        $role = $role ?? null; //If you do not set a variable it throws an error, so we set it to something easy to check
    @endphp
    <div class="container">
        <div class="wrapper row">
            <div class="col-auto col-lg-1"></div>
            <div class="card col-12 col-lg-10">
                <div class="card-header">
                    <h4>{{$role ? 'Edit' : 'Create'}} Role</h4>
                </div>
                <div class="card-body">
                    <x-form :to="$role ? route('admin:roles.update', [$role]) : route('admin:roles.store')" :method="$role ? 'put' : 'post'">

                        <x-form.input type="name"
                                      name="name"
                                      class="my-3"
                                      placeholder="Some Name"
                                      :value="old('name') ?? $role->name ?? ''"
                                      :required="true">
                            Name
                        </x-form.input>

                        <x-form.input type="title"
                                      name="title"
                                      class="my-3"
                                      placeholder="Some Name"
                                      :value="old('title') ?? $role->title ?? ''"
                                      :required="true">
                            Title
                        </x-form.input>

                        <x-form.input type="level"
                                      name="level"
                                      class="my-3"
                                      placeholder="Some Number"
                                      :value="old('level') ?? $role->level ?? ''">
                            Level
                        </x-form.input>

                        <x-form.input type="scope"
                                      name="scope"
                                      class="my-3"
                                      placeholder="Some Number"
                                      :value="old('scope') ?? $role->scope ?? ''">
                            Scope
                        </x-form.input>

                        <x-form.submit />

                    </x-form>
                </div>
            </div>
            <div class="col-auto col-lg-1"></div>
        </div>
    </div>
@endsection
