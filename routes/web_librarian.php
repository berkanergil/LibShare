<?php

use App\Http\Controllers\librarian\AddBookController;
use App\Http\Controllers\librarian\BookController;
use App\Http\Controllers\librarian\BooksController;
use App\Http\Controllers\librarian\EBookRequestController;
use App\Http\Controllers\librarian\EBookRequestsController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\librarian\LoginController;
use App\Http\Controllers\librarian\LibrarianController;
use App\Http\Controllers\librarian\LogoutController;
use App\Models\EBookRequest;

Route::prefix("librarian")->group(function (){

        $name_prefix="librarian_";

        Route::get('/dashboard', [LibrarianController::class,"index"])->name($name_prefix."dashboard");

        Route::get('/login', [LoginController::class,"index"])->name($name_prefix."login");
        Route::post('/login', [LoginController::class,"store"]);

        Route::get('/addBook', [AddBookController::class,"index"])->name($name_prefix."addBook"); 
        Route::post('/addBook', [AddBookController::class,"store"]);

        Route::get('/ebookRequests', [EBookRequestsController::class,"index"])->name($name_prefix."ebookRequests"); 

        Route::get('/ebookRequest/{book}', [EBookRequestController::class,"index"])->name($name_prefix."ebookRequest"); 
        Route::get('/ebookRequest/{book}/store', [EBookRequestController::class,"store"])->name($name_prefix."ebookRequestStore");
        Route::get('/ebookRequest/{book}/remove', [EBookRequestController::class,"remove"])->name($name_prefix."ebookRequestRemove");

        Route::get('/books', [BooksController::class,"index"])->name($name_prefix."books");

        Route::get('/book/{book:title}', [BookController::class,"index"])->name($name_prefix."book");

        Route::get('/logout', [LogoutController::class,"store"])->name($name_prefix."logout");
    });
