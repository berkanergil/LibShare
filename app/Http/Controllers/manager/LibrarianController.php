<?php

namespace App\Http\Controllers\manager;

use App\Models\Librarian;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LibrarianController extends Controller
{
    public function index(Librarian $librarian){
        return view("manager.librarian",[
            "librarian"=>$librarian,
        ]);
    }

    
    public function store(Request $request){
        $librarian=Librarian::find($request->librarian_id);
        $this->validate($request,[
            "username" =>['required', Rule::unique('librarians')->ignore($librarian->id),"max:255"],
            "email" =>['required',Rule::unique('librarians')->ignore($librarian->id),"email"],
            "password" =>"nullable|confirmed|min:5",
        ]);
        
        if($request["submit"]=="update"){
            $request["password"]=Hash::make($request->password);
            $librarian->fill($request->all())->save();
            return back()->with("success","Librarian infos are updated");
        }
        if($request["submit"]=="delete"){
            $librarian->delete();
            return redirect()->route("manager_librarians");
        }
        
    }
}
