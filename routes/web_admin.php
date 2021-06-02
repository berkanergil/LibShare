<?php

use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\BookController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\BooksController;
use App\Http\Controllers\admin\EBookController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\EBooksController;
use App\Http\Controllers\admin\LogoutController;
use App\Http\Controllers\admin\ManagerController;
use App\Http\Controllers\admin\ManagersController;
use App\Http\Controllers\admin\AddManagerController;
use App\Http\Controllers\admin\LibrarianController;
use App\Http\Controllers\admin\LibrariansController;
use App\Http\Controllers\admin\UpdateAdminController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\UsersController;
use App\Models\Librarian;


Route::prefix("admin")->group(function(){
    Route::get('/login', [LoginController::class,"index"])->name("admin_login");
    Route::post('/login', [LoginController::class,"store"]);    
});



Route::group(["middleware"=>"adminAuth"],function(){
    Route::prefix("admin")->group(function (){
        $name_prefix="admin_";
        Route::get('/dashboard', [AdminController::class,"index"])->name($name_prefix."dashboard");

        Route::get('/addManager', [AddManagerController::class,"index"])->name($name_prefix."addManager");
        Route::post('/addManager', [AddManagerController::class,"store"]);

        Route::get('/updateAdmin', [UpdateAdminController::class,"index"])->name($name_prefix."updateAdmin");
        Route::post('/updateAdmin', [UpdateAdminController::class,"store"]);

        Route::get('/managers', [ManagersController::class,"index"])->name($name_prefix."managers");

        Route::get('/manager/{manager}', [ManagerController::class,"index"])->name($name_prefix."manager");
        Route::post('/manager', [ManagerController::class,"store"])->name($name_prefix."update_manager");

        Route::get('/librarians', [LibrariansController::class,"index"])->name($name_prefix."librarians");

        Route::get('/librarian/{librarian:username}', [LibrarianController::class,"index"])->name($name_prefix."librarian");

        Route::get('/users', [UsersController::class,"index"])->name($name_prefix."users");

        Route::get('/user/{user:username}', [UserController::class,"index"])->name($name_prefix."user");

        Route::get('/logout', [LogoutController::class,"store"])->name($name_prefix."logout");

        Route::get('/ebooks',[EBooksController::class,"index"])->name($name_prefix."ebooks");

        Route::get('/ebook/{book:title}',[EBookController::class,"index"])->name($name_prefix."ebook");

        Route::get('/books', [BooksController::class,"index"])->name($name_prefix."books");

        Route::get('/book/{book:title}', [BookController::class,"index"])->name($name_prefix."book");
    }); 
});

