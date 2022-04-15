<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{


    public function index()
    {
        return view('genres.genre-list', [
            'genres' => Genre::all(),
        ]);
    }

    public function destroy($id) {
        $genre = Genre::findOrFail($id);
        $genre->delete();
        return redirect()->route('genres');
    }







}
