<?php

namespace App\Http\Controllers\manager;

use App\Models\EBook;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EBookController extends Controller
{
    public function index(EBook $book){
        return view("manager.ebook",[
            "book"=>$book
        ]);
    }
}
