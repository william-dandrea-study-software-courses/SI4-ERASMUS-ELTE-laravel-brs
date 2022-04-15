<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenreFormRequest;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{

    public function edit($genreId) {
        $genre = Genre::findOrFail($genreId);

        return view('genres.genre-edit', [
            'genre' => $genre,
        ]);
    }

    public function update(GenreFormRequest $request, $genreId) {

        $genre = Genre::findOrFail($genreId);
        $genre->update($request->validated());

        return redirect()->route('genres');
    }

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
