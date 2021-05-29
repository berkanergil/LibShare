<?php

namespace App\Http\Controllers\librarian;

use App\Http\Controllers\Controller;
use App\Models\Librarian;
use Illuminate\Http\Request;

class LibrarianController extends Controller
{
    public function index(){
        return view("librarian.dashboard");
    }

    public function get(Librarian $librarian){
        return view("librarian.librarian",["librarian"=>$librarian]);
    }
}
