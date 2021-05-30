<?php

namespace App\Http\Controllers\manager;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(User $user){
        return view("manager.user",[
            "user"=>$user
        ]);
    }
}
