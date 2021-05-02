<?php

namespace App\Http\Controllers\admin;

use App\Models\Manager;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManagerController extends Controller
{
    public function index(Manager $manager){
        return view("admin.manager",[
            "manager"=>$manager,
        ]);
    }
}
