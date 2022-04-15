@extends('layouts.app')

@section('content')



    <div class="container">
        <div class="row align-items-start">
            <div class="col">
                <img src="{{$book->cover_image}}" class="img-fluid" alt="...">
            </div>
            <div class="col">

                @if($user != 0)

                    <div class="card m-5">

                        @if($user == 1)

                            @if($borrowed_by_current_user != null)
                                You borrowed this book, status : {{ $borrowed_by_current_user }}
                            @else
                                <form action="{{ route('borrow-new-book', ['bookId' => $book['id']]) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-primary" type="submit">Borrow book</button>
                                </form>

                            @endif



                        @else
                            <button type="button" class="btn btn-secondary">Edit book</button>
                            <button type="button" class="btn btn-danger">Delete book</button>
                        @endif


                    </div>
                @endif


                <div class="card">
                    <div class="card-header"><h3 class="card-title ">{{$book->title}}</h3></div>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <h5>Author :</h5> <p>{{$book->authors}}</p>
                            <h5>Date :</h5> <p>{{$book->released_at}}</p>
                        </li>
                        <li class="list-group-item">
                            <h5>Genres :</h5><p>@foreach($book->genres as $gr){{ $gr->name }}  @endforeach</p>
                        </li>
                        <li class="list-group-item">
                            <h5>Description :</h5><p>{{$book->description}}</p>
                        </li>
                        <li class="list-group-item">
                            <h5>Number of pages :</h5> <p>{{$book->pages}}</p>
                            <h5>Language :</h5> <p>{{$book->language_code}}</p>
                            <h5>ISBN :</h5> <p>{{$book->isbn}}</p>
                            <h5>In stock :</h5> <p>{{$book->in_stock}}</p>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>


@endsection
