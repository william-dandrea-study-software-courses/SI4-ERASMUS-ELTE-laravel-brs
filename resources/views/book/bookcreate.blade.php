@extends('layouts.app')

@section('content')

    <div class="h1 p-4">New Book</div>



    <form action="{{ route('store-book') }}" method="POST" class="align-content-center m-5">
        @csrf

        <div class="form-group mt-4">
            <label for="title">Book title</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title', '') }}">
            @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>


        <div class="form-group mt-4">
            <label for="authors">Book authors</label>
            <input type="text" name="authors" class="form-control @error('authors') is-invalid @enderror" id="authors" value="{{ old('authors', '') }}">
            @error('authors')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mt-4">
            <label for="released_at">Released date</label>
            <input type="date" name="released_at" class="form-control @error('released_at') is-invalid @enderror" id="released_at" value="{{ old('released_at', '') }}">
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mt-4">
            <label for="pages">Number of pages</label>
            <input type="number" name="pages" class="form-control @error('pages') is-invalid @enderror" id="pages" value="{{ old('pages', '') }}">
            @error('pages')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mt-4">
            <label for="isbn">ISBN</label>
            <input type="text" name="isbn" class="form-control @error('isbn') is-invalid @enderror" id="isbn" value="{{ old('isbn', '') }}">
            @error('isbn')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mt-4">
            <label for="description">Description</label>
            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" value="{{ old('description', '') }}"></textarea>
            @error('description')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mt-4">
            <label for="genres[]">Genres : </label>

            @foreach ($genres as $option)
                <input type="checkbox" name="genres[]" value="{{ $option->id }}" {{ $genres->contains('id', $option->id) ? 'checked' : '' }}>{{ $option->name }}
            @endforeach


            @error('genres[]')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mt-4">
            <label for="in_stock">In Stock</label>
            <input type="number" name="in_stock" class="form-control @error('in_stock') is-invalid @enderror" id="in_stock" value="{{ old('in_stock', '') }}">
            @error('in_stock')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>



        <div class="form-group  mt-4">
            <button type="submit" class="btn btn-primary w-100">Add new book</button>
        </div>

    </form>

@endsection
