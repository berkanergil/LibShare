<?php

use App\Models\EBookRequest;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\librarian\BookController;
use App\Http\Controllers\librarian\UserController;
use App\Http\Controllers\librarian\BooksController;
use App\Http\Controllers\librarian\EBookController;
use App\Http\Controllers\librarian\LoginController;
use App\Http\Controllers\librarian\UsersController;
use App\Http\Controllers\librarian\EBooksController;
use App\Http\Controllers\librarian\LogoutController;
use App\Http\Controllers\librarian\AddBookController;
use App\Http\Controllers\librarian\LibrarianController;
use App\Http\Controllers\librarian\LibrariansController;
use App\Http\Controllers\librarian\EBookRequestController;
use App\Http\Controllers\librarian\EBookRequestsController;
use App\Http\Controllers\librarian\UpdateLibrarianController;

Route::prefix("librarian")->group(function(){
    Route::get('/login', [LoginController::class,"index"])->name("librarian_login");
    Route::post('/login', [LoginController::class,"store"]);    
});

Route::group(["middleware"=>"librarianAuth"],function () {
    Route::prefix("librarian")->group(function (){

        $name_prefix="librarian_";

        Route::get('/dashboard', [LibrarianController::class,"index"])->name($name_prefix."dashboard");

        Route::get('/addBook', [AddBookController::class,"index"])->name($name_prefix."addBook"); 
        Route::post('/addBook', [AddBookController::class,"store"]);

        Route::get('/updateLibrarian', [UpdateLibrarianController::class,"index"])->name($name_prefix."updateLibrarian"); 
        Route::post('/updateLibrarian', [UpdateLibrarianController::class,"store"]);

        Route::get('/ebookRequests', [EBookRequestsController::class,"index"])->name($name_prefix."ebookRequests"); 

        Route::get('/ebookRequest/{book}', [EBookRequestController::class,"index"])->name($name_prefix."ebookRequest"); 
        Route::get('/ebookRequest/{book}/store', [EBookRequestController::class,"store"])->name($name_prefix."ebookRequestStore");
        Route::get('/ebookRequest/{book}/remove', [EBookRequestController::class,"remove"])->name($name_prefix."ebookRequestRemove");

        Route::get('/books', [BooksController::class,"index"])->name($name_prefix."books");

        Route::get('/book/{book}', [BookController::class,"index"])->name($name_prefix."book");
        Route::post('/book/{book}', [BookController::class,"store"]);

        Route::get('/ebooks', [EBooksController::class,"index"])->name($name_prefix."ebooks");

        Route::get('/ebook/{book}', [EBookController::class,"index"])->name($name_prefix."ebook");

        Route::get('/librarians', [LibrariansController::class,"index"])->name($name_prefix."librarians");

        Route::get('/librarian/{librarian}', [LibrarianController::class,"get"])->name($name_prefix."librarian");

        Route::get('/users', [UsersController::class,"index"])->name($name_prefix."users");

        Route::get('/user/{user}', [UserController::class,"index"])->name($name_prefix."user");

        Route::get('/logout', [LogoutController::class,"store"])->name($name_prefix."logout");
    });
});

