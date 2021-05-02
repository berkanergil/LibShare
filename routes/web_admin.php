<?php

use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\ManagersController;
use App\Http\Controllers\admin\ManagerController;
use App\Http\Controllers\admin\AddManagerController;
use App\Http\Controllers\admin\LogoutController;

Route::prefix("admin")->group(function (){

        $name_prefix="admin_";

        Route::get('/dashboard', [AdminController::class,"index"])->name($name_prefix."dashboard");

        Route::get('/addManager', [AddManagerController::class,"index"])->name($name_prefix."addManager");
        Route::post('/addManager', [AddManagerController::class,"store"]);

        Route::get('/managers', [ManagersController::class,"index"])->name($name_prefix."managers");

        Route::get('/manager/{manager:username}', [ManagerController::class,"index"])->name($name_prefix."manager");

        Route::get('/login', [LoginController::class,"index"])->name($name_prefix."login");
        Route::post('/login', [LoginController::class,"store"]);

        Route::get('/logout', [LogoutController::class,"store"])->name($name_prefix."logout");
    });
