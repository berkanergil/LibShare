<?php

namespace App\Http\Controllers\user;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UpdateUserController extends Controller
{
    public function index(){
        return view("user.settings.updateUser",[
            "user"=>Auth::user()
        ]);
    }

    public function store(Request $request){
        $this->validate($request,[
            "username" =>"required|max:255",
            "email" =>"required|email|max:255",
            "password" =>"nullable|confirmed|min:5",
            "old_password" =>"required",
        ]);

        if(Hash::check($request->old_password,Auth::user()->password)){
            
        }else{
            return back()->with("old_password","Password is incorrect");
        }

        if (!User::where('username', '=', $request->username)
        ->where("username","!=",Auth::user()->username)
        ->exists()) {
            if(!User::where('email', '=', $request->email)
            ->where("email","!=",Auth::user()->email)
            ->exists()){
                User::find(Auth::user()->id)
                ->update([
                    "username"=>$request->username,
                    "email"=>$request->email,
                    "password"=>Hash::make($request->password),
                ]);
                return back()->with("success","User informations updated.");
            }else{
                return back()->with("error_email","This email is already exists.");
            }
         }else{
            return back()->with("error_username","This username is already exists.");
         }
    }
    
}