<?php

namespace App\Http\Controllers\librarian;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
        public function index(){
            return view("librarian.login");
        }
    
        public function store(Request $request){
    
            if(Auth::guard('librarian')->attempt($request->only("username","password"))){
                return redirect()->route("librarian_ebookRequests");
            }
            return back()->with("status","credentials are not valid");
        }
}
