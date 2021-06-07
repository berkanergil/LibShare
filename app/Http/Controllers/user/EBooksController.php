<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\EBook;
use Illuminate\Http\Request;

class EBooksController extends Controller
{
    public function index(){
        $books= EBook::latest()->paginate(200);
        foreach ($books as $book){
            $book["trim"]=str_replace(' ', '', $book["title"]);
        }
        return view("user.ebooks",[
            "books"=>$books,
            "categories"=>Category::latest()->paginate(200),
            "category_name"=>"",
        ]);
    }

    public function get($category_id){
        $books=Category::find($category_id)->e_books()->paginate(200);
        foreach ($books as $book){
            $book["trim"]=str_replace(' ', '', $book["title"]);
        }
        return view("user.ebooks",[
            "books"=>$books,
            "categories"=>Category::latest()->paginate(200),
            "category_name"=>Category::find($category_id)->title,
        ]);
    }
}
