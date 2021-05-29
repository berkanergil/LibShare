<?php

namespace App\Http\Controllers\librarian;

use App\Http\Controllers\Controller;
use App\Models\EBook;
use Illuminate\Http\Request;

class EBookController extends Controller
{
    public function index(EBook $book){
        return view("librarian.ebook",[
            "book"=>$book
        ]);
    }
}
