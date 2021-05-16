@extends('layouts.admin')

@section('content')

<div class="container-fluid" style="min-height: 100vh">
    <div class="login-box" style="vertical-align: center !important;">
      <h1 class="text-center">Libshare</h1>
    
      <h2 style="opacity: 0.3 !important;">Login | Admin</h2>
      <form action="{{ route("admin_login") }}" method="post">
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
          </div>

      </form>
      @if (session("status"))
      <h3 class="text-white" style="z-index: 100 !important">{{ session("status") }}
      </h3>
  @endif
    </div>
    </div>

@endsection