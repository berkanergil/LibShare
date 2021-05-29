@extends('layouts.librarian')

@section('content')
<h1>EBOOK</h1>
@isset($book)
    <div>
        <h3>{{ $book->title }}</h3>
        <img src="{{url('/images/ebooks/'.$book->image)}}" alt="" width="300" height="500">
        <p>{{ $book->description }}</p>
        <p>Open <a href="{{ url('/pdfs/ebooks/'.$book->file) }}">EBook</a>.</p>
    </div>
@endisset
@endsection