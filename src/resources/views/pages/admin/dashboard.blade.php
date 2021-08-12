@extends('layouts.admin')

@section('content')
    <x-card header="Header">
        <div class="container-fluid">
            <div class="row">
                <x-admin.cards />
            </div>
        </div>
    </x-card>
    <div class="card">
        <div class="card-header ui-sortable-handle">
            <h3 class="card-title">
                Last 10 articles
            </h3>
        </div>
       <div class="card-body">
            <ul class="todo-list ui-sortable" data-widget="todo-list">
            @php /** @var \App\Models\Article $article */ @endphp
                @foreach($articles as $article)
                    <li>
                        <a href="{{ route('articles.show', $article) }}" class="text">{{$article->title }}</a>
                        <small class="badge badge-warning"><i class="far fa-clock"></i>
                            {{ $article->created_at->diffForHumans() }}
                        </small>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <script type="text/javascript">

    </script>
@endsection
