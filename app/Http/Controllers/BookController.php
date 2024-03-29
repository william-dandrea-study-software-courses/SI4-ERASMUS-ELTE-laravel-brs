<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookFormRequest;
use App\Http\Requests\GenreFormRequest;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\Genre;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;
use Symfony\Component\Console\Input\Input;

class BookController extends Controller
{


    public function editPage($bookId) {
        $book = Book::findOrFail($bookId);

        $allGenres = Genre::all();
        $genresUser = $book->genres;

        return view('book.book-edit', [
            'allGenres' => $allGenres,
            'genresUser' => $genresUser,
            'book' => $book,
        ]);

    }


    public function update(BookFormRequest $request, $bookId) {

        $book = Book::findOrFail($bookId);
        $book->update($request->validated());

        $book->genres()->detach();

        $book->genres()->attach($request->input("genres"));

        return redirect()->route('books');
    }

    public function create() {
        $genres = Genre::all();

        return view('book.bookcreate', [
            'genres' => $genres,
        ]);
    }


    public function store(BookFormRequest $request) {
        $data = $request->validated();

        // dd($request->input("genres"));

        // $data->genres()->attach($request->input("genres"));
        Book::create($data);

        $lastBook = Book::all()->last();
        $lastBook->genres()->attach($request->input("genres"));



        return redirect()->route('books');
    }



    public function destroy($bookId) {
        $book = Book::findOrFail($bookId);
        $book->delete();
        return redirect()->route('books');
    }


    public function oneBook(Request $request, $id) {

        $book = Book::findOrFail($id);

        $borrowed = null;
        $user = 0;

        if (auth()->user()) {
            $user = auth()->user()->isLibrarian() ? 2 : 1;

            $borrowed = Borrow::all()
                ->where('reader_id', '=', auth()->user()->id)
                ->where('book_id', '=', $id)
                ->sortBy('deadline', SORT_NATURAL);


            $borrowed = $borrowed->first();
            if ($borrowed) {
                $borrowed = $borrowed->status;
            }
        }


        return view('book.book-description', [
            'book' => $book,
            'user' => $user,
            'borrowed_by_current_user' => $borrowed,
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
