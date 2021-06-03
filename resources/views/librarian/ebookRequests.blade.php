@extends('layouts.librarian')

@section('body_css')
style="background: linear-gradient(90deg, #6441a5 0%,#2a0845 100% ) !important;min-height: 100vh;overflow-y: hidden"
@endsection
@section('content')
<x-librarian-nav-bar/>

    <h1>EBOOK REQUESTS</h1>
    <br>
    @if ($books->count())
        @foreach ($books as $book) 
        <a href="{{route("librarian_ebookRequest",$book)}}">
            <div>
                <h3>{{ $book->title }}</h3>
                <img src="{{url('/images/ebook_requests/'.$book->image)}}" alt="" width="300" height="500">
            </div>
        </a>
        @endforeach
        {{ $books->links() }}
    @else 
        <p>There are no books</p>
    @endif
@endsection