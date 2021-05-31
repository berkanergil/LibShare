@extends("layouts.manager")

@section('content')
<x-manager-nav-bar/>
    <h1>USERS</h1>
    <br>
    @if ($users->count())
        @foreach ($users as $user)
            <a href="{{ route("manager_user",$user) }}">{{ $user->username }}</a>
            <br>
        @endforeach
    @endif
@endsection