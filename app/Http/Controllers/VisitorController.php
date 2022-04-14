<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\Genre;
use App\Models\User;
use Illuminate\Http\Request;

class VisitorController extends Controller
{


    /**
     *  Number of users in the system
     *  Number of genres
     *  Number of books
     *  Number of active book rentals (in accepted status)
     *  List of genres. Each list item must be a link, referring to the List by genre page.
     *  Search for books. See Search.
     */

    public function view() {
        return view('visitor', [
            'numberOfUsersInTheSystem' => User::all()->count(),
            'numberOfGenres' => Genre::all()->count(),
            'numberOfBooks' => Book::all()->count(),
            'numberOfActiveBookRentals' => Borrow::getActiveBookRentals()->count(),
            'listOfGenres' => ['yo', 'yo2']
        ]);
    }
}
