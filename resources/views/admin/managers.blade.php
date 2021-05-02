@extends('layouts.app')

@section('content')
    <h1>MANAGERS</h1>
    <br>
    @if ($managers->count())
        @foreach ($managers as $manager) 
        <a href="{{route("admin_manager",$manager)}}"><h3>{{ $manager->username }}</h3></a>
        @endforeach
        {{ $managers->links() }}
    @else
        <p>There are no managers</p>
    @endif
@endsection