@extends('layouts.app')

@section('content')

    <div class="h1 p-4">My Rental - {{$book->title}}</div>

    <div class="card m-5">
        <div class="card-header">
            <h5 class="card-title">Book</h5>
        </div>
        <div class="card-body">
            <p>Title : {{$book->title}}</p>
            <p>Author : {{$book->authors}}</p>
            <p>Date : {{$book->released_at}}</p>
        </div>
        <a href="{{ url('/book/'.$book->id) }}" class="btn btn-primary m-3">See book</a>
    </div>

    <div class="card m-5">
        <div class="card-header">
            <h5 class="card-title">Rental</h5>
        </div>
        <div class="card-body">
            <p>Borrower Reader : {{$reader->name}}</p>
            <p>Date Rental Request : {{$borrow->created_at}}</p>
            <p>Status : {{$borrow->status}}</p>

            @if($pendingLibrarian)
                <p>Pending processes by : {{$pendingLibrarian->name}}</p>
            @endif

            @if($returnedLibrarian)
                <p>Returned processes by : {{$returnedLibrarian->name}}</p>
            @endif

        </div>
    </div>


@endsection
