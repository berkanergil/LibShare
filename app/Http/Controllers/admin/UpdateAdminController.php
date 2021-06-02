<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UpdateAdminController extends Controller
{
    public function index(){
        return view("admin.updateAdmin",[
            "user"=>Auth::guard("admin")->user()
        ]);
    }

    public function store(Request $request){
        $this->validate($request,[
            "username" =>"required|max:255",
            "email" =>"required|email|max:255",
            "password" =>"nullable|confirmed|min:5",
            "old_password" =>"required",
        ]);

        if(Hash::check($request->old_password,Auth::guard("admin")->user()->password)){
            if (!Admin::where('username', '=', $request->username)
            ->where("username","!=",Auth::guard("admin")->user()->username)
            ->exists()) {
                if(!Admin::where('email', '=', $request->email)
                ->where("email","!=",Auth::guard("admin")->user()->email)
                ->exists()){
                    Admin::find(Auth::guard("admin")->user()->id)
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
            
        }else{
            return back()->with("old_password","Password is incorrect");
        }
    }
}
