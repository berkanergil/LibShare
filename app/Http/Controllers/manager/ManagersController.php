<?php

namespace App\Http\Controllers\manager;

use App\Http\Controllers\Controller;
use App\Models\Manager;
use Illuminate\Http\Request;

class ManagersController extends Controller
{
    public function index(){
        $managers=Manager::latest()->paginate(200);
        return view("manager.managers",["managers"=>$managers]);
    }
}
