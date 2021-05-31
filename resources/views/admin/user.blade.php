@extends("layouts.admin")

@section('content')
<x-admin-nav-bar/>
    <h1>USER</h1>
    <br>
    @isset($user)
        <p>{{ $user->username }}</p>
    @endisset
@endsection
 
 
