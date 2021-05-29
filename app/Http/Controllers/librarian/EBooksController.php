<?php

namespace App\Http\Controllers\librarian;

use App\Http\Controllers\Controller;
use App\Models\EBook;
use Illuminate\Http\Request;

class EBooksController extends Controller
{
    public function index(){
        $books= EBook::latest()->paginate(2);
        return view("librarian.ebooks",[
            "books"=>$books
        ]);
    }
}
