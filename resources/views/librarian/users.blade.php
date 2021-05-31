@extends("layouts.librarian")

@section('content')
<x-librarian-nav-bar/>
    <h1>USERS</h1>
    <br>
    @if ($users->count())
        @foreach ($users as $user)
            <a href="{{ route("librarian_user",$user) }}">{{ $user->username }}</a>
            <br>
        @endforeach
    @endif
@endsection