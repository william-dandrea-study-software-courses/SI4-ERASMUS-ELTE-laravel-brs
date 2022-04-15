<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VisitorController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',  [VisitorController::class, 'view']);

Auth::routes();



// Route::get('/books-genre/{id}', [BookController::class, 'byGenre'])->name('books-by-genre');
Route::get('/books-genre/{id}', [BookController::class, 'byGenre'])->name('books-by-genre');
Route::get('/books', [BookController::class, 'all'])->name('books');
Route::get('/book-search/', [BookController::class, 'search'])->name('book-search');
Route::get('/book/{id}', [BookController::class, 'book']);


Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});




