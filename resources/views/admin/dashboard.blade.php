@extends('layouts.admin')

@section('content')
    <h1>DASHBOARD</h1>
    <br>
    <a href="{{ route("admin_managers") }}">show managers</a>
    <br>
    <a href="{{ route("admin_addManager") }}">add manager</a>
    <br>
    <a href="{{ route("admin_logout") }}">logout</a>
@endsection