@extends('layouts.app')

@section('content')

    <div class="m-5">


        @if(count($books) != 0)
            @foreach($books as $book)
                {{ $book }} <br>
            @endforeach
        @else
                Any books founds
        @endif
    </div>

@endsection
