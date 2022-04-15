@extends('layouts.app')

@section('content')

    <div class="m-5">


        @if(count($books) != 0)
            <div class="row hidden-md-up">
            @foreach($books as $book)

                <div class="card col-md-4 m-3" style="width: 18rem;">
                    <img src="{{$book['cover_image'] ?: 'https://unsplash.com/photos/MDRlEdVTbPo/download?ixid=MnwxMjA3fDB8MXxzZWFyY2h8Mnx8Ym9vayUyMGljb258ZW58MHx8fHwxNjUwMDI1NDAy&force=true&w=640' }}" class="card-img-top m-1" alt="...">
                    <div class="card-body m-2">
                        <h5 class="card-title m-1">{{ $book['title'] }}</h5>
                        <blockquote class="blockquote m-2">
                            <div class="blockquote-footer">{{ $book['authors'] }}</div>
                        </blockquote>
                        <p class="card-header-tabs m-1"> @foreach($book->genres as $gr){{ $gr->name }}  @endforeach | {{ $book['released_at'] }}</p>
                        <p class="card-footer">{{ $book['description'] }}</p>
                        <a href="{{ url('/book/'.$book->id) }}" class="btn btn-primary">Discover</a>
                    </div>
                </div>


            @endforeach
            </div>

        @else
                Any books founds
        @endif
    </div>

@endsection
