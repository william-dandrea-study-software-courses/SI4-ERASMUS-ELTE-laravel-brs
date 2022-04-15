<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class  BorrowController extends Controller
{


    public function select(Request $request, $id) {


        return view('rentals.rental');

    }


    public function all() {

        // title, author, date of rental, and the deadline


        $pendingBooks = Book::join('borrows', 'books.id', '=', 'borrows.book_id')
            ->where('borrows.reader_id', '=', auth()->user()->id)
            ->where('borrows.status', '=', 'PENDING')
            ->get(['borrows.id', 'borrows.request_processed_at', 'borrows.deadline', 'books.title', 'books.authors']);

        $acceptedAndInTimeRentals = Book::join('borrows', 'books.id', '=', 'borrows.book_id')
            ->where('borrows.reader_id', '=', auth()->user()->id)
            ->where('borrows.status', '=', 'ACCEPTED')
            ->where('borrows.deadline', '>', now())
            ->get(['borrows.id', 'borrows.request_processed_at', 'borrows.deadline', 'books.title', 'books.authors']);

        $acceptedLateRentals = Book::join('borrows', 'books.id', '=', 'borrows.book_id')
            ->where('borrows.reader_id', '=', auth()->user()->id)
            ->where('borrows.status', '=', 'ACCEPTED')
            ->where('borrows.deadline', '<', now())
            ->get(['borrows.id', 'borrows.request_processed_at', 'borrows.deadline', 'books.title', 'books.authors']);

        $rejectedRentals = Book::join('borrows', 'books.id', '=', 'borrows.book_id')
            ->where('borrows.reader_id', '=', auth()->user()->id)
            ->where('borrows.status', '=', 'REJECTED')
            ->get(['borrows.id', 'borrows.request_processed_at', 'borrows.deadline', 'books.title', 'books.authors']);

        $returnedRentals = Book::join('borrows', 'books.id', '=', 'borrows.book_id')
            ->where('borrows.reader_id', '=', auth()->user()->id)
            ->where('borrows.status', '=', 'RETURNED')
            ->get(['borrows.id', 'borrows.request_processed_at', 'borrows.deadline', 'books.title', 'books.authors']);


        return view('rentals.rentals-reader', [
            'pendingBooks' => $pendingBooks,
            'acceptedAndInTimeRentals' => $acceptedAndInTimeRentals,
            'acceptedLateRentals' => $acceptedLateRentals,
            'rejectedRentals' => $rejectedRentals,
            'returnedRentals' => $returnedRentals,
        ]);

    }


    public function create(Request $request, $bookId) {


        $borrowed = Borrow::all()
            ->where('reader_id', '=', auth()->user()->id)
            ->where('book_id', '=', $bookId)
            ->sortBy('deadline', SORT_NATURAL);

        foreach ($borrowed as $brw) {
            if ($brw->status != 'RETURNED') {
                return response()->setStatusCode(401);
            }
        }


        Borrow::create([
            'reader_id' => auth()->user()->id,
            'book_id' => $bookId,
            'status' => 'PENDING',
            'request_processed_at' => null,
            'request_managed_by' => null,
            'deadline' => null,
            'return_managed_by' => null,
        ]);

        return redirect("/book/{$bookId}");
    }



}
