

@extends('layouts.app')

@section('content')

    <div class="h1 p-4">Genre</div>


    <form action="{{route('create-genre') }}" method="get">
        @csrf
        <button type="submit" class="btn btn-primary">Add new genre</button>
    </form>


    <div class="card w-100 m-5">
        <ul class="list-group list-group-flush">
            @foreach($genres as $genre)
                <li class="list-group-item">
                    <p>Name : {{ $genre->name }}</p>
                    <p>Style : {{ $genre->style }}</p>


                    <form action="{{ route('edit-genre', ['id' =>$genre->id]) }}" method="get">
                        @csrf
                        <button type="submit" class="btn btn-warning">Edit Genre</button>
                    </form>


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
