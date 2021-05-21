<?php

namespace App\Http\Controllers\user;

use Carbon\Carbon;
use App\Models\Category;
use App\Models\EBookRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AddEBookRequestController extends Controller
{
    public function index(){
        $categories=Category::get();
        return view("user.addEBookDonation",[
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
            "file" => "required|mimes:pdf|max:10000"
        ]);

        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images/ebook_requests'), $imageName);

        $fileName = time().'.'.$request->file->extension();  
        $request->file->move(public_path('pdfs/ebook_requests'), $fileName);


        if(!EBookRequest::where("title","=",$request->title)->exists()){
            EBookRequest::create([
                "user_id"=>Auth::user()->id,
                "category_id"=>$request->category_id,
                "title"=>$request->title,
                "author"=>$request->author,
                "publish_date"=>$request->publish_date,
                "language"=>$request->language,
                "description"=>$request->description,
                "image"=>$imageName,
                "file"=>$fileName
            ]);
            
            return back()->with("success","Book is uploaded.");
        }else{
            return back()->with("error_title","This title is already exist.");
        }
    }
}