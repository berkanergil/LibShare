<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Card;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddCardController extends Controller
{
    public function index(){
        return view("user.settings.addCard");
    }

    public function store(Request $request){
        $two_days_from_now=Carbon::now()->addDays(2);

        $this->validate($request,[
            "name" =>"required|max:255",
            "number" =>"required|digits:16",
            "expired_date" =>"required|date|after:".$two_days_from_now,
            "cvc_number"=>"required|digits:3"
        ]);

        if (!Card::where('number', '=', $request->username)->exists()) {
                Card::create([
                    "user_id"=>Auth::user()->id,
                    "name" =>$request->name,
                    "number" =>$request->number,
                    "expired_date" =>$request->expired_date,
                    "cvc_number"=>$request->cvc_number,
                ]);
                return redirect()->route("user_settings");
         }else{
            return back()->with("error_number","This card number is already exists.");
         }
    }
}
