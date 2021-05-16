@extends('layouts.user')

@section('content')
    <H1>WELCOME</H1>
    <br>
    <a href="{{ route("admin_login") }}">ADMIN LOGIN</a>
    <br>
    <a href="{{ route("manager_login") }}">MANAGER LOGIN</a>
    <br>
    <a href="{{ route("librarian_login") }}">LIBRARIAN LOGIN</a>
    <br>
    <a href="{{ route("user_login") }}">USER LOGIN</a>
    <br>
    <a href="{{ route("user_register") }}">USER REGISTER</a>
    <br>
@endsection

