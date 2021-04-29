@extends('layouts.app')

@section('content')
    <h1>ADD LIBRARIAN</h1>
        <form action="{{ route("admin_addLibrarian") }}" method="POST">
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