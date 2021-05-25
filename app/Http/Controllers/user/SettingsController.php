<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function index(){
        $card=User::find(Auth::user()->id)->card()->get();
        return view("user.settings",["card",$card]);
    }
}
