<?php

namespace App\Http\Controllers\librarian;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Librarian;

class UsersController extends Controller
{
    public function index(){
        $users=User::latest()->paginate(20);
        $librarians=Librarian::latest()->paginate(20);
        return view("librarian.users",[
            "users"=>$users,
            "librarians"=>$librarians
        ]);
    }
}
