<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class BookController extends Controller
{





    public function book(Request $request, $id) {

        $book = Book::all()->where('id', $id)->first();

        return view('book.book-description', [
            'book' => $book,
        ]);

    }

    public function all() {

        return view('book.books', [
            'books' => Book::all(),
        ]);
    }

    public function byGenre(Request $request, $id) {

        $genre = Genre::all()->where('id', $id)->first();


        return view('book.books', [
            'books' => $genre->books,
        ]);

    }

    public function search(Request $request){
        $search = $request->input('book-search');

        $resultBookSearch = Book::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('authors', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->orWhere('isbn', 'LIKE', "%{$search}%")
            ->get();

        return view('book.books', [
            'books' => $resultBookSearch,
        ]);
    }


}
