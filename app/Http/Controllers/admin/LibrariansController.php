<?php

namespace App\Http\Controllers\admin;

use App\Models\Librarian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LibrariansController extends Controller
{
    public function index(){
        $librarians = Librarian::latest()->paginate(2);
        return view("admin.librarians",[
            "librarians"=>$librarians
        ]);
    }
}
