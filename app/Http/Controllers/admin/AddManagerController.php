<?php

namespace App\Http\Controllers\admin;

use App\Models\Manager;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AddManagerController extends Controller
{
    public function index(){
        if(Auth::guard('admin')){
            return view("admin.addManager");
        }else return view("admin.login");
    }

    public function store(Request $request){
        if(Auth::guard('admin')){
            $this->validate($request,[
                "username" =>"required|max:255",
                "email" =>"required|email|max:255",
                "password" =>"required|confirmed|min:5",
            ]);
            if (!Manager::where('username', '=', $request->username)->exists()) {
                if(!Manager::where('email', '=', $request->email)->exists()){
                    Manager::create([
                        "admin_id"=>Auth::guard('admin')->user()->id,
                        "username"=>$request->username,
                        "email"=>$request->email,
                        "password"=>Hash::make($request->password),
                    ]);
                    return redirect()->route("admin_dashboard");
                }else{
                    return back()->with("error_email","This email is already exists.");
                }
             }else{
                return back()->with("error_username","This username is already exists.");
             }
            
        }else{return view("admin.login");}
    }
}
