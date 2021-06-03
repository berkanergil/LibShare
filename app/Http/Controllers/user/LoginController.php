<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view("user.login");
    }

    public function store(Request $request){

        if(Auth::attempt($request->only("username","password"))){
            return redirect()->route("user_home");
        }
        return back()->with("status","credentials are not val id");
    }
}
