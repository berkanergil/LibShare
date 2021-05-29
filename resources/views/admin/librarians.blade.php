@extends('layouts.admin')

@section('content')
    <h1>LIBRARIANS</h1>
    <br>
    @if ($librarians->count())
        @foreach ($librarians as $librarian) 
        <a href="{{route("admin_librarian",$librarian)}}"><h3>{{ $librarian->username }}</h3></a>
        @endforeach     
        {{ $librarians->links() }}
    @else
        <p>There are no librarians</p>
    @endif
@endsection