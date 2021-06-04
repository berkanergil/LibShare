<?php

namespace App\Http\Controllers\librarian;

use App\Models\Book;
use App\Models\Category;
use App\Models\StockedBook;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index(Book $book){
        return view("librarian.book",[
            "book"=>$book,
            "categories"=>Category::latest()->paginate(20)
        ]);
    }

    public function store(Request $request,Book $book){
        $request->validate([
            "category_id"=>"required",
            "title" =>['required',Rule::unique('books')->ignore($book->id),"max:255"],
            "author"=>"required|max:255",
            "publish_date"=>"required|date|before:".Carbon::now(),
            "language"=>"required|max:255",
            "description"=>"required|max:255",
            "file"=>"nullable|image|mimes:jpeg,png,jpg,gif,svg,tmp|max:2048",
            "stock_number"=>"required|max:255",
        ]);

        $plus=($request->stock_number)-($book->stock_number);
        if(is_null($request->file)){
            $imageName=$book->image;
        }else{
            unlink(public_path("images/books/".$book->image));
            $imageName = time().'.'.$request->file->extension();  
            $request->file->move(public_path('images/books/'), $imageName);
        }
        $request["image"]=$imageName;
        $book->fill($request->all())->save();
        for($i=0;$i<$plus;$i++){
            StockedBook::create([
                "book_id"=>$book->id,
                "available_date"=>Carbon::now()->toDateString()
            ]);
        }
        return back()->with("success","The Book Has Been Uploaded");
        }
}
