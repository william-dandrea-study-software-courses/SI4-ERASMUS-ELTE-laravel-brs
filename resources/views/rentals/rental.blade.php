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


    @if(auth()->user()->isLibrarian())


        <form action="{{ route('borrow-edit', ['id' =>$borrow->id]) }}" method="POST" class="align-content-center m-5">
            @csrf
            @method('put')

            <div class="form-group mt-4">
                <label for="deadline">Date deadline</label>
                <input type="date" name="deadline" class="form-control @error('deadline') is-invalid @enderror" id="deadline" value="{{ old('deadline', '') }}">
                @error('deadline')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group mt-4">
                <label for="status">Status</label>

                <select name="status" class="form-control @error('status') is-invalid @enderror" id="status">
                    <option value="PENDING" {{ old('status') == "PENDING" ? "selected" : '' }}>PENDING</option>
                    <option value="ACCEPTED" {{ old('status') == "ACCEPTED" ? "selected" : ''}}>ACCEPTED</option>
                    <option value="REJECTED"{{ old('status') == "REJECTED" ? "selected" : ''}}>REJECTED</option>
                    <option value="RETURNED" {{ old('status') == "RETURNED" ? "selected" : ''}}>RETURNED</option>
                </select>

                @error('status')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group  mt-4">
                <button type="submit" class="btn btn-primary w-100">Edit this borrow</button>
            </div>

        </form>


    @endif







@endsection
