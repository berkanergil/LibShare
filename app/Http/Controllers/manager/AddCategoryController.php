<?php

namespace App\Http\Controllers\manager;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AddCategoryController extends Controller
{
    public function index(){
        return view("manager.addCategory",[
            "categories"=>Category::latest()->paginate(20)
        ]);
    }

    public function store(Request $request){
        $this->validate($request,[
            "title"=>"required", 
        ]);

        if(!Category::where("title","=",trim(strtolower($request->title)))->exists()){
            Category::create([
                "manager_id"=>Auth::guard('manager')->user()->id,
                "title"=>$request->title,
            ]);
            return back()->with("success","The Category Has Been Deployed");
        }else{
            return back()->with("error_title","This title is already exists.");
        }
    }
}
