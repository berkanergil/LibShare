<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\ReservedBook;
use Illuminate\Http\Request;

class ReservedBooksController extends Controller
{
    public function index(){
        $reservedBooks=ReservedBook::reservedBooksWithAtt();
        return view("user.reservedBooks",[
            "books"=>$reservedBooks
        ]);
    }
}
