@extends('layouts.manager')

@section('content')
<x-manager-nav-bar/>
    <h1>CATEGORIES</h1>
    <br>
    @if ($categories->count())
        @foreach ($categories as $category) 
        <a href="{{route("manager_category",$category)}}"><h3>{{ $category->title }}</h3></a>
        @endforeach
        {{ $categories->links() }}
    @else 
        <p>There are no categories</p>
    @endif
@endsection