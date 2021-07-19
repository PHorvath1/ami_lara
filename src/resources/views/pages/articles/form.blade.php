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
                                :method="$article ? 'put' : 'post'">
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

                            <x-form.input type="file"
                                          name="pdf_file"
                                          class="my-3"
                                          placeholder="Select a file to upload..."
                                          accept=".pdf"
                                          :value="old('note') ?? $article->note ?? ''"
                                          :required="true">
                                Upload PDF file
                            </x-form.input>

                            <x-form.input type="file"
                                          name="latex_file"
                                          class="my-3"
                                          placeholder="Select a file to upload..."
                                          multiple
                                          :value="old('note') ?? $article->note ?? ''"
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
