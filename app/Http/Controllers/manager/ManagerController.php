<?php

namespace App\Http\Controllers\manager;

use App\Http\Controllers\Controller;
use App\Models\Manager;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function index(){
        return view("manager.dashboard");
    }

    public function get(Manager $manager){
        return view("manager.manager",["manager"=>$manager]);
    }
}
