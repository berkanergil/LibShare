@extends('layouts.admin')

@section('content')

{{-- <div class="container-fluid" style="min-height: 100vh">
  <div  class="d-flex align-items-center justify-content-center">
      <a class="actor-login mr-md-5" href="../Login_User/Login.html">Are You A Subscriber?</a>
      <a class="actor-login mr-md-5" href="../Login_Librarian/Login.html">Are You A Librarian?</a>
      <a class="actor-login mr-md-5" href="../Login_Manager/Login.html">Are You A Manager?</a>

  </div>
<div class="login-box" style="vertical-align: center !important;">
<h1 class="text-center">Libshare</h1>

<h2 style="opacity: 0.3 !important;">Login | Admin</h2>
<form>

  <div class="user-box">
    <input type="email" name="email" required="">
    <label>Email</label>
  </div>
  <div class="user-box">
    <input type="password" name="password" required="">
    <label>Password</label>
  </div>
  <div class="ks-cboxtags float-left">
      <input type="checkbox" id="rememberme" value="Order Two">
      <label for="rememberme">Remember Me</label>
  </div>
  <br><br>
  <div class="row mt-5 ">
    <div class="col-lg-4 col-md-4 col-sm-12 ">
  <a href="#">
    <span></span>
    <span></span>
    <span></span>
    <span></span> Submit
  </a>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
  <a href="/signup/signup.html" class="text-center ml-5">Sign up!</a>
    </div>
  </div>
</form>
</div>
</div> --}}


<div class="container-fluid" style="min-height: 100vh">
  <div  class="d-flex align-items-center justify-content-center">
    <a class="actor-login mr-md-5" href={{ route("user_login") }}>Are You A Subscriber?</a>
    <a class="actor-login mr-md-5" href={{ route("librarian_login") }}>Are You A Librarian?</a>
    <a class="actor-login mr-md-5" href={{ route("manager_login") }}>Are You A Manager?</a>

</div>
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