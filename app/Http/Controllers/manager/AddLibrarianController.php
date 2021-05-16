<?php

namespace App\Http\Controllers\manager;

use App\Models\Librarian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AddLibrarianController extends Controller
{
    public function index(){
        return view("manager.addLibrarian");
    }

    public function store(Request $request){
        $this->validate($request,[
            "username" =>"required|max:255",
            "email" =>"required|email|max:255",
            "password" =>"required|confirmed|min:5",
        ]);

        if (!Librarian::where('username', '=', $request->username)->exists()) {
            if(!Librarian::where('email', '=', $request->email)->exists()){
                Librarian::create([
                    "manager_id"=>Auth::guard('manager')->user()->id,
                    "username"=>$request->username,
                    "email"=>$request->email,
                    "password"=>Hash::make($request->password),
                ]);
                return redirect()->route("manager_dashboard");
            }else{
                return back()->with("error_email","This email is already exists.");
            }
         }else{
            return back()->with("error_username","This username is already exists.");
         }
        
    }
}
