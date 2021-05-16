<?php

namespace App\Http\Controllers\user;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SavedBook;
use App\Models\StockedBook;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index(Book $book){
        $stocked_book=$book->stockedBooks()->orderBy('available_date','asc')->first();
        return view("user.book",[
            "book"=>$book,
            "stocked_book"=>$stocked_book
        ]);
    }

    public function store(Request $request){
        SavedBook::create([
            "user_id"=>Auth::user()->id,
            "stocked_book_id"=>$request->stocked_book_id
        ]);
        return back()->with("success","Item added to LibBasket");
    }
}
