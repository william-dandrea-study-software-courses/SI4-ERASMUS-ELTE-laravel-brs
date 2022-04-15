@extends('layouts.app')

@section('content')



    <div class="m-5 row">

        <div class="card col m-1">
            <div class="card-body">
                <h5 class="card-title card-header">Number of users in the system</h5>
                <h6 class="card-subtitle m-2">{{ $numberOfUsersInTheSystem }}</h6>
            </div>
        </div>

        <div class="card col m-1">
            <div class="card-body">
                <h5 class="card-title card-header">Number of genres in the system</h5>
                <h6 class="card-subtitle m-2">{{ $numberOfGenres }}</h6>

                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @foreach($listOfGenres as $genre)

                            <li class="list-group-item">
                                <a href="{{ url('books-genre/'.$genre->id) }}">{{ $genre->name }}</a> : {{ $genre->books->count() }} books
                            </li>

                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="card col m-1">
            <div class="card-body">
                <h5 class="card-title card-header">Number of books in the system</h5>
                <h6 class="card-subtitle m-2">{{ $numberOfBooks }}</h6>
            </div>
        </div>

        <div class="card col m-1">
            <div class="card-body">
                <h5 class="card-title card-header">Number of active rentals in the system</h5>
                <h6 class="card-subtitle m-2">{{ $numberOfActiveBookRentals }}</h6>
            </div>
        </div>





    </div>

@endsection
