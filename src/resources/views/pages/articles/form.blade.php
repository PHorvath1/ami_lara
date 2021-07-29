@extends('layouts.app')

@section('content')
    @php
        $article = $article ?? null; //If you do not set a variable it throws an error, so we set it to something easy to check
    @endphp
    <div class="container">
        <div class="wrapped row">
            <div class="col-auto col-lg-3"></div>
            <div class="col 12 col-lg-6">
                <div class="card" id="article_card">
                    <div class="card-header" id="article_card_header">
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
                            @endif

                            <x-form.input name="name"
                                          class="my-3"
                                          placeholder="Name of your article"
                                          :value="old('name') ?? $article->name ?? ''"
                                          :required="true">
                                Name
                            </x-form.input>
                            <x-form.input name="summary"
                                          type="textarea"
                                          class="my-3"
                                          placeholder="A short description of your article"
                                          :value="old('summary') ?? $article->summary ?? ''"
                                          :required="true">
                                Summary
                            </x-form.input>

                            <x-divider/>

                            <x-form.input name="article_type"
                                          class="my-3"
                                          placeholder="Type of the article"
                                          :value="old('article_type') ?? $article->article_type ?? ''"
                                          :required="true">
                                Type
                            </x-form.input>

                            <x-form.input name="note"
                                          class="my-3"
                                          placeholder="Note"
                                          :value="old('note') ?? $article->note ?? ''"
                                          :required="false">
                                Note
                            </x-form.input>

                            <x-divider/>

                            <x-form.input name="page_count"
                                          class="my-3"
                                          placeholder="Number of pages"
                                          :value="old('page_count') ?? $article->page_count ?? ''"
                                          :required="true">
                                Page count
                            </x-form.input>

                            <x-form.input name="language"
                                          class="my-3"
                                          placeholder="Language"
                                          :value="old('language') ?? $article->language ?? ''"
                                          :required="true">
                                Language
                            </x-form.input>

                            <x-divider/>

                                @php
                                    $categoryString = implode(', ', $article
                                        ->categories
                                        ->map( fn(\App\Models\Category $category) => $category->name )
                                        ->toArray())
                                @endphp
                            <x-form.input name="categories"
                                          class="my-3"
                                          placeholder="Categories"
                                          :value="old('categories') ?? $categoryString ?? ''"
                                          :required="true">
                                Categories
                            </x-form.input>

                                @php
                                    $userString = "";
                                    $pivot = null;
                                    foreach ($article->users as $user)
                                        $userString .= $user->email . '::' . $user->pivot->contribution_type . ', ';

                                    $userString = trim($userString, ', ');
                                @endphp
                            <x-form.input name="authors"
                                          class="my-3"
                                          placeholder="Ex. user@test.com::Author"
                                          :value="old('authors') ?? $userString ?? ''"
                                          :required="true">
                                Contributors
                            </x-form.input>

                                @php
                                    $tagString = implode(', ', $article
                                        ->tags
                                        ->map( fn(\App\Models\Tag $tag) => $tag->name )
                                        ->toArray())
                                @endphp
                            <x-form.input name="tags"
                                          class="my-3"
                                          placeholder="Ex. IoT"
                                          :value="old('tags') ?? $tagString ?? ''"
                                          :required="false">
                                Tags
                            </x-form.input>

                            <x-divider/>

                            <x-form.input type="file"
                                          name="pdf"
                                          class="my-3"
                                          :value="old('pdf') ?? $article->pdf ?? ''"
                                          :required="$article===null">
                                Upload PDF file
                            </x-form.input>

                            <x-form.input type="file"
                                          name="latex"
                                          class="my-3"
                                          multiple
                                          :value="old('latex') ?? $article->latex ?? ''"
                                          :required="false">
                                Upload LaTeX files
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
