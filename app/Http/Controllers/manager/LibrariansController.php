<?php

namespace App\Http\Controllers\manager;

use App\Models\Librarian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LibrariansController extends Controller
{
    public function index(){
        $librarians = Librarian::latest()->paginate(2);
        return view("manager.librarians",[
            "librarians"=>$librarians
        ]);
    }
}
