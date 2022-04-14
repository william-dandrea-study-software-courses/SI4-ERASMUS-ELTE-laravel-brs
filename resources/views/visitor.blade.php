@extends('layouts.app')

@section('content')

    <div class="m-5">
        {{ $numberOfUsersInTheSystem }} Users in the system <br>
        {{ $numberOfGenres }} Genres in the system<br>
        {{ $numberOfBooks }} Books in the system<br>
        {{ $numberOfActiveBookRentals }} Active rentals in the system<br>

        @foreach($listOfGenres as $genre)
            {{ $genre->name }} : {{ $genre->books->count() }} Books ( {{ $genre->id }} ) <br>
        @endforeach
    </div>

@endsection
