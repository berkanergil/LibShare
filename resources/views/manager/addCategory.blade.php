@extends('layouts.manager')

@section('content')
<x-manager-nav-bar/>
    <h1>ADD CATEGORY</h1>
        <form action="{{ route("manager_addCategory") }}" method="POST">
                @csrf
                <input type="text" name="title" placeholder="title" value="{{ old("title") }}">
                <br>
                @error('title')
                        {{ $message }}
                        <br>
                @enderror
                @if (session("error_title"))
                    {{ session("error_title") }}
                    <br>
                @endif
                <button type="submit" name="submit">Submit</button>
        </form>
@endsection