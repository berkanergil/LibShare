<?php

namespace App\Http\Controllers\user;

use App\Models\User;
use App\Models\ReservedBook;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UpdateUserController extends Controller
{
    public function index(){
        $reservedBooks=ReservedBook::reservedBooksWithAtt();
        return view("user.settings.updateUser",[
            "user"=>Auth::user(),
            "books"=>$reservedBooks
        ]);
    }

    public function store(Request $request){
        $this->validate($request,[
            "username" =>"required|max:255",
            "name" =>"required|max:255",
            "surname" =>"required|max:255",
            "phone_number" =>"required|max:255",
            "email" =>"required|email|max:255",
            "password" =>"nullable|confirmed|min:5",
            "image"=>"nullable|image|mimes:jpeg,png,jpg,gif,svg,tmp|max:2048",
            "old_password" =>"required",
        ]);

        $user=Auth::user();
        if(is_null($request->image)){
            $imageName=Auth::user()->image;
        }else{
            unlink(public_path("images/users/".$user->image));
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images/users/'), $imageName);
        }

        if(is_null($request->password)){
            if(Hash::check($request->old_password,Auth::user()->password)){
                if (!User::where('username', '=', $request->username)
                ->where("username","!=",Auth::user()->username)
                ->exists()) {
                    if(!User::where('email', '=', $request->email)
                    ->where("email","!=",Auth::user()->email)
                    ->exists()){
                        User::find(Auth::user()->id)
                        ->update([
                            "username"=>$request->username,
                            "name"=>$request->name,
                            "surname"=>$request->surname,
                            "phone_number"=>$request->phone_number,
                            "email"=>$request->email,
                            "image"=>$imageName,
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
            if(Hash::check($request->old_password,Auth::user()->password)){
                if (!User::where('username', '=', $request->username)
                ->where("username","!=",Auth::user()->username)
                ->exists()) {
                    if(!User::where('email', '=', $request->email)
                    ->where("email","!=",Auth::user()->email)
                    ->exists()){
                        User::find(Auth::user()->id)
                        ->update([
                            "username"=>$request->username,
                            "name"=>$request->name,
                            "surname"=>$request->surname,
                            "phone_number"=>$request->phone_number,
                            "email"=>$request->email,
                            "image"=>$imageName,
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
