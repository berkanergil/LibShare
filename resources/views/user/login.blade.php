@extends('layouts.user')

@section('css')
    <link rel="stylesheet" href="{{ asset("css/login.css") }}">
@endsection

@section('content')
<div class="container-fluid" style="min-height: 100vh">
    <div  class="d-flex align-items-center justify-content-center">
      <a class="actor-login mr-md-5" href={{ route("admin_login") }}>Are You A Admin?</a>
      <a class="actor-login mr-md-5" href={{ route("librarian_login") }}>Are You A Librarian?</a>
      <a class="actor-login mr-md-5" href={{ route("manager_login") }}>Are You A Manager?</a>
  
  </div>
      <div class="login-box" style="vertical-align: center !important;">
        <h1 class="text-center">Libshare</h1>
        <h2 style="opacity: 0.3 !important;">Login | User</h2>
        <form action="{{ route("user_login") }}" method="post">
          @csrf
          <div class="user-box">
            <input type="text" name="username" required="">
            <label>Username</label>
          </div>
          <div class="user-box">
            <input type="password" name="password" required="">
            <label>Password</label>
          </div>
          <div class="ks-cboxtags float-left">
              <input type="checkbox" id="rememberme" name="rememberMe" value="Order Two">
              <label for="rememberme">Remember Me</label>
          </div>
            <div style="margin-bottom:15px !important">
          <a href="#">
            <span></span>
            <span></span>
            <span></span>
            <span></span> <input style="display:none !important" type="submit" id="submit"> <label for="submit">Submit</label>
          </a>
          <br>
          <a href="{{ route("user_register") }}">SIGN UP</a>
            </div>
        </form>
        @if (session("status"))
        <h3 class="text-white" style="z-index: 100 !important">{{ session("status") }}
        </h3>
        @endif
      </div>
      </div>

{{-- <h1>USER LOGIN</h1>
<br>
    <form action="{{ route("user_login") }}" method="post">
        @csrf
        <input type="text" placeholder="username" name="username">
        <br>
        <input type="password" placeholder="password" name="password">
        <br>
        <label for="rememberMe">Remember me:</label>
        <input type="checkbox" name="rememberMe" id="rememberMe">
        <br>
        <input type="submit">
    </form>
    @if (session("status"))
        <h3>{{ session("status") }}</h3>
    @endif --}}
@endsection