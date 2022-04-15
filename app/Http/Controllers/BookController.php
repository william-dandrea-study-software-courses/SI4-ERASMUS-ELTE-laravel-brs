<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class BookController extends Controller
{







    public function all() {

        return view('book.books', [
            'books' => Book::all(),
        ]);
    }

    public function byGenre(Request $request, $id) {
        print_r($id);
        return view('book.books', [
            'books' => Book::all(),
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
