<?php

use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\manager\BookController;
use App\Http\Controllers\manager\UserController;
use App\Http\Controllers\manager\BooksController;
use App\Http\Controllers\manager\EBookController;
use App\Http\Controllers\manager\LoginController;
use App\Http\Controllers\manager\UsersController;
use App\Http\Controllers\manager\EBooksController;
use App\Http\Controllers\manager\LogoutController;
use App\Http\Controllers\manager\ManagerController;
use App\Http\Controllers\manager\CategoryController;
use App\Http\Controllers\manager\ManagersController;
use App\Http\Controllers\manager\LibrarianController;
use App\Http\Controllers\manager\CategoriesController;
use App\Http\Controllers\manager\LibrariansController;
use App\Http\Controllers\manager\AddCategoryController;
use App\Http\Controllers\manager\AddLibrarianController;
use App\Http\Controllers\manager\UpdateManagerController;

Route::prefix("manager")->group(function(){
    Route::get('/login', [LoginController::class,"index"])->name("manager_login");
    Route::post('/login', [LoginController::class,"store"]);    
});


Route::group(["middleware"=>"managerAuth"],function () {
    Route::prefix("manager")->group(function (){
        $name_prefix="manager_";

        Route::get('/dashboard', [ManagerController::class,"index"])->name($name_prefix."dashboard");



        Route::get('/logout', [LogoutController::class,"store"])->name($name_prefix."logout");

        Route::get('/librarians', [LibrariansController::class,"index"])->name($name_prefix."librarians");

        Route::get('/librarian/{librarian}', [LibrarianController::class,"index"])->name($name_prefix."librarian");
        Route::post('/librarian', [LibrarianController::class,"store"])->name($name_prefix."update_librarian");

        Route::get('/addLibrarian', [AddLibrarianController::class,"index"])->name($name_prefix."addLibrarian");
        Route::post('/addLibrarian', [AddLibrarianController::class,"store"]);

        Route::get('/addCategory', [AddCategoryController::class,"index"])->name($name_prefix."addCategory");
        Route::post('/addCategory', [AddCategoryController::class,"store"]);

        Route::get('/updateManager', [UpdateManagerController::class,"index"])->name($name_prefix."updateManager");
        Route::post('/updateManager', [UpdateManagerController::class,"store"]);

        Route::get('/categories',[CategoriesController::class,"index"])->name($name_prefix."categories");

        Route::get('/category/{category}',[CategoryController::class,"index"])->name($name_prefix."category");
        Route::post('/category',[CategoryController::class,"store"])->name($name_prefix."update_category");
        
        Route::get('/ebooks',[EBooksController::class,"index"])->name($name_prefix."ebooks");

        Route::get('/ebook/{book:title}',[EBookController::class,"index"])->name($name_prefix."ebook");

        Route::get('/books', [BooksController::class,"index"])->name($name_prefix."books");

        Route::get('/book/{book:title}', [BookController::class,"index"])->name($name_prefix."book");

        Route::get('/users', [UsersController::class,"index"])->name($name_prefix."users");

        Route::get('/user/{user:username}', [UserController::class,"index"])->name($name_prefix."user");

        Route::get("/managers",[ManagersController::class,"index"])->name($name_prefix."managers");
        Route::get("/managers/{manager}",[ManagerController::class,"get"])->name($name_prefix."manager");

    });
});
