@extends('layouts.app')

@push('pre-js')
    {{--    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>--}}
    {{--    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>--}}
@endpush

@push('css')
    {!! \App\Datatable\Datatable::css() !!}
@endpush

@section('content')
    <div class="container">
        <div class="wrapper">
            <x-table.datatable
                id="user_data"
                class="table-responsive"
                :for="$users"
                :as="['Name', 'Email', 'Created At']"
                :view="true"
                :delete="true"
                :edit="true"
            />
        </div>
    </div>
@endsection
