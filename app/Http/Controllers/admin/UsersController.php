<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Librarian;
use App\Models\Manager;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
        $users=User::latest()->paginate(200);
        $librarians=Librarian::latest()->paginate(200);
        $managers=Manager::latest()->paginate(200);
        return view("admin.users",[
            "users"=>$users,
            "librarians"=>$librarians,
            "managers"=>$managers
        ]);
    }
}
