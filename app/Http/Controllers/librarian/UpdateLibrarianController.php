<?php

namespace App\Http\Controllers\librarian;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Librarian;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UpdateLibrarianController extends Controller
{
    public function index(){
        return view("librarian.updateLibrarian",[
            "user"=>Auth::guard("librarian")->user()
        ]);
    }

    public function store(Request $request){
        $this->validate($request,[
            "username" =>"required|max:255",
            "email" =>"required|email|max:255",
            "password" =>"nullable|confirmed|min:5",
            "old_password" =>"required",
        ]);

        if(Hash::check($request->old_password,Auth::guard("librarian")->user()->password)){
            if (!Librarian::where('username', '=', $request->username)
            ->where("username","!=",Auth::guard("librarian")->user()->username)
            ->exists()) {
                if(!Librarian::where('email', '=', $request->email)
                ->where("email","!=",Auth::guard("librarian")->user()->email)
                ->exists()){
                    Librarian::find(Auth::guard("librarian")->user()->id)
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
