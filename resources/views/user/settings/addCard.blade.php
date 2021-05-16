@extends('layouts.user')

@section('content')
    <h1>ADD CARD</h1>
        <form action="{{ route("user_addCard") }}" method="POST">
                @csrf
                <input type="text" name="name" placeholder="name" value="{{ old("name") }}">
                <br>
                @error('title')
                        {{ $message }}
                        <br>
                @enderror
                <input type="number" name="number" placeholder="number" value="{{ old("number") }}">
                <br>
                @error('number')
                        {{ $message }}
                        <br>
                @enderror
                @if (session("error_number"))
                    {{ session("error_number") }}
                @endif
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
        </form>
@endsection