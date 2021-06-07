<?php

namespace App\Http\Controllers\manager;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class BookController extends Controller
{
    public function index(Book $book){
        return view("manager.book",[
            "book"=>$book,
            "categories"=>Category::latest()->paginate(200)
        ]);
    }
}
