<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::match(["GET", "POST"], "/register", function(){
    return redirect("/login");
})->name("register");

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource("users", UserController::class);

Route::get('/categories/trash', [CategoryController::class, 'trash'])->name('categories.trash');

Route::get('/categories/{id}/restore', [CategoryController::class, 'restore'])->name('categories.restore');

Route::delete('/categories/{category}/delete-permanent', [CategoryController::class, 'deletePermanent'])->name('categories.delete-permanent');

Route::resource('categories', CategoryController::class);

Route::post('/books/{book}/restore', [BookController::class, 'restore'])->name('books.restore');

Route::delete('/books/{id}/delete-permanent', [BookController::class, 'deletePermanent'])->name('books.delete-permanent');

Route::get('/books/trash', [BookController::class, 'trash'])->name('books.trash');

Route::resource('books', BookController::class);

Route::get('/ajax/categories/search', [CategoryController::class, 'ajaxSearch']);

Route::resource('orders', OrderController::class);
