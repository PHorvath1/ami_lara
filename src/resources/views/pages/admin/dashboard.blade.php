@extends('layouts.admin')

@section('content')
    <x-card header="Header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6 col-sm">
                    <div class="card" >
                        <div class="card-header">
                            <h3 class="card-title">Users Registered</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    <div class="card-body">
                        <a href="#">
                            X Users registered
                        </a>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        Footer
                    </div>
                    <!-- /.card-footer-->
                </div>
                </div>
                <div class="col-6 col-sm">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Latest articles</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                <div class="card-body">
                    <a href="#">
                        View latest articles
                    </a>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Footer
                </div>
                <!-- /.card-footer-->
                </div>
                </div>
                <div class="col-6 col-sm">
                    <div class="card" >
                        <div class="card-header">
                            <h3 class="card-title">Article count</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    <div class="card-body">
                        <a href="#">
                        Start creating your amazing application!
                        </a>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        Footer
                    </div>
                    <!-- /.card-footer-->
                </div>
                </div>
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
