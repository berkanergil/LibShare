@extends('layouts.user')

@section('content')

<h1>RESERVE BOOK</h1>
    <div>
        <h3>{{ $book->title }}</h3>
        <img src="{{url('/images/books/'.$book->image)}}" alt="" width="300" height="500">
        <p>{{ $book->description }}</p>
        <p>Available Date: {{ $book->available_date }}</p>
    </div>
    <form action="{{route("user_reservebook_store")}}" method="post">
        @csrf
        <input type="hidden" name="stocked_book_id" value="{{ $book->stocked_book_id }}">
        <input type="hidden" name="saved_book_id" value="{{ $book->saved_book_id }}">
        <input type="hidden" name="start_date" value="{{ $book->available_date }}">
        <label for="date">Select end date:</label>
        <input id="date" type="date" name="end_date" min="{{ date('Y-m-d', strtotime($book->available_date . ' +1 day')) }}" value="{{ date('Y-m-d', strtotime($book->available_date . ' +1 day')) }}" >
        <br>
        <br>
        <label for="button">Reserve book: </label>
        <input type="submit" id="button">
    </form>
    
@endsection