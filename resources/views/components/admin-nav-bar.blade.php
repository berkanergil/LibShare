<div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark "
    style="background: #101F2E !important ; backdrop-filter: blur(1px); font-weight: 600;">
   <a class="navbar-brand ml-3" href="#" >Libshare | Administration</a>
   <button aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler "
           data-target="#navbarNav" data-toggle="collapse" style="border: none; outline: none;" type="button">
       <span class="navbar-toggler-icon"></span>
   </button>
   <div class="collapse navbar-collapse  " id="navbarNav">
       <ul class="navbar-nav ml-auto text-center text-uppercase">
           <li class="nav-item active expand mr-5">
               <a style="font-size: 15px" class="middle nav-link"
                  href="{{ route("admin_books") }}">Books
                   <span class="sr-only">(current)</span></a>
           </li>
           <li  class="nav-item mr-5">
               <a style="color: #FFFFFF;font-size: 15px;" class="middle nav-link" href="{{ route("admin_addManager") }}" >Manager Deployment</a>
           </li>
           <li  class="nav-item mr-5">
               <a style="color: #FFFFFF;font-size: 15px;" class="middle nav-link" href="{{ route("admin_users") }}" >Users</a>
           </li>
           <li class="nav-item  dropdown" style="z-index: 100 !important;">
               <a style="color: #FFFFFF;font-size: 15px;" class="nav-link dropdown-toggle middle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::guard('admin')->user()->username }}</a>
               <span class="dropdown-menu" style="background-color: #18263A">
                   <a style="color: #FFFFFF !important;font-size: 10px;" class="dropdown-item " href="{{ route("admin_updateAdmin") }}">My Account</a>
                   <div class="dropdown-divider"></div>
                   <a style="color: #FFFFFF;font-size: 10px;" class="dropdown-item " href="{{ route("admin_logout") }}">Logout</a>
               </span>
           </li>
       </ul>
   </div>
</nav>
</div>
