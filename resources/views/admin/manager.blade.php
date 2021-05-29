@extends('layouts.admin')

@section('content')
<h1>MANAGER</h1>
@isset($manager)
<form action="{{ route("admin_update_manager") }}" method="post">
        @csrf
        <input type="text" name="username" placeholder="username" value="{{ $manager->username }}">
        <input type="hidden" name="manager_id" value="{{ $manager->id }}">
        <br>
        @error('username')
                {{ $message }}
                <br>
        @enderror
        <input type="text" name="email" placeholder="email" value="{{ $manager->email }}">
        <br>
        @error('email')
                {{ $message }}
                <br>
        @enderror
        <input type="text" name="password" placeholder="password">
        <br>
        <input type="text" name="password_confirmation" placeholder="password_confirmation">
        <br>
        @error('password')
                {{ $message }}
                <br>
        @enderror
        <label for="update">Update: </label>
        <input type="submit" value="update" name="submit">
        <br>
        @if (session("success"))
            {{session("success")  }}
            <br>
        @endif
        <label for="delete">Delete: </label>
        <input type="submit" value="delete" name="submit">
        <br>

</form>
@endisset


@endsection