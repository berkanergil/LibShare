<?php

namespace App\Http\Controllers\librarian;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(User $user){
        return view("librarian.user",[
            "user"=>$user
        ]);
    }
}
