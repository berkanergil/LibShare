@extends('layouts.app')

@section('content')
    <h1>BOOKS</h1>
    <br>
    @if ($books->count())
        @foreach ($books as $book) 
        <a href="{{route("librarian_book",$book)}}"><h3>{{ $book->title }}</h3></a>
        @endforeach
        {{ $books->links() }}
    @else 
        <p>There are no books</p>
    @endif
@endsection