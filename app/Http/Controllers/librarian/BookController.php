<?php

namespace App\Http\Controllers\librarian;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    public function index(Book $book){
        return view("librarian.book",[
            "book"=>$book
        ]);
    }
}
