<?php

use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\LibrarianController;
use App\Http\Controllers\admin\LibrariansController;
use App\Http\Controllers\admin\AddLibrarianController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\LoginController;

Route::prefix("admin")->group(function (){

        $name_prefix="admin_";

        Route::get('/dashboard', [AdminController::class,"index"])->name($name_prefix."dashboard");

        Route::get('/addLibrarian', [AddLibrarianController::class,"index"])->name($name_prefix."addLibrarian");
        Route::post('/addLibrarian', [AddLibrarianController::class,"store"]);

        Route::get('/librarians', [LibrariansController::class,"index"])->name($name_prefix."librarians");

        Route::get('/librarian/{librarian:username}', [LibrarianController::class,"index"])->name($name_prefix."librarian");

        Route::get('/login', [LoginController::class,"index"])->name($name_prefix."login");
        Route::post('/login', [LoginController::class,"store"]);
    });
