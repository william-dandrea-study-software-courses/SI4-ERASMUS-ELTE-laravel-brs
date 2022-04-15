<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class  BorrowController extends Controller
{


    public function librarianManageAllRentals() {

        $pendingRental = Book::join('borrows', 'books.id', '=', 'borrows.book_id')
            ->where('borrows.status', '=', 'PENDING')
            ->get(['books.id AS book_id', 'borrows.id AS borrow_id', 'borrows.request_processed_at', 'borrows.deadline', 'books.title', 'books.authors']);

        $acceptedAndInTimeRentals = Book::join('borrows', 'books.id', '=', 'borrows.book_id')
            ->where('borrows.status', '=', 'ACCEPTED')
            ->where('borrows.deadline', '>', now()->timestamp)
            ->get(['books.id AS book_id', 'borrows.id AS borrow_id', 'borrows.request_processed_at', 'borrows.deadline', 'books.title', 'books.authors']);

        $acceptedLateRentals = Book::join('borrows', 'books.id', '=', 'borrows.book_id')
            ->where('borrows.status', '=', 'ACCEPTED')
            ->where('borrows.deadline', '<', now()->timestamp)
            ->get(['books.id AS book_id', 'borrows.id AS borrow_id', 'borrows.request_processed_at', 'borrows.deadline', 'books.title', 'books.authors']);

        $rejectedRentals = Book::join('borrows', 'books.id', '=', 'borrows.book_id')
            ->where('borrows.status', '=', 'REJECTED')
            ->get(['books.id AS book_id', 'borrows.id AS borrow_id', 'borrows.request_processed_at', 'borrows.deadline', 'books.title', 'books.authors']);

        $returnedRentals = Book::join('borrows', 'books.id', '=', 'borrows.book_id')
            ->where('borrows.status', '=', 'RETURNED')
            ->get(['books.id AS book_id', 'borrows.id AS borrow_id', 'borrows.request_processed_at', 'borrows.deadline', 'books.title', 'books.authors']);



        return view('rentals.manage-all-rentals', [
            'pendingRentals' => $pendingRental,
            'acceptedAndInTimeRentals' => $acceptedAndInTimeRentals,
            'acceptedLateRentals' => $acceptedLateRentals,
            'rejectedRentals' => $rejectedRentals,
            'returnedRentals' => $returnedRentals,
        ]);

    }


    public function select(Request $request, $id) {

        $borrow = Borrow::all()
            ->where('id', '=', $id)
            ->first();



        $book = Book::all()
            ->where('id', '=', $borrow->book_id)
            ->first();

        $reader = User::all()->where('id', '=', $borrow->reader_id)->first();



        $pendingLibrarian = null;
        $returnedLibrarian = null;

        if ($borrow->status != 'PENDING') {
            $pendingLibrarian = User::all()->where('id', '=', $borrow->request_managed_by)->first();
        }

        if ($borrow->status != 'RETURNED') {
            $returnedLibrarian = User::all()->where('id', '=', $borrow->return_managed_by)->first();
        }

        return view('rentals.rental', [
            'borrow' => $borrow,
            'book' => $book,
            'reader' => $reader,
            'pendingLibrarian' => $pendingLibrarian,
            'returnedLibrarian' => $returnedLibrarian,
        ]);

    }


    public function all() {

        // title, author, date of rental, and the deadline


        $pendingRental = Book::join('borrows', 'books.id', '=', 'borrows.book_id')
            ->where('borrows.reader_id', '=', auth()->user()->id)
            ->where('borrows.status', '=', 'PENDING')
            ->get(['books.id AS book_id', 'borrows.id AS borrow_id', 'borrows.request_processed_at', 'borrows.deadline', 'books.title', 'books.authors']);

        $acceptedAndInTimeRentals = Book::join('borrows', 'books.id', '=', 'borrows.book_id')
            ->where('borrows.reader_id', '=', auth()->user()->id)
            ->where('borrows.status', '=', 'ACCEPTED')
            ->where('borrows.deadline', '>', now()->timestamp)
            ->get(['books.id AS book_id', 'borrows.id AS borrow_id', 'borrows.request_processed_at', 'borrows.deadline', 'books.title', 'books.authors']);

        $acceptedLateRentals = Book::join('borrows', 'books.id', '=', 'borrows.book_id')
            ->where('borrows.reader_id', '=', auth()->user()->id)
            ->where('borrows.status', '=', 'ACCEPTED')
            ->where('borrows.deadline', '<', now()->timestamp)
            ->get(['books.id AS book_id', 'borrows.id AS borrow_id', 'borrows.request_processed_at', 'borrows.deadline', 'books.title', 'books.authors']);

        $rejectedRentals = Book::join('borrows', 'books.id', '=', 'borrows.book_id')
            ->where('borrows.reader_id', '=', auth()->user()->id)
            ->where('borrows.status', '=', 'REJECTED')
            ->get(['books.id AS book_id', 'borrows.id AS borrow_id', 'borrows.request_processed_at', 'borrows.deadline', 'books.title', 'books.authors']);

        $returnedRentals = Book::join('borrows', 'books.id', '=', 'borrows.book_id')
            ->where('borrows.reader_id', '=', auth()->user()->id)
            ->where('borrows.status', '=', 'RETURNED')
            ->get(['books.id AS book_id', 'borrows.id AS borrow_id', 'borrows.request_processed_at', 'borrows.deadline', 'books.title', 'books.authors']);


        return view('rentals.rentals-reader', [
            'pendingRentals' => $pendingRental,
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
