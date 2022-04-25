@extends('layouts.admin')

@section('content')
    @php
        $volume = $volume ?? null; //If you do not set a variable it throws an error, so we set it to something easy to check
    @endphp
    <div class="container">
        <div class="wrapped row">
            <div class="col-auto col-lg-3"></div>
            <div class="col 12 col-lg-6">
                <div class="card" id="form_body">
                    <div class="card-header" id="form_header">
                        <h4>{{$volume ? 'Edit' : 'Create'}} Volume Form</h4>
                    </div>
                    <div class="card-body">
                        <x-form :to="$volume ? route('admin:volumes.update', [$volume]) : route('admin:volumes.store')"
                                :method="$volume ? 'put' : 'post'">

                            <label for="title">Title</label>
                            <x-form.input name="title"
                                          class="my-2"
                                          :value="old('title') ?? $volume->title ?? ''">
                            </x-form.input>

                            <label for="description">Description</label>
                            <x-form.input name="description"
                                          class="my-2"
                                          type="textarea"
                                          :value="old('description') ?? $volume->description ?? ''"
                                          :required="true">
                            </x-form.input>

                            <x-divider/>

                            @if($volume != null)
                                <label for="release_year">Release year</label>
                                <x-form.input name="release_year"
                                              class="my-2"
                                              :value="old('release_year') ?? $volume->release_year ?? ''">
                                </x-form.input>
                            @endif

                            @if ($volume == null)
                                @if (count($articles) > 0)
                                    <fieldset class="form-group">
                                    <legend class="col-form-label">Available articles</legend>
                                    <hr>
                                    @foreach($articles as $a)
                                        <div class="mx-2">
                                            <x-form.checkbox name="article"
                                                             :id="$a->id"
                                                             :value="$a->id">
                                                {{$a->title}}
                                            </x-form.checkbox>
                                        </div>
                                    @endforeach
                                    </fieldset>
                                @else
                                    <div class="text-bold my-3">There is no available article</div>
                                @endif
                            @endif

                            <x-form.submit/>
                        </x-form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection