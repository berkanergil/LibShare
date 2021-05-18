<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\SavedBook;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LibBasketController extends Controller
{
    public function index(){
        $books=SavedBook::savedBooksWithAtt();
        return view("user.libBasket",[
            "books"=>$books
        ]);
    }
}
