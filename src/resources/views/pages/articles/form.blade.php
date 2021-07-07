@extends('layouts.app')

@section('content')
    @php
        $article = $article ?? null; //If you do not set a variable it throws an error, so we set it to something easy to check
    @endphp
    <div class="container">
        <div class="wrapper row">
            <div class="col-auto col-lg-3"></div>
            <div class="card col-12 col-lg-6">
                <div class="card-header">
                    <h4>{{$article ? 'Edit' : 'Create'}} Article Form</h4>
                </div>
                <div class="card-body">
                    <x-form :to="$article ? route('articles.update', [$article]) : route('articles.store')"
                            :method="$article ? 'put' : 'post'">
                        <x-form.input name="name"
                                      class="my-3"
                                      placeholder="Some Name"
                                      :value="old('name') ?? $article->name ?? ''"
                                      :required="true">
                            Full name
                        </x-form.input>

                        <x-divider/>

                        <x-form.submit/>
                    </x-form>
                </div>
            </div>
            <div class="col-auto col-lg-3"></div>
        </div>
    </div>
@endsection
