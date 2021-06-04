<div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark "
         style="background: #1E3E5B !important ; backdrop-filter: blur(1px); font-weight: 600;">
      <a class="navbar-brand ml-3" href="#" >Libshare</a>
      <button aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler "
              data-target="#navbarNav" data-toggle="collapse" style="border: none; outline: none;" type="button">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse  " id="navbarNav">
        <ul class="navbar-nav ml-auto text-center text-uppercase">
            <li class="nav-item active expand mr-5">
                <a style="font-size: 15px" class="middle nav-link"
                href={{ route("user_home") }}>Home
                    <span class="sr-only">(current)</span></a>
            </li>
            <li  class="nav-item mr-5">
                <a style="color: #FFFFFF;font-size: 15px;" class="middle nav-link" href="{{ route("user_about") }}" >About</a>
            </li>
            <li  class="nav-item mr-5">
                <a style="color: #FFFFFF;font-size: 15px;" class="middle nav-link" href="{{ route("user_categories") }}" >Categories</a>
            </li>
            <li class="nav-item mr-5">
                <a style="color: #FFFFFF;font-size: 15px;" class="middle nav-link" href="{{ route("user_libbasket") }}" >Lib-Basket</a>
            </li>
            <li class="nav-item mr-5">
                <a style="color: #FFFFFF;font-size: 15px;" class="middle nav-link" href="{{ route("user_addEBookRequest") }}" >Donate</a>
            </li>
            <li class="nav-item mr-5">
                <a style="color: #FFFFFF;font-size: 15px;" class="middle nav-link" href="{{ route("user_contact") }}" >Contact</a>
            </li>
            <li class="nav-item dropdown" style="z-index: 100 !important;">
                <a style="color: #FFFFFF;font-size: 15px;" class="nav-link dropdown-toggle middle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} {{ Auth::user()->surname }}</a>
                <span class="dropdown-menu" style="background-color: #1E3E5B">
      <a style="color: #FFFFFF !important;font-size: 10px;" class="dropdown-item " href="{{ route("user_updateUser") }}">My Account</a>
      <div class="dropdown-divider"></div>
      <a style="color: #FFFFFF;font-size: 10px;" class="dropdown-item " href="{{ route("user_logout") }}">Logout</a>
    </span>
            </li>
        </ul>
      </div>
    </nav>
    {{-- <nav class="fixed-top navbar navbar-expand-lg navbar-dark bg-dark"
    style="background: transparent !important; backdrop-filter: blur(15px);font-weight:  600;">
   <a class="navbar-brand ml-3" href="{{ route("user_home") }}" >Libshare</a>
   <button aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler "
           data-target="#navbarNav" data-toggle="collapse" style="border: none; outline: none;" type="button">
       <span class="navbar-toggler-icon"></span>
   </button>
   <div class="collapse navbar-collapse  " id="navbarNav">
       <ul class="navbar-nav ml-auto text-center text-uppercase">
           <li class="nav-item active expand mr-5">
               <a style="font-size: 15px" class="middle nav-link"
               href={{ route("user_home") }}>Home
                   <span class="sr-only">(current)</span></a>
           </li>
           <li  class="nav-item mr-5">
               <a style="color: #FFFFFF;font-size: 15px;" class="middle nav-link" href="{{ route("user_about") }}" >About</a>
           </li>
           <li  class="nav-item mr-5">
               <a style="color: #FFFFFF;font-size: 15px;" class="middle nav-link" href="{{ route("user_categories") }}" >Categories</a>
           </li>
           <li class="nav-item mr-5">
               <a style="color: #FFFFFF;font-size: 15px;" class="middle nav-link" href="{{ route("user_libbasket") }}" >Lib-Basket</a>
           </li>
           <li class="nav-item mr-5">
               <a style="color: #FFFFFF;font-size: 15px;" class="middle nav-link" href="{{ route("user_addEBookRequest") }}" >Donate</a>
           </li>
           <li class="nav-item mr-5">
               <a style="color: #FFFFFF;font-size: 15px;" class="middle nav-link" href="{{ route("user_contact") }}" >Contact</a>
           </li>
           <li class="nav-item mr-5">
               <a style="color: #FFFFFF;font-size: 15px;" class="middle nav-link" href="{{ route("user_updateUser") }}" >Profile</a>
           </li>
           <li class="nav-item dropdown" style="z-index: 100 !important;">
               <a style="color: #FFFFFF;font-size: 15px;" class="nav-link dropdown-toggle middle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Name Surname</a>
               <span class="dropdown-menu" style="background-color: #1E3E5B">
     <a style="color: #FFFFFF !important;font-size: 10px;" class="dropdown-item " href="../Profile/Profile.html">My Account</a>
     <div class="dropdown-divider"></div>
     <a style="color: #FFFFFF;font-size: 10px;" class="dropdown-item " href="../../Login-Signup/Login_User/Login.html">Logout</a>
   </span>
           </li>
       </ul>
   </div>
</nav> --}}



    {{-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark "
    style="background: #101F2E !important ; backdrop-filter: blur(1px); font-weight: 600;">
<a class="navbar-brand ml-3" href="#" >Libshare | User</a>
<button aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler "
        data-target="#navbarNav" data-toggle="collapse" style="border: none; outline: none;" type="button">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse  " id="navbarNav">
    <ul class="navbar-nav ml-auto text-center text-uppercase">
        <li class="nav-item active expand mr-5">
            <a style="font-size: 15px" class="middle nav-link"
                href="{{ route("user_books") }}">Books
                <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item  dropdown" style="z-index: 100 !important;">
            <a style="color: #FFFFFF;font-size: 15px;" class="nav-link dropdown-toggle middle"
                data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                aria-expanded="false">{{ Auth::user()->username }}</a>
            <span class="dropdown-menu" style="background-color: #18263A">
                <a style="color: #FFFFFF !important;font-size: 10px;" class="dropdown-item "
                    href="{{ route("user_updateUser") }}">My Account</a>
                <div class="dropdown-divider"></div>
                <a style="color: #FFFFFF !important;font-size: 10px;" class="dropdown-item "
                    href="{{ route("user_updateCard") }}">My Card</a>
                <div class="dropdown-divider"></div>
                <a style="color: #FFFFFF;font-size: 10px;" class="dropdown-item "
                    href="{{ route("user_logout") }}">Logout</a>
            </span>
        </li>

    </ul>
</div>
</nav> --}}
</div>