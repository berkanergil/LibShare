<?php

use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\librarian\LoginController;
use App\Http\Controllers\librarian\LibrarianController;

Route::prefix("librarian")->group(function (){

        $name_prefix="librarian_";

        Route::get('/dashboard', [LibrarianController::class,"index"])->name($name_prefix."dashboard");

        Route::get('/login', [LoginController::class,"index"])->name($name_prefix."login");
        Route::post('/login', [LoginController::class,"store"]);
    });
