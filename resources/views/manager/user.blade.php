@extends("layouts.manager")

@section('content')
<x-manager-nav-bar/>
    <h1>USER</h1>
    <br>
    @isset($user)
        <p>{{ $user->username }}</p>
    @endisset
@endsection
 
 