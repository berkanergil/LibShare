<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\EBook;
use Illuminate\Http\Request;

class EBooksController extends Controller
{
    public function index(){
        $books= EBook::latest()->paginate(2);
        return view("user.ebooks",[
            "books"=>$books
        ]);
    }
}
