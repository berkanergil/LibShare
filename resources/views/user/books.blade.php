@extends('layouts.user')

@section('css')
<link href="{{ asset("css/global.css") }}" rel="stylesheet">
<link href="{{ asset("css/user/Home.css") }}" rel="stylesheet">
@endsection

@section('body_css')
style="background: var(--background-color-primary) !important;"
@endsection

@section('content')
<x-user-nav-bar/>

    <h1>BOOKS</h1>
    <br>
    @if ($books->count())
        @foreach ($books as $book) 
        <a href="{{route("user_book",$book)}}">
            <div>
                <h3>{{ $book->title }}</h3>
                <img src="{{url('/images/books/'.$book->image)}}" alt="" width="300" height="500">
            </div>
        </a>
        @endforeach
        {{ $books->links() }}
    @else 
        <p>There are no books</p>
    @endif
@endsection