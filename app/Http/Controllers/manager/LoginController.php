<?php

namespace App\Http\Controllers\manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view("manager.login");
    }

    public function store(Request $request){

        if(Auth::guard('manager')->attempt($request->only("username","password"))){
            return redirect()->route("manager_books");
        }
        return back()->with("status","credentials are not val id");
    }
}
