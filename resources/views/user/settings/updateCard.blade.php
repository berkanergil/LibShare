@extends('layouts.user')

@section('content')
<x-user-nav-bar/>
    <h1>UPDATE CARD</h1>
        <form action="" method="POST">
                @csrf
                <input type="text" name="name" placeholder="name" value="{{ $card->name }}">
                <br>
                @error('name')
                        {{ $message }}
                        <br>
                @enderror
                <input type="number" name="number" placeholder="number" value="{{ $card->number }}">
                <br>
                @error('number')
                        {{ $message }}
                        <br>
                @enderror
                <input type="date" name="expired_date" placeholder="expired_date" value="{{ $card->expired_date }}">
                <br>
                @error('expired_date')
                        {{ $message }}
                        <br>
                @enderror
                <input type="number" name="cvc_number" placeholder="cvc_number" value="{{ $card->cvc_number }}">
                <br>
                @error('cvc_number')
                        {{ $message }}
                        <br>
                @enderror
                @if (session("success"))
                    {{ session("success") }}
                    <br>
                @endif
                <button type="submit" name="submit">Submit</button>
        </form>
@endsection