@extends('layouts.manager')

@section('content')
<x-manager-nav-bar/>
<h1>BOOK</h1>
@isset($book)
    <div>
        <h3>{{ $book->title }}</h3>
        <img src="{{url('/images/books/'.$book->image)}}" alt="" width="300" height="500">
        <p>{{ $book->description }}</p>
    </div>
@endisset
@endsection