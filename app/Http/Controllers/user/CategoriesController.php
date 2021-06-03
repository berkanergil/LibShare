<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(){
        $books=Book::latest()->paginate(20);
        foreach ($books as $book) {
            $book["trim"]=str_replace(' ', '', $book["title"]);
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
        $books=Category::find($category_id)->books()->get();
        foreach ($books as $book) {
            $book["trim"]=str_replace(' ', '', $book["title"]);
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
