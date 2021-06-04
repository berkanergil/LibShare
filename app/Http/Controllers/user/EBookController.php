<?php

namespace App\Http\Controllers\user;

use App\Models\EBook;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class EBookController extends Controller
{
    public function index(EBook $book){
        return view("user.ebook",[
            "book"=>$book,
            "categories"=>Category::latest()->paginate(20)
        ]);
    }
}
