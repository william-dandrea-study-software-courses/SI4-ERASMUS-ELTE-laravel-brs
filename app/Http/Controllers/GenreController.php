<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenreFormRequest;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{

    public function store(GenreFormRequest $request) {
        $data = $request->validated();
        Genre::create($data);
        return redirect()->route('genres');
    }


    public function index() {
        return view('genres.genre-list', [
            'genres' => Genre::all(),
        ]);
    }

    public function destroy($id) {
        $genre = Genre::findOrFail($id);
        $genre->delete();
        return redirect()->route('genres');
    }

    public function create() {
        return view('genres.genre-create');
    }






}
