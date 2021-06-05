<?php

namespace App\Http\Controllers\user;

use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{
    public function index(){
        $books=Book::latest()->paginate(2);
        foreach ($books as $book) {
            $book["trim"]=str_replace(' ', '', $book["title"]);
            $stocked_book=$book->stockedBooks()->orderBy('available_date','asc')->first();
            $user=User::find(Auth::user()->id);
            $check=$user->savedBooks()->
            select("book_id")->
            join("stocked_books","saved_books.stocked_book_id","=","stocked_books.id")->
            where("book_id","=",$stocked_book->book_id)->first();
            if(isset($check->book_id)){
                $book["stocked_book"]=$stocked_book;
                $book["saved_status"]="1";
            }else{
                $book["stocked_book"]=$stocked_book;
                $book["saved_status"]="0";
            }
        }
        return view("user.categories",
        [
            "categories"=>Category::latest()->paginate(20),
            "category_name"=>"",
            "books"=>$books
        ]
    );
    }

    public function get($category_id){
        $books=Category::find($category_id)->books()->paginate(20);
        foreach ($books as $book) {
            $book["trim"]=str_replace(' ', '', $book["title"]);
            $stocked_book=$book->stockedBooks()->orderBy('available_date','asc')->first();
            $user=User::find(Auth::user()->id);
            $check=$user->savedBooks()->
            select("book_id")->
            join("stocked_books","saved_books.stocked_book_id","=","stocked_books.id")->
            where("book_id","=",$stocked_book->book_id)->first();
            if(isset($check->book_id)){
                $book["stocked_book"]=$stocked_book;
                $book["saved_status"]="1";
            }else{
                $book["stocked_book"]=$stocked_book;
                $book["saved_status"]="0";
            }
        }
        return view("user.categories",
        [
            "categories"=>Category::latest()->paginate(20),
            "category_name"=>Category::find($category_id)->title,
            "books"=>$books
        ]
    );
    }

    
}
