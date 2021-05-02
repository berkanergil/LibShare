@extends('layouts.app')

@section('content')
    <h1>DASHBOARD</h1>
    <br>
    <a href="{{ route("librarian_addBook") }}">add book</a>
    <br>
    <a href="{{ route("librarian_books") }}">show books</a>
    <br>
    <a href="{{ route("librarian_logout") }}">logout</a>
@endsection