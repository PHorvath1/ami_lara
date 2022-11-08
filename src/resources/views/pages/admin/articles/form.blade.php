@extends('layouts.admin')

@section('content')
    @php
        $article = $article ?? null; //If you do not set a variable it throws an error, so we set it to something easy to check
    @endphp
    <div class="container col-sm-12">
        <div class="wrapped row">
            <div class="card col-lg-10 offset-lg-1" id="form_body">
                <div class="card-header" id="form_header">
                    <h4>{{$article ? 'Edit' : 'Create'}} Article Form</h4>
                </div>
                <div class="card-body">
                    <x-form  :to="$article ? route('admin:articles.update', [$article]) : route('admin:articles.store')"
                            :method="$article ? 'put' : 'post'" :allowFile="true">
                        @if ($article != null)
                            <label class="mr-2" for="state">State</label>
                            <select id="state"
                                    name="state"
                                    class="my-6"
                                    required>
                                <option value="{{$article->state}}" selected hidden>{{$article->getStateTextAttribute()}}</option>
                                @foreach($article->getStates() as $state)
                                    <option value="{{$state}}">{{$state}}</option>
                                @endforeach

                            </select>

                            <x-admin.form.input name="source"
                                            class="my-6">
                                Source
                            </x-admin.form.input>

                            <x-admin.form.input name="page count"
                                            class="my-6">
                                Page count
                            </x-admin.form.input>

                            <x-admin.form.input type="file"
                                          name="latex"
                                          class="my-3"
                                          multiple
                                          :value="old('latex') ?? $article->latex ?? ''"
                                          :required="false">
                                Upload LaTeX files
                            </x-admin.form.input>

                            @if($article->editor_id === Auth::id())
                                <x-admin.form.input name="note"
                                              class="my-3"
                                              placeholder="Note"
                                              :value="old('note') ?? $article->note ?? ''"
                                              :required="false">
                                    Note
                                </x-admin.form.input>
                            @endif
                        @endif

                        <x-admin.form.input name="title"
                                      class="my-3"
                                      placeholder="Title of your article"
                                      :value="old('title') ?? $article->title ?? ''"
                                      :required="true">
                            Title
                        </x-admin.form.input>
                        <x-admin.form.input name="abstract"
                                      type="textarea"
                                      class="my-3"
                                      :value="old('abstract') ?? $article->abstract ?? ''"
                                      :required="true">
                            Abstract
                        </x-admin.form.input>

                        <x-divider/>

                        <label class="mt-2 mb-0" for="type_id">Type</label>
                        <select id="type_id"
                                name="type_id"
                                class="my-6 mx-2"
                                required>
                            <option value="{{$article !== null ? $article->type_id : 1}}" selected hidden>{{$article !== null ? $article->getTypeTextAttribute() : \App\Models\Type::first()->name}}</option>
                            @foreach(\App\Models\Type::all() as $type)
                                <option value="{{$type->id}}">{{$type->name}}</option>
                            @endforeach
                        </select>


                        @php
                            $categoryString = implode(', ', $article?->categories
                                ->map( fn(\App\Models\Category $category) => $category->name )
                                ->toArray() ?? [])
                        @endphp
                        <x-admin.form.input name="categories"
                                      class="my-3"
                                      placeholder="Categories"
                                      :value="old('categories') ?? $categoryString ?? ''"
                                      :required="true">
                            Categories
                        </x-admin.form.input>

                        <x-divider/>

                        @php
                            $author = $article?->user()->first()->name ?? \Illuminate\Support\Facades\Auth::user()->name;
                        @endphp
                        <x-admin.form.input name="user_name"
                                      class="my-3"
                                      :value="$author"
                                      :required="true"
                                      hidden="true">
                            Author
                        </x-admin.form.input>

                        <x-divider/>
                        <x-admin.form.input type="file"
                                      name="pdf"
                                      class="my-3"
                                      :value="$article->revisions->last()->pdf_path"
                                      :required>
                            Upload PDF file
                        </x-admin.form.input>

                        <x-form.submit/>

                    </x-form>
                </div>
            </div>
        </div>
        <div class="col-auto col-lg-3"></div>
    </div>
@endsection
