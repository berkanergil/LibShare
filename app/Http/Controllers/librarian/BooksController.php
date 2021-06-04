<?php

namespace App\Http\Controllers\librarian;

use App\Models\Book;
use App\Models\EBook;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class BooksController extends Controller
{
    public function index(){
        $books=Book::latest()->paginate(20);
        $ebooks= EBook::latest()->paginate(20);
        $categories= Category::latest()->paginate(20);
        return view("librarian.books",[
            "books"=>$books,
            "ebooks"=>$ebooks,
            "categories"=>$categories
        ]);
    }
}
