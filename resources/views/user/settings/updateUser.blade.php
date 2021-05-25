@extends('layouts.user')

@section('content')
    <h1>USER UPDATE</h1>
        @if (isset($user))
        <form action="{{ route("user_updateUser") }}" method="POST">
            @csrf
            <input type="text" name="username" placeholder="username" value="{{ $user->username }}">
            <br>
            @error('username')
                    {{ $message }}
                    <br>
            @enderror
            @if (session("error_username"))
            {{ session("error_username") }}
            <br>
            @endif
            <input type="text" name="email" placeholder="email" value="{{ $user->email }}">
            <br>
            @error('email')
                    {{ $message }}
                    <br>
            @enderror
            @if (session("error_email"))
                {{ session("error_email") }}
                <br>
            @endif
            <input type="text" name="password" placeholder="new password(optional)">
            <br>
            <input type="text" name="password_confirmation" placeholder="new password_confirmation">
            <br>
            @error('password')
                    {{ $message }}
                    <br>
            @enderror
            <input type="text" name="old_password" placeholder="old password(required)">
            <br>
            @error('old_password')
                    {{ $message }}
                    <br>
            @enderror
            <button type="submit" name="submit">Submit</button>
            @if (session("success"))
                {{ session("success") }}
            @endif
        </form>
        @endif
@endsection