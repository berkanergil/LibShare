<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\ReservedBook;
use App\Models\SavedBook;
use App\Models\StockedBook;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Expr\Cast\String_;

class ReserveBookController extends Controller
{
    public function index($saved_book){
        $book=SavedBook::savedBookWithAtt($saved_book);
        return view("user.reserveBook",[
            "book"=>$book
        ]);
    }

    public function store(Request $request){
        ReservedBook::create([
            "saved_book_id"=>$request->saved_book_id,
            "start_date"=>$request->start_date,
            "end_date"=>$request->end_date
        ]);
        SavedBook::find($request->saved_book_id)->update(["reserve_status"=>"1"]);
        StockedBook::find($request->stocked_book_id)->update(["available_date"=>$request->end_date]);
        return redirect()->route("user_libbasket");
    }

}
