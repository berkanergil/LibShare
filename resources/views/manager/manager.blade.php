@extends('layouts.manager')

@section('content')
<x-manager-nav-bar/>
    <h1>Manager</h1>
    <br>
    @isset($manager)
        {{ $manager->username }}
    @endisset
@endsection