<?php

namespace App\Http\Controllers\admin;

use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ManagerController extends Controller
{
    public function index(Manager $manager){
        return view("admin.manager",[
            "user"=>$manager,
        ]);
    }

    public function store(Request $request){
        $manager=Manager::find($request->manager_id);
        $this->validate($request,[
            "username" =>['required', Rule::unique('managers')->ignore($manager->id),"max:255"],
            "email" =>['required',Rule::unique('managers')->ignore($manager->id),"email"],
            "password" =>"nullable|confirmed|min:5",
            "surname" =>"required|max:255",
            "phone_number" =>"required|max:255",
        ]);
        if($request["submit"]=="update"){
            $request["password"]=Hash::make($request->password);
            $manager->fill($request->all())->save();
            return back()->with("success","Manager infos are updated");
        }if($request["submit"]=="delete"){
            $manager->delete();
            return redirect()->route("admin_users");
        }
            
        
    }
}
