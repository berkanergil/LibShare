@extends('layouts.app')

@section('content')
    <H1>WELCOME</H1>
    <br>
    <a href="{{ route("admin_login") }}">ADMIN LOGIN</a>
    <br>
    <a href="{{ route("librarian_login") }}">LIBRARIAN LOGIN</a>
    <br>
@endsection

