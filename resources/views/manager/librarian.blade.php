@extends('layouts.manager')

@section('content')
<h1>LIBRARIAN</h1>
@isset($librarian)
<form action="{{ route("manager_update_librarian") }}" method="post">
        @csrf
        <input type="text" name="username" placeholder="username" value="{{ $librarian->username }}">
        <input type="hidden" name="librarian_id" value="{{ $librarian->id }}">
        <br>
        @error('username')
                {{ $message }}
                <br>
        @enderror
        <input type="text" name="email" placeholder="email" value="{{ $librarian->email }}">
        <br>
        @error('email')
                {{ $message }}
                <br>
        @enderror
        <input type="text" name="password" placeholder="password">
        <br>
        <input type="text" name="password_confirmation" placeholder="password_confirmation">
        <br>
        @error('password')
                {{ $message }}
                <br>
        @enderror
        <label for="update">Update: </label>
        <input type="submit" value="update" name="submit">
        <br>
        @if (session("success"))
            {{session("success")  }}
            <br>
        @endif
        <label for="delete">Delete: </label>
        <input type="submit" value="delete" name="submit">
        <br>

</form>
@endisset


@endsection