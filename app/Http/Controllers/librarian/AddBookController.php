<?php

namespace App\Http\Controllers\librarian;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\Category;
use App\Models\StockedBook;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AddBookController extends Controller
{
    public function index(){
        $categories=Category::get();
        return view("librarian.addBook",[
            "categories"=>$categories
        ]);
    }

    public function store(Request $request){
        $request->validate([
            "category_id"=>"required",
            "title"=>"required|max:255",
            "author"=>"required|max:255",
            "publish_date"=>"required|date|before:".Carbon::now(),
            "language"=>"required|max:255",
            "description"=>"required|max:255",
            "image"=>"required|image|mimes:jpeg,png,jpg,gif,svg,tmp|max:2048",
            "stock_number"=>"required|max:255|min:1",
        ]);
        $imageName = time().'.'.$request->image->extension();  

        $request->image->move(public_path('images/books/'), $imageName);

        if(!Book::where("title","=",$request->title)->exists()){
            Book::create([
                "librarian_id"=>Auth::guard("librarian")->user()->id,
                "category_id"=>$request->category_id,
                "title"=>$request->title,
                "author"=>$request->author,
                "publish_date"=>$request->publish_date,
                "language"=>$request->language,
                "description"=>$request->description,
                "image"=>$imageName,
                "stock_number"=>$request->stock_number,
            ]);

            $book_id=Book::latest()->first()->id;
            
            for($i=0;$i<$request->stock_number;$i++){
                StockedBook::create([
                    "book_id"=>$book_id,
                    "available_date"=>Carbon::now()->toDateString()
                ]);
            }
            return back()->with("success","The Book Has Been Deployed");
        }else{
            return back()->with("error_title","This title is already exist.");
        }
    }
}
