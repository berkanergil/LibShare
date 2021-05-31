@extends('layouts.user')

@section('content')
<x-user-nav-bar/>
    <h1>EBOOKS</h1>
    <br>
    @if ($books->count())
        @foreach ($books as $book) 
        <a href="{{route("user_ebook",$book)}}">
            <div>
                <h3>{{ $book->title }}</h3>
                <img src="{{url('/images/ebooks/'.$book->image)}}" alt="" width="300" height="500">
            </div>
        </a>
        @endforeach
        {{ $books->links() }}
    @else 
        <p>There are no books</p>
    @endif
@endsection