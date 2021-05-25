<?php

namespace App\Http\Controllers\user;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\Card;
use Illuminate\Support\Facades\Auth;

class UpdateCardController extends Controller
{
    public function index(){
        $card=User::find(Auth::user()->id)->card()->first();
        return view("user.settings.updateCard",["card"=>$card]);
    }

    public function store(Request $request){
        $card=User::find(Auth::user()->id)->card()->first();
        $two_days_from_now=Carbon::now()->addDays(2);
        $this->validate($request,[
            "name" =>['required', Rule::unique('cards')->ignore($card->id),"max:255"],
            "number" =>['required',Rule::unique('cards')->ignore($card->id),"digits:16"],
            "expired_date" =>"required|date|after:".$two_days_from_now,
            "cvc_number"=>"required|digits:3"
        ]);

        $card->fill($request->all())->save();
        return back()->with("success","Card Infos are updated");
    }
}
