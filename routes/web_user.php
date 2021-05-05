<?php

use App\Http\Controllers\user\AddCardController;
use App\Http\Controllers\user\BookController;
use App\Http\Controllers\user\BooksController;
use App\Http\Controllers\user\LoginController;
use App\Http\Controllers\user\LogoutController;
use App\Http\Controllers\user\RegisterController;
use App\Http\Controllers\user\SettingsController;
use App\Http\Controllers\user\UserController;
use App\Models\Book;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;

Route::prefix("user")->group(function (){

        $name_prefix="user_";

        Route::get('/dashboard', [UserController::class,"index"])->name($name_prefix."dashboard");

        Route::get('/login', [LoginController::class,"index"])->name($name_prefix."login");
        Route::post('/login', [LoginController::class,"store"]);

        Route::get('/register', [RegisterController::class,"index"])->name($name_prefix."register");
        Route::post('/register', [RegisterController::class,"store"]);

        Route::get('/addCard', [AddCardController::class,"index"])->name($name_prefix."addCard");
        Route::post('/addCard', [AddCardController::class,"store"]);

        Route::get('/settings', [SettingsController::class,"index"])->name($name_prefix."settings");

        Route::get('/books', [BooksController::class,"index"])->name($name_prefix."books");
        
        Route::get('/book/{book:title}', [BookController::class,"index"])->name($name_prefix."book");

        Route::get('/logout', [LogoutController::class,"store"])->name($name_prefix."logout");
    });
