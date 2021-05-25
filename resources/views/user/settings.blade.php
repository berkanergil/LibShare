@extends('layouts.user')

@section('content')
    <h1>SETTINGS</h1>
    <br>
    @if (isset($card))
        <a href="{{ route("user_addCard") }}">add card</a>
        <br>
    @else
        <a href="{{ route("user_addCard") }}">add card</a>
        <br>
    @endif
    
    <a href="{{ route("user_updateUser") }}">update profile</a>
@endsection