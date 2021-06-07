<?php

namespace App\Http\Controllers\admin;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    public function index(Book $book){
        return view("admin.book",[
            "book"=>$book,
            "categories"=>Category::latest()->paginate(200)
        ]);
    }
}
