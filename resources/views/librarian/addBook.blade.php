@extends('layouts.app')

@section('content')
    <h1>ADD BOOK</h1>
        <form action="{{ route("librarian_addBook") }}" method="POST">
            @csrf
            <input type="hidden" name="admin_id" value="1">
            <input type="text" name="username" placeholder="username">
            <br>
            <input type="text" name="email" placeholder="email">
            <br>
            <input type="text" name="password" placeholder="password">
            <br>
            <button type="submit" name="submit">Submit</button>
        </form>
@endsection