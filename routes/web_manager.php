<?php

use App\Http\Controllers\manager\LibrarianController;
use App\Http\Controllers\manager\AddLibrarianController;
use App\Http\Controllers\manager\LibrariansController;
use App\Http\Controllers\manager\LoginController;
use App\Http\Controllers\manager\LogoutController;
use App\Http\Controllers\manager\ManagerController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;

Route::prefix("manager")->group(function (){

        $name_prefix="manager_";

        Route::get('/dashboard', [ManagerController::class,"index"])->name($name_prefix."dashboard");

        Route::get('/login', [LoginController::class,"index"])->name($name_prefix."login");
        Route::post('/login', [LoginController::class,"store"]);

        Route::get('/logout', [LogoutController::class,"store"])->name($name_prefix."logout");

        Route::get('/librarians', [LibrariansController::class,"index"])->name($name_prefix."librarians");

        Route::get('/librarian/{librarian:username}', [LibrarianController::class,"index"])->name($name_prefix."librarian");

        Route::get('/addLibrarian', [AddLibrarianController::class,"index"])->name($name_prefix."addLibrarian");
        Route::post('/addLibrarian', [AddLibrarianController::class,"store"]);
    });
