@extends('layouts.app')

@section('content')
    @auth
        Logged in
    @else
        Not logged in
    @endauth
@endsection
