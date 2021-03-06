<?php

namespace App\Http\Controllers\user;

use Carbon\Carbon;
use App\Models\Card;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view("user.register");
    }

    public function store(Request $request){
        $two_days_from_now=Carbon::now()->addDays(2);
        $this->validate($request,[
            "username" =>"required|max:255|unique:users,username",
            "email" =>"required|email|max:255|unique:users,email",
            "first_name" =>"max:255|required",
            "last_name" =>"required|max:255",
            "image"=>"required|image|mimes:jpeg,png,jpg,gif,svg,tmp|max:2048",
            "password" =>"required|confirmed|min:5",
            "name" =>"required|max:255|unique:cards,name",
            "number" =>"required|digits:16|unique:cards,number",
            "expired_date" =>"required|date|after:".$two_days_from_now,
            "cvc_number"=>"required|digits:3"
        ]);

        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images/users/'), $imageName);

        User::create([
            "username"=>$request->username,
            "name"=>$request->first_name,
            "surname"=>$request->last_name,
            "image"=>$imageName,
            "email"=>$request->email,
            "password"=>Hash::make($request->password),
        ]);


        Card::create([
            "user_id"=>User::where("username","=",$request->username)->first()->id,
            "name" =>$request->name,
            "number" =>$request->number,
            "expired_date" =>$request->expired_date,
            "cvc_number"=>$request->cvc_number,
        ]);
        return redirect()->route("user_login");
    }
}
