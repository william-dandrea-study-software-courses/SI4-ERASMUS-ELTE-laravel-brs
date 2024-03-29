<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\VisitorController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

/* /\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/
I did not use the "Route::view" feature because I prefer to have a global overview of all my routes, and middleware,
here. So I voluntarily implemented all the routes here
/* /\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/*/

Route::get('/',  [VisitorController::class, 'view'])->name('main-home');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/profil', [ProfilController::class, 'index'])->name('profil');


    Route::put('/borrow/edit/{id}', [BorrowController::class, 'edit'])->name('borrow-edit')->middleware('isLibrarian');
    Route::post('/borrow/create/{bookId}', [BorrowController::class, 'create'])->name('borrow-new-book')->middleware('isUserAndNotLibrarian');
    Route::get('/rentals', [BorrowController::class, 'all'])->name('rentals-user')->middleware('isUserAndNotLibrarian');

    Route::get('/rentals/manage-all-rentals',  [BorrowController::class, 'librarianManageAllRentals'])->name('manage-all-rentals')->middleware('isLibrarian');
    Route::get('/rentals/{id}', [BorrowController::class, 'select'])->name('rental');

    Route::get('/book/create', [BookController::class, 'create'])->name('create-book')->middleware('isLibrarian');
    Route::get('/book/edit/{id}', [BookController::class, 'editPage'])->name('edit-book')->middleware('isLibrarian');
    Route::put('/book/update/{id}', [BookController::class, 'update'])->name('update-book')->middleware('isLibrarian');
    Route::post('/book/store', [BookController::class, 'store'])->name('store-book')->middleware('isLibrarian');
    Route::delete('/book/{id}', [BookController::class, 'destroy'])->name('delete-book')->middleware('isLibrarian');

    Route::get('/genres', [GenreController::class, 'index'])->name('genres')->middleware('isLibrarian');
    Route::delete('/genres/destroy/{id}', [GenreController::class, 'destroy'])->name('delete-genre')->middleware('isLibrarian');
    Route::get('/genres/create', [GenreController::class, 'create'])->name('create-genre')->middleware('isLibrarian');
    Route::post('/genres/store', [GenreController::class, 'store'])->name('store-genre')->middleware('isLibrarian');
    Route::put('/genres/update/{id}', [GenreController::class, 'update'])->name('update-genre')->middleware('isLibrarian');
    Route::get('/genres/edit/{id}', [GenreController::class, 'edit'])->name('edit-genre')->middleware('isLibrarian');

});

Route::get('/books-genre/{id}', [BookController::class, 'byGenre'])->name('books-by-genre');
Route::get('/books', [BookController::class, 'all'])->name('books');
Route::get('/book-search/', [BookController::class, 'search'])->name('book-search');
Route::get('/book/{id}', [BookController::class, 'oneBook']);



