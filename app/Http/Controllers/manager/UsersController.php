<?php

namespace App\Http\Controllers\manager;

use App\Models\User;
use App\Models\Manager;
use App\Models\Librarian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index(){
        $users=User::latest()->paginate(200);
        $librarians=Librarian::latest()->paginate(200);
        $managers=Manager::latest()->paginate(200);
        return view("manager.users",[
            "users"=>$users,
            "librarians"=>$librarians,
            "managers"=>$managers
        ]);
    }
}
