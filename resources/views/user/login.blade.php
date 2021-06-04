{{-- <div class="container-fluid" style="min-height: 100vh">
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
 --}}
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
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Linking Bootstrap -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <!--Linking to CSS Files-->
      <link href="{{ asset("css/login.css") }}" rel="stylesheet">
      <!--Linking to Font Awesome-->
      <script crossorigin="anonymous" src="https://kit.fontawesome.com/3a82b90854.js"></script>
    
      <title>Libshare | Login</title>
    
    <body>
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
    
    
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </html>