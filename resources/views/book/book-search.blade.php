@extends('layouts.app')

@section('content')

    <div class="m-5">

        @if($resultBookSearch->isNotEmpty())
            @foreach($resultBookSearch as $book)
                {{ $book }} <br>
            @endforeach
        @else
            Any results founds
        @endif

    </div>

@endsection
