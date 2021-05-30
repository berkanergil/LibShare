<?php

namespace App\Http\Controllers\manager;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index(){
        $users=User::latest()->paginate(2);
        return view("manager.users",[
            "users"=>$users
        ]);
    }
}
