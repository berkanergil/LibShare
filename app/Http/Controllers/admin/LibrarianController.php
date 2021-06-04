<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Librarian;
use Illuminate\Http\Request;

class LibrarianController extends Controller
{
    public function index(Librarian $librarian){
        return view("admin.librarian",[
            "user"=>$librarian
        ]);
    }
}
