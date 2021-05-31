@extends('layouts.admin')

@section('content')
<x-admin-nav-bar/>
<h1>LIBRARIAN</h1>
@isset($librarian)
    {{ $librarian->username }}
@endisset
@endsection