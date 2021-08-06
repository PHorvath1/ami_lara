@extends('layouts.app')

@section('content')
    @php
        $article = $article ?? null; //If you do not set a variable it throws an error, so we set it to something easy to check
    @endphp
    <div class="container">
        <div class="wrapped row">
            <div class="col-auto col-lg-3"></div>
            <div class="col 12 col-lg-6">
                <div class="card" id="form_body">
                    <div class="card-header" id="form_header">
                        <h4>{{$article ? 'Edit' : 'Create'}} Article Form</h4>
                    </div>
                    <div class="card-body">
                        <x-form :to="$article ? route('articles.update', [$article]) : route('articles.store')"
                                :method="$article ? 'put' : 'post'" :allowFile="true">

                            @if ($article != null)
                                <label for="state">State</label>
                                <select id="state"
                                        name="state"
                                        class="my-6"
                                        required>
                                    <option value="{{$article->state}}" selected hidden>{{$article->getStateTextAttribute()}}</option>
                                    @foreach($article->getStates() as $state)
                                        <option value="{{$state}}">{{$state}}</option>
                                    @endforeach

                                </select>
                                <!-- // TODO: Technikai szerkesztő jogosultság implementálása -->
                                <x-form.input name="source"
                                              class="my-6">
                                    Source
                                </x-form.input>

                                <x-form.input name="page count"
                                              class="my-6">
                                    Page count
                                </x-form.input>

                                <x-form.input type="file"
                                              name="latex"
                                              class="my-3"
                                              multiple
                                              :value="old('latex') ?? $article->latex ?? ''"
                                              :required="false">
                                    Upload LaTeX files
                                </x-form.input>

                                @if($article->editor_id === Auth::id())
                                <x-form.input name="note"
                                              class="my-3"
                                              placeholder="Note"
                                              :value="old('note') ?? $article->note ?? ''"
                                              :required="false">
                                    Note
                                </x-form.input>
                                @endif
                            @endif

                            <x-form.input name="title"
                                          class="my-3"
                                          placeholder="Title of your article"
                                          :value="old('title') ?? $article->title ?? ''"
                                          :required="true">
                                Title
                            </x-form.input>
                            <x-form.input name="abstract"
                                          type="textarea"
                                          class="my-3"
                                          :value="old('abstract') ?? $article->abstract ?? ''"
                                          :required="true">
                                Abstract
                            </x-form.input>

                            <x-divider/>

                            <label for="type">Type</label>
                            <select id="type"
                                    name="type"
                                    class="my-6"
                                    required>
                                <option value="{{$article->type_id}}" selected hidden>{{$article->getTypeTextAttribute()}}</option>
                                @foreach($article->getTypes() as $type)
                                    <option value="{{$article->type_id}}">{{$type}}</option>
                                @endforeach
                            </select>


                            @php
                                $categoryString = implode(', ', $article?->categories
                                    ->map( fn(\App\Models\Category $category) => $category->name )
                                    ->toArray() ?? [])
                            @endphp
                            <x-form.input name="categories"
                                          class="my-3"
                                          placeholder="Categories"
                                          :value="old('categories') ?? $categoryString ?? ''"
                                          :required="true">
                                Categories
                            </x-form.input>

                            <x-divider/>

                            @php
                                $userString = "";
                                $pivot = null;
                                foreach (($article?->users ?? []) as $user)
                                    $userString .= $user->email . '::' . $user->pivot->contribution_type . ', ';

                                $userString = trim($userString, ', ');
                            @endphp
                            <x-form.input name="authors"
                                          class="my-3"
                                          placeholder="Ex. user@test.com::Author"
                                          :value="old('authors') ?? $userString ?? ''"
                                          :required="true">
                                Authors
                            </x-form.input>



                            <x-divider/>

                            <x-form.input type="file"
                                          name="pdf"
                                          class="my-3"
                                          :value="old('pdf') ?? $article->pdf ?? ''"
                                          :required="$article===null">
                                Upload PDF file
                            </x-form.input>


                            <x-form.submit/>

                        </x-form>
                    </div>
                </div>
            </div>
            <div class="col-auto col-lg-3"></div>
        </div>
    </div>
@endsection
