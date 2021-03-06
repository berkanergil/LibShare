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
            "name"=>"required|max:255",
            "surname"=>"required|max:255",
            "phone_number"=>"required|max:14",
            "username" =>"required|max:255",
            "email" =>"required|email|max:255",
            "password" =>"required|confirmed|min:5",
        ]);

        if (!Librarian::where('username', '=', $request->username)->exists()) {
            if(!Librarian::where('email', '=', $request->email)->exists()){
                Librarian::create([
                    "manager_id"=>Auth::guard('manager')->user()->id,
                    "username"=>$request->username,
                    "name"=>$request->name,
                    "surname"=>$request->surname,
                    "phone_number"=>$request->phone_number,
                    "email"=>$request->email,
                    "password"=>Hash::make($request->password),
                ]);
                return back()->with("success","Librarian Has Been Deployed");
            }else{
                return back()->with("error_email","This email is already exists.");
            }
         }else{
            return back()->with("error_username","This username is already exists.");
         }
        
    }
}
