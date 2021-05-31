@extends('layouts.librarian')

@section('content')
<x-librarian-nav-bar/>
<h1>LIBRARIAN</h1>
@isset($librarian)
    {{ $librarian->username }}
@endisset
@endsection