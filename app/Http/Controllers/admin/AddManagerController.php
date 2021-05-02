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
        return view("admin.addManager");
    }

    public function store(Request $request){
        $this->validate($request,[
            "username" =>"required|max:255",
            "email" =>"required|email|max:255",
            "password" =>"required|confirmed",
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
        
    }
}
