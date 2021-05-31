@extends('layouts.librarian')

@section('content')
<x-librarian-nav-bar/>
<h1>EBOOK REQUEST</h1>
@isset($book)
    <div>
        <h3>{{ $book->title }}</h3>
        <img src="{{url('/images/ebook_requests/'.$book->image)}}" alt="" width="300" height="500">
        <p>{{ $book->description }}</p>
        <p>Open <a href="{{ url('/pdfs/ebook_requests/'.$book->file) }}">EBook</a>.</p>
        <a href="{{ route("librarian_ebookRequestStore",$book) }}">Store</a>
        <a href="{{ route("librarian_ebookRequestRemove",$book) }}">Remove</a>
    </div>
@endisset
@endsection