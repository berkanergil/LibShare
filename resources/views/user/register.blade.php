@extends('layouts.user')

@section('content')
    <h1>USER REGISTER</h1>
        <form action="{{ route("user_register") }}" method="POST">
            @csrf
            <input type="text" name="username" placeholder="username" value="{{ old("username") }}">
            <br>
            @error('username')
                    {{ $message }}
                    <br>
            @enderror
            <input type="text" name="email" placeholder="email" value="{{ old("email") }}">
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
            <br>
            <br>
            <input type="text" name="name" placeholder="name" value="{{ old("name")  }}">
                <br>
                @error('name')
                        {{ $message }}
                        <br>
                @enderror
                <input type="number" name="number" placeholder="number" value="{{ old("number") }}">
                <br>
                @error('number')
                        {{ $message }}
                        <br>
                @enderror
                <input type="date" name="expired_date" placeholder="expired_date" value="{{ old("expired_date") }}">
                <br>
                @error('expired_date')
                        {{ $message }}
                        <br>
                @enderror
                <input type="number" name="cvc_number" placeholder="cvc_number" value="{{ old("cvc_number") }}">
                <br>
                @error('cvc_number')
                        {{ $message }}
                        <br>
                @enderror
                <button type="submit" name="submit">Submit</button>
            <button type="submit" name="submit">Submit</button>
        </form>
@endsection