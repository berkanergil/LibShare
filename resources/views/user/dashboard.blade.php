@extends('layouts.app')

@section('content')
    <h1>DASHBOARD</h1>
    <br>
    <a href="{{ route("user_books") }}">books</a>
    <br>
    <a href="{{ route("user_settings") }}">settings</a>
    <br>
    <a href="{{ route("user_logout") }}">logout</a>
@endsection