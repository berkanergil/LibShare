<?php

namespace App\Http\Controllers\user;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\SavedBook;
use App\Models\StockedBook;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index(Book $book){
        $stocked_book=$book->stockedBooks()->orderBy('available_date','asc')->first();
        $user=User::find(Auth::user()->id);
        $check=$user->savedBooks()->
        select("book_id")->
        join("stocked_books","saved_books.stocked_book_id","=","stocked_books.id")->
        where("book_id","=",$stocked_book->book_id)->first();
        if(isset($check->book_id)){
            return view("user.book",[
                "book"=>$book,
                "stocked_book"=>$stocked_book,
                "saved_status"=>"1"
            ]);
        }else{
            return view("user.book",[
                "book"=>$book,
                "stocked_book"=>$stocked_book,
                "saved_status"=>"0"
            ]);   
        }
    }

    public function store(Request $request){
        SavedBook::create([
            "user_id"=>Auth::user()->id,
            "stocked_book_id"=>$request->stocked_book_id
        ]);
        return back()->with("success","Item added to LibBasket");
    }
}
