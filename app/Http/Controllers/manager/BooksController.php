<?php

namespace App\Http\Controllers\manager;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BooksController extends Controller
{
    public function index(){
        $books=Book::latest()->paginate(2);
        return view("manager.books",[
            "books"=>$books
        ]);
    }
}
