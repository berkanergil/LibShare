<?php

namespace App\Http\Controllers\user;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view("user.register");
    }

    public function store(Request $request){
        $this->validate($request,[
            "username" =>"required|max:255",
            "email" =>"required|email|max:255",
            "password" =>"required|confirmed|min:5",
        ]);

        if (!User::where('username', '=', $request->username)->exists()) {
            if(!User::where('email', '=', $request->email)->exists()){
                User::create([
                    "username"=>$request->username,
                    "email"=>$request->email,
                    "password"=>Hash::make($request->password),
                ]);
                return redirect()->route("user_login");
            }else{
                return back()->with("error_email","This email is already exists.");
            }
         }else{
            return back()->with("error_username","This username is already exists.");
         }
    }
}
