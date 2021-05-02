@extends('layouts.app')

@section('content')
    <h1>ADD MANAGER</h1>
        <form action="{{ route("admin_addManager") }}" method="POST">
            @csrf
            <input type="text" name="username" placeholder="username" value="{{ old("username") }}">
            <br>
            @error('username')
                    {{ $message }}
                    <br>
            @enderror
            @if (session()->has("error_username"))
                {{ session()->get("error_username") }}
                <br>
            @endif
            <input type="text" name="email" placeholder="email" value="{{ old("email") }}">
            <br>
            @error('email')
                    {{ $message }}
                    <br>
            @enderror
            @if (session()->has("error_email"))
                {{ session()->get("error_email") }}
                <br>
            @endif
            <input type="text" name="password" placeholder="password">
            <br>
            <input type="text" name="password_confirmation" placeholder="password_confirmation">
            <br>
            @error('password')
                    {{ $message }}
                    <br>
            @enderror
            <button type="submit" name="submit">Submit</button>
        </form>
@endsection