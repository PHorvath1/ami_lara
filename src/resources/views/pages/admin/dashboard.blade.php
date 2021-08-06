@extends('layouts.admin')

@section('content')
    <x-card header="Header">
        <div class="container-fluid">
            <div class="row">
                <x-admin.cards />
                <x-admin.cards />
                <x-admin.cards />
            </div>
        </div>
    </x-card>
    <div class="card">
        <div class="card-header ui-sortable-handle" style="cursor: move;">
            <h3 class="card-title">
                <i class="ion ion-clipboard mr-1"></i>
                Last 10 articles
            </h3>
        </div>
        <div class="card-body">
            <ul class="todo-list ui-sortable" data-widget="todo-list">
            <!--php /** @var \App\Models\Article $article */ endphp
                foreach($articles as $article)
                    <li>
                        <span class="text">{{--$article->name--}}</span>
                        <small class="badge badge-success"><i class="far fa-clock"></i>
                            {{--$article->created_at->diffForHumans()--}}
                            {{-- TODO: Fix carbon parse --}}
                        </small>
                    </li>
                endforeach-->
            </ul>
        </div>
    </div>
@endsection
