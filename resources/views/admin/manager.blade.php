@extends('layouts.admin')

@section('content')
<h1>MANAGER</h1>
@isset($manager)
    {{ $manager->username }}
@endisset
@endsection