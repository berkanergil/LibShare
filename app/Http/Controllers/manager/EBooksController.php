<?php

namespace App\Http\Controllers\manager;

use App\Models\EBook;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EBooksController extends Controller
{
    public function index(){
        $books= EBook::latest()->paginate(2);
        return view("manager.ebooks",[
            "books"=>$books
        ]);
    }
}
