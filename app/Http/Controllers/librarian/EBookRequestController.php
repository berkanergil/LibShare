<?php

namespace App\Http\Controllers\librarian;

use App\Models\EBook;
use App\Models\EBookRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EBookRequestController extends Controller
{
    public function index(EBookRequest $book){
        return view("librarian.ebookRequest",[
            "book"=>$book
        ]);
    }

    public function store(EBookRequest $book){
        EBook::create([
            "e_book_request_id"=>$book->id,
            "librarian_id"=>Auth::guard('librarian')->user()->id,
            "category_id"=>$book->category_id,
            "title"=>$book->title,
            "author"=>$book->author,
            "publish_date"=>$book->publish_date,
            "language"=>$book->language,
            "description"=>$book->description,
            "image"=>$book->image,
            "file"=>$book->file,
        ]);
        EBookRequest::find($book->id)->update(["accept_status"=>"1"]);
        return redirect()->route("librarian_ebookRequests");
    }

    public function remove(EBookRequest $book){
        EBookRequest::destroy($book->id);
        return redirect()->route("librarian_ebookRequests");
    }
}
