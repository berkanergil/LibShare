@extends('layouts.app')

@section('content')
    <h1>DASHBOARD</h1>
    <br>
    <a href="{{ route("admin_librarians") }}">show librarians</a>
    <br>
    <a href="{{ route("admin_addLibrarian") }}">add librarian</a>
@endsection