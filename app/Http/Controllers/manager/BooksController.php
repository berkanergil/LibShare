<?php

namespace App\Http\Controllers\manager;

use App\Models\Book;
use App\Models\EBook;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BooksController extends Controller
{
    public function index(){
        $books=Book::latest()->paginate(20);
        $ebooks= EBook::latest()->paginate(20);
        return view("manager.books",[
            "books"=>$books,
            "ebooks"=>$ebooks
        ]);
    }
}
