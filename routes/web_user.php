<?php

use App\Http\Controllers\user\AddEBookRequestController;
use App\Http\Controllers\user\BookController;
use App\Http\Controllers\user\BooksController;
use App\Http\Controllers\user\EBookController;
use App\Http\Controllers\user\EBooksController;
use App\Http\Controllers\user\LibBasketController;
use App\Http\Controllers\user\LoginController;
use App\Http\Controllers\user\LogoutController;
use App\Http\Controllers\user\RegisterController;
use App\Http\Controllers\user\ReserveBookController;
use App\Http\Controllers\user\ReservedBooksController;
use App\Http\Controllers\user\SettingsController;
use App\Http\Controllers\user\UpdateUserController;
use App\Http\Controllers\user\UpdateCardController;
use App\Http\Controllers\user\UserController;
use Illuminate\Support\Facades\Route;




Route::prefix("user")->group(function(){
    Route::get('/login', [LoginController::class,"index"])->name("user_login");
    Route::post('/login', [LoginController::class,"store"]);
    Route::get('/register', [RegisterController::class,"index"])->name("user_register");
    Route::post('/register', [RegisterController::class,"store"]);    
});



Route::group(["middleware"=>"userAuth"],function () {
    
Route::prefix("user")->group(function (){

    $name_prefix="user_";

    Route::get('/dashboard', [UserController::class,"index"])->name($name_prefix."dashboard");

    Route::get('/settings', [SettingsController::class,"index"])->name($name_prefix."settings");

    Route::get('/books', [BooksController::class,"index"])->name($name_prefix."books");

    Route::get('/libbasket', [LibBasketController::class,"index"])->name($name_prefix."libbasket");

    Route::get('/reservebook/{book:saved_book_id}', [ReserveBookController::class,"index"])->name($name_prefix."reservebook");
    Route::post('/reservebook', [ReserveBookController::class,"store"])->name($name_prefix."reservebook_store");

    Route::get("/reservedbooks",[ReservedBooksController::class,"index"])->name($name_prefix."reservedbooks");

    Route::get("/addEBookDonation",[AddEBookRequestController::class,"index"])->name($name_prefix."addEBookRequest");
    Route::post("/addEBookDonation",[AddEBookRequestController::class,"store"]);

    Route::get("/updateUser",[UpdateUserController::class,"index"])->name($name_prefix."updateUser");
    Route::post("/updateUser",[UpdateUserController::class,"store"]);

    Route::get("/updateCard",[UpdateCardController::class,"index"])->name($name_prefix."updateCard");
    Route::post("/updateCard",[UpdateCardController::class,"store"]);
    
    Route::get('/book/{book:title}', [BookController::class,"index"])->name($name_prefix."book");
    Route::post('/book/store', [BookController::class,"store"])->name($name_prefix."book_store");

    Route::get('/ebooks',[EBooksController::class,"index"])->name($name_prefix."ebooks");

    Route::get('/ebook/{book:title}',[EBookController::class,"index"])->name($name_prefix."ebook");

    Route::get('/logout', [LogoutController::class,"store"])->name($name_prefix."logout");
});

});