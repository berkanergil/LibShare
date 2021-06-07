<?php

namespace App\Http\Controllers\admin;

use App\Models\Manager;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManagersController extends Controller
{
    public function index(){
        $managers = Manager::latest()->paginate(200);
        return view("admin.managers",[
            "managers"=>$managers
        ]);
    }
}
