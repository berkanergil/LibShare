@extends('layouts.manager')

@section('content')
    <h1>MANAGERS</h1>
    <br>
    @if ($managers->count())
        @foreach ($managers as $manager) 
        <a href="{{route("manager_manager",$manager)}}"><h3>{{ $manager->username }}</h3></a>
        @endforeach
        {{ $managers->links() }}
    @else
        <p>There are no managers</p>
    @endif
@endsection