@extends('layouts.user')

@section('content')
    <h1>SETTINGS</h1>
    <br>
    <a href="{{ route("user_updateUser") }}">update profile</a>
    <br>
    <a href="{{ route("user_updateCard") }}">update card</a>
@endsection