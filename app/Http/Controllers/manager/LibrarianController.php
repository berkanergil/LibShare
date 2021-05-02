<?php

namespace App\Http\Controllers\manager;

use App\Models\Librarian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LibrarianController extends Controller
{
    public function index(Librarian $librarian){
        return view("manager.librarian",[
            "librarian"=>$librarian,
        ]);
    }
}
