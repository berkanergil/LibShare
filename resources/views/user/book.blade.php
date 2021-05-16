@extends('layouts.app')

@section('content')
<h1>BOOK</h1>
@isset($book)
    <div>
        <h3>{{ $book->title }}</h3>
        <img src="{{url('/images/'.$book->image)}}" alt="" width="300" height="500">
        <p>{{ $book->description }}</p>
    </div>
    
    <form action="{{ route("user_store") }}" method="post">
        <label for="button">Add to LibBasket: </label>
        <input type="button" id="button" value="">
    </form>
@endisset
@endsection