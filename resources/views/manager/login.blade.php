@extends('layouts.manager')

@section('content')
<h1>MANAGER LOGIN</h1>
<br>
    <form action="{{ route("manager_login") }}" method="post">
        @csrf
        <input type="text" placeholder="username" name="username">
        <br>
        <input type="password" placeholder="password" name="password">
        <br>
        <label for="rememberMe">Remember me:</label>
        <input type="checkbox" name="rememberMe" id="rememberMe">
        <br>
        <input type="submit">
    </form>
    @if (session("status"))
        <h3>{{ session("status") }}</h3>
    @endif
@endsection