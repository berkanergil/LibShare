<?php

namespace App\Http\Controllers\admin;

use App\Models\Librarian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LibrarianController extends Controller
{
    public function index(Librarian $librarian){
        return view("admin.librarian",[
            "librarian"=>$librarian,
        ]);
    }
}
