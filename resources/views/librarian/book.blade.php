@extends('layouts.app')

@section('content')
<h1>BOOK</h1>
@isset($book)
    {{ $book->title }}
@endisset
@endsection