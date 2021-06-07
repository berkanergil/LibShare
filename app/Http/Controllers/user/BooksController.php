<?php

namespace App\Http\Controllers\user;

use App\Models\Book;
use App\Models\EBook;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BooksController extends Controller
{
    public function index(){
        $books=Book::latest()->paginate(200);
        $ebooks= EBook::latest()->paginate(200);
        return view("user.books",[
            "books"=>$books,
            "ebooks"=>$ebooks
        ]);
    }
}
