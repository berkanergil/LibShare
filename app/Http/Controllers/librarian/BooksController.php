<?php

namespace App\Http\Controllers\librarian;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index(){
        $books=Book::latest()->paginate(2);
        return view("librarian.books",[
            "books"=>$books
        ]);
    }
}
