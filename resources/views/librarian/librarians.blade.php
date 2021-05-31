@extends('layouts.librarian')

@section('content')
<x-librarian-nav-bar/>
    <h1>LIBRARIANS</h1>
    <br>
    @if ($librarians->count())
        @foreach ($librarians as $librarian) 
        <a href="{{route("librarian_librarian",$librarian)}}"><h3>{{ $librarian->username }}</h3></a>
        @endforeach     
        {{ $librarians->links() }}
    @else
        <p>There are no librarians</p>
    @endif
@endsection