<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use Illuminate\Http\Request;

class BorrowController extends Controller
{




    public function all() {

        return view('user.rentals');

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
