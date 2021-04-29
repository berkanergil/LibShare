<?php

namespace App\Http\Controllers\admin;

use App\Models\Librarian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AddLibrarianController extends Controller
{
    public function index(){
        return view("admin.addLibrarian");
    }

    public function store(Request $request){
        Librarian::create([
            "admin_id"=>$request->admin_id,
            "username"=>$request->username,
            "email"=>$request->email,
            "password"=>Hash::make($request->password),
        ]);
        return redirect()->route("admin_dashboard");
    }
}
