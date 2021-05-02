<?php

use App\Http\Controllers\user\LoginController;
use App\Http\Controllers\user\UserController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;

Route::prefix("user")->group(function (){

        $name_prefix="user_";

        Route::get('/dashboard', [UserController::class,"index"])->name($name_prefix."dashboard");

        Route::get('/login', [LoginController::class,"index"])->name($name_prefix."login");
        Route::post('/login', [LoginController::class,"store"]);
    });
