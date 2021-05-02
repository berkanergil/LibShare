@extends('layouts.app')

@section('content')
    <h1>DASHBOARD</h1>
    <br>
    <a href="{{ route("manager_librarians") }}">show librarians</a>
    <br>
    <a href="{{ route("manager_addLibrarian") }}">add librarian</a>
    <br>
    <a href="{{ route("manager_logout") }}">logout</a>
@endsection