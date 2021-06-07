<?php

namespace App\Http\Controllers\librarian;

use App\Http\Controllers\Controller;
use App\Models\Librarian;
use Illuminate\Http\Request;

class LibrariansController extends Controller
{
    public function index(){
        $librarians=Librarian::latest()->paginate(200);
        return view("librarian.librarians",[
            "librarians"=>$librarians
        ]);
    }
}
