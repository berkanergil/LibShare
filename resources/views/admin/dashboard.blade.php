@extends('layouts.admin')

@section('content')
    <x-admin-nav-bar/>
    <h1>DASHBOARD</h1>
    <br>
    <a href="{{ route("admin_managers") }}">show managers</a>
    <br>
    <a href="{{ route("admin_librarians") }}">show librarians</a>
    <br>
    <a href="{{ route("admin_users") }}">show users</a>
    <br>
    <a href="{{ route("admin_books") }}">show books</a>
    <br>
    <a href="{{ route("admin_ebooks") }}">show ebooks</a>
    <br>
    <a href="{{ route("admin_addManager") }}">add manager</a>
    <br>
    <a href="{{ route("admin_logout") }}">logout</a>
@endsection