@extends('layouts.app')

@section('content')
<h1>LIBRARIAN</h1>
@isset($librarian)
    {{ $librarian->username }}
@endisset
@endsection