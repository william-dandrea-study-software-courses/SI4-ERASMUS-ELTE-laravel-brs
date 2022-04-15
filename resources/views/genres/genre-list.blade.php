

@extends('layouts.app')

@section('content')

    <div class="h1 p-4">Genre</div>

    <button type="button" class="btn btn-primary m-1">Add new genre</button>


    <div class="card w-100 m-5">
        <ul class="list-group list-group-flush">
            @foreach($genres as $genre)
                <li class="list-group-item">
                    <p>Name : {{ $genre->name }}</p>
                    <p>Style : {{ $genre->style }}</p>


                    <button type="button" class="btn btn-warning">Edit Genre</button>

                    <form action="{{ route('delete-genre', ['id' =>$genre->id]) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete Genre</button>
                    </form>

                </li>

            @endforeach


        </ul>
    </div>

@endsection
