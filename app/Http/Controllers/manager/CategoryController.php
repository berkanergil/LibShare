<?php

namespace App\Http\Controllers\manager;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index(Category $category){
        return view("manager.category",[
            "category"=>$category,
        ]);
    }

    public function store(Request $request){
        if($request["submit"]=="update"){
            $this->validate($request,[
                "title"=>["required",Rule::unique("categories")->ignore($request->category_id)],
            ]);
            Category::find($request->category_id)->fill($request->all())->save();
            return back()->with("success","Categoryt info updated");
        }if($request["submit"]=="delete"){
            Category::find($request->category_id)->delete();
            return redirect()->route("manager_categories");

        }
        
    }


}
