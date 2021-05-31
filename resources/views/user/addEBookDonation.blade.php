@extends('layouts.user')

@section('content')
<x-user-nav-bar/>
    <h1>ADD EBOOK DONATION</h1>
        <form action="{{ route("user_addEBookRequest") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="categories">category: </label>
            <select class="form-control" name="category_id" id="categories">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"> 
                        {{ $category->title }} 
                    </option>
                @endforeach    
            </select>
            <br>
            @error('title')
                    {{ $message }}
                    <br>
            @enderror
            @if (session("error_title"))
                {{ session("errror_title") }}    
                <br>
            @endif
            <input type="text" name="title" placeholder="title" value="{{ old("title") }}">
            <br>
            @error('title')
                    {{ $message }}
                    <br>
            @enderror
            <input type="text" name="author" placeholder="author" value="{{ old("author") }}">
            <br>
            @error('author')
                    {{ $message }}
                    <br>
            @enderror
            <label for="publish_date">publish date:</label>
            <input type="date" name="publish_date" id="publish_date" value="{{ old("publish_date") }}">
            <br>
            @error('publish_date')
                    {{ $message }}
                    <br>
            @enderror
            <input type="text" name="description" placeholder="description" value="{{ old("description") }}">
            <br>
            @error('description')
                    {{ $message }}
                    <br>
            @enderror
            <label for="language">language:</label>
            <select class="form-control" name="language" id="language" value="{{ old("language") }}">
                    <option value="en"> 
                        english
                    </option>
                    <option value="tr"> 
                        turkish
                    </option>
            </select>
            <br>
            @error('language')
                    {{ $message }}
                    <br>
            @enderror
            <label for="image">image: </label>
            <input type="file" name="image" id="image" placeholder="image" value="{{ old("image") }}">
            <br>
            @error('image')
                    {{ $message }}
                    <br>
            @enderror
            <label for="file">pdf: </label>
            <input type="file" name="file" id="file" placeholder="file" value="{{ old("file") }}">
            <br>
            @error('file')
                    {{ $message }}
                    <br>
            @enderror
            <button type="submit" name="submit">Submit</button>
        </form>

        @if (session("success"))
                {{ session("success") }}    
                <br>
            @endif
        
@endsection