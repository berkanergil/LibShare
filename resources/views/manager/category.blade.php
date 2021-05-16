@extends('layouts.manager')

@section('content')
<h1>CATEGORY</h1>
@isset($category)
    {{ $category->title }}
@endisset
@endsection