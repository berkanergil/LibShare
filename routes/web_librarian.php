<?php

use App\Http\Controllers\librarian\AddBookController;
use App\Http\Controllers\librarian\BookController;
use App\Http\Controllers\librarian\BooksController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\librarian\LoginController;
use App\Http\Controllers\librarian\LibrarianController;
use App\Http\Controllers\librarian\LogoutController;

Route::prefix("librarian")->group(function (){

        $name_prefix="librarian_";

        Route::get('/dashboard', [LibrarianController::class,"index"])->name($name_prefix."dashboard");

        Route::get('/login', [LoginController::class,"index"])->name($name_prefix."login");
        Route::post('/login', [LoginController::class,"store"]);

        Route::get('/addBook', [AddBookController::class,"index"])->name($name_prefix."addBook"); 
        Route::post('/addBook', [AddBookController::class,"store"]);

        Route::get('/books', [BooksController::class,"index"])->name($name_prefix."books");

        Route::get('/book/{book:title}', [BookController::class,"index"])->name($name_prefix."book");

        Route::get('/logout', [LogoutController::class,"store"])->name($name_prefix."logout");
    });
