@extends('layouts.manager')

@section('content')
<x-manager-nav-bar/>
<h1>CATEGORY</h1>
@isset($category)
    <form action="{{ route("manager_update_category") }}" method="post">
        @csrf
        <input type="text" name="title" value="{{ $category->title }}">
        <br>
        @error('title')
            {{ $message }}
            <br>
        @enderror
        <input type="hidden" name="category_id" value="{{ $category->id }}">
        <label for="delete">Delete: </label>
        <input type="submit" id="delete" name="submit" value="delete">
        <br>
        <label for="update">Update: </label>
        <input type="submit" name="submit" value="update">
    </form>
@endisset
@endsection