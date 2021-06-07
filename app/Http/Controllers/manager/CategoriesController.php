<?php

namespace App\Http\Controllers\manager;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(){
        $categories=Category::latest()->paginate(200);
        return view("manager.categories",[
            "categories"=>$categories
        ]);
    }
}
