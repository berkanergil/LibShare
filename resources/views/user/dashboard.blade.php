@extends('layouts.user')

@section('content')
<x-user-nav-bar/>
    <h1>DASHBOARD</h1>
    <br>
    <a href="{{ route("user_books") }}">books</a>
    <br>
    <a href="{{ route("user_ebooks") }}">ebooks</a>
    <br>
    <a href="{{ route("user_libbasket") }}">libBasket</a>
    <br>
    <a href="{{ route("user_reservedbooks") }}">reservedBooks</a>
    <br>
    <a href="{{ route("user_addEBookRequest") }}">addEBookDonation</a>
    <br>
    <a href="{{ route("user_settings") }}">settings</a>
    <br>
    <a href="{{ route("user_logout") }}">logout</a>
@endsection