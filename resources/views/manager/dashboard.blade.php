@extends('layouts.manager')

@section('content')
<x-manager-nav-bar/>
    <h1>DASHBOARD</h1>
    <br>
    <a href="{{ route("manager_librarians") }}">show librarians</a>
    <br>
    <a href="{{ route("manager_users") }}">show users</a>
    <br>
    <a href="{{ route("manager_books") }}">show books</a>
    <br>
    <a href="{{ route("manager_ebooks") }}">show ebooks</a>
    <br>
    <a href="{{ route("manager_managers") }}">show managers</a>
    <br>
    <a href="{{ route("manager_addLibrarian") }}">add librarian</a>
    <br>
    <a href="{{ route("manager_categories") }}">show categories</a>
    <br>
    <a href="{{ route("manager_addCategory") }}">add category</a>
    <br>
    <a href="{{ route("manager_logout") }}">logout</a>
@endsection