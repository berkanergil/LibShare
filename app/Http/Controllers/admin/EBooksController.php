<?php

namespace App\Http\Controllers\admin;

use App\Models\EBook;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EBooksController extends Controller
{
    public function index(){
        $books= EBook::latest()->paginate(200);
        return view("admin.ebooks",[
            "books"=>$books
        ]);
    }
}
