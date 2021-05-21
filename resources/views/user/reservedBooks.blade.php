@extends('layouts.user')

@section('content')
    <h1>RESERVED BOOKS</h1>
    <br>
    @if ($books->count())
        @foreach ($books as $book) 
            <div>
                <h3>{{ $book->title }}</h3>
                <img src="{{url('/images/books/'.$book->image)}}" alt="" width="300" height="500">
                <p>Start Date: {{ $book->start_date }} and End Date {{ $book->end_date }}</p>
            </div>
        @endforeach
        {{ $books->links() }}
    @else 
        <p>There are no books</p>
    @endif
@endsection