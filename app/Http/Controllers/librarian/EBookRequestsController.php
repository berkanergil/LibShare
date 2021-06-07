<?php

namespace App\Http\Controllers\librarian;

use App\Http\Controllers\Controller;
use App\Models\EBookRequest;
use Illuminate\Http\Request;

class EBookRequestsController extends Controller
{
    public function index(){
        $books= EBookRequest::where("accept_status","=","0")->paginate(200);
        return view("librarian.ebookRequests",[
            "books"=>$books
        ]);
    }
}
