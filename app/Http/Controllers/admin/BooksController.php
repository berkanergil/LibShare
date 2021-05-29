<?php

namespace App\Http\Controllers\admin;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BooksController extends Controller
{
    public function index(){
        $books=Book::latest()->paginate(2);
        return view("admin.books",[
            "books"=>$books
        ]);
    }
}
