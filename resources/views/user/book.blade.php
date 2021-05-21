@extends('layouts.user')

@section('content')
<h1>BOOK</h1>
@isset($book)
    @isset($stocked_book)
        <div>
            <h3>{{ $book->title }}</h3>
            <img src="{{url('/images/books/'.$book->image)}}" alt="" width="300" height="500">
            <p>{{ $book->description }}</p>
            <p>Available Date: {{ $stocked_book->available_date }}</p>
        </div>
        @if (session("success"))
        {{ session("success") }}
        @endif
        @if(!$saved_status)
            <form action="{{route("user_book_store")}}" method="post">
                @csrf
                <input type="hidden" name="stocked_book_id" value="{{ $stocked_book->id }}">
                <label for="button">Add to LibBasket: </label>
                <input type="submit" id="button" value="ADD">
            </form>
        @endif
    @endisset
@endisset
@endsection