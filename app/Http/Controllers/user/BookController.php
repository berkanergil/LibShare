<?php

namespace App\Http\Controllers\user;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    public function index(Book $book){
        return view("user.book",[
            "book"=>$book
        ]);
    }

    public function store(Request $request){
        dd($request);
    }
}
