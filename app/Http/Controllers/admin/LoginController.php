<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view("admin.login");
    }

    public function store(Request $request){

        if(Auth::guard('admin')->attempt($request->only("username","password"))){
            return redirect()->route("admin_dashboard");
        }
        return back()->with("status","credentials are not valid");
    }
}
