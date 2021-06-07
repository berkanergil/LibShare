<?php

namespace App\Http\Controllers\librarian;

use App\Models\EBook;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EBookController extends Controller
{
    public function index(EBook $book){
        return view("librarian.ebook",[
            "book"=>$book,
            "categories"=>Category::latest()->paginate(200)
        ]);
    }
}
