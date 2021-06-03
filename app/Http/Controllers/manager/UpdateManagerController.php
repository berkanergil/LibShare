<?php

namespace App\Http\Controllers\manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Manager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UpdateManagerController extends Controller
{
    public function index(){
        return view("manager.updateManager",[
            "user"=>Auth::guard("manager")->user()
        ]);
    }

    public function store(Request $request){
        $this->validate($request,[
            "username" =>"required|max:255",
            "email" =>"required|email|max:255",
            "name" =>"required|max:255",
            "surname" =>"required|max:255",
            "phone_number" =>"required|max:255",
            "password" =>"nullable|confirmed|min:5",
            "old_password" =>"required",
        ]);

        if(is_null($request->password)){
            if(Hash::check($request->old_password,Auth::guard("manager")->user()->password)){
                if (!Manager::where('username', '=', $request->username)
                ->where("username","!=",Auth::guard("manager")->user()->username)
                ->exists()) {
                    if(!Manager::where('email', '=', $request->email)
                    ->where("email","!=",Auth::guard("manager")->user()->email)
                    ->exists()){
                        Manager::find(Auth::guard("manager")->user()->id)
                        ->update([
                            "username"=>$request->username,
                            "email"=>$request->email,
                            "name"=>$request->name,
                            "surname"=>$request->surname,
                            "phone_number"=>$request->phone_number,
                            "password"=>Hash::make($request->old_password),
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
        }else{
            if(Hash::check($request->old_password,Auth::guard("manager")->user()->password)){
                if (!Manager::where('username', '=', $request->username)
                ->where("username","!=",Auth::guard("manager")->user()->username)
                ->exists()) {
                    if(!Manager::where('email', '=', $request->email)
                    ->where("email","!=",Auth::guard("manager")->user()->email)
                    ->exists()){
                        Manager::find(Auth::guard("manager")->user()->id)
                        ->update([
                            "username"=>$request->username,
                            "email"=>$request->email,
                            "name"=>$request->name,
                            "surname"=>$request->surname,
                            "phone_number"=>$request->phone_number,
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
}
