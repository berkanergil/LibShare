@extends('layouts.manager')

@section('content')
    <h1>Manager</h1>
    <br>
    @isset($manager)
        {{ $manager->username }}
    @endisset
@endsection