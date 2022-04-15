@extends('layouts.app')

@section('content')

    <div class="h1 p-4">Edit Genre</div>


    <form action="{{ route('update-genre',  ['id' =>$genre->id]) }}" method="POST" class="align-content-center m-5">
        @csrf
        @method('put')

        <div class="form-group mt-4">
            <label for="name">Genre name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name', $genre['name']) }}">
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mt-4">



            <label for="style">Service Status</label>

            <select name="style" class="form-control @error('style') is-invalid @enderror" id="style">
                <option value="primary" {{ old('style',  $genre['style']) == "primary" ? "selected" : '' }}>primary</option>
                <option value="secondary" {{ old('style',  $genre['style']) == "secondary" ? "selected" : ''}}>secondary</option>
                <option value="success"{{ old('style',  $genre['style']) == "success" ? "selected" : ''}}>success</option>
                <option value="danger" {{ old('style',  $genre['style']) == "danger" ? "selected" : ''}}>danger</option>
                <option value="warning" {{ old('style',  $genre['style']) == "warning" ? "selected" : ''}}>warning</option>
                <option value="info" {{ old('style',  $genre['style']) == "info" ? "selected" : ''}}>info</option>
                <option value="light" {{ old('style',  $genre['style']) == "light" ? "selected" : ''}}>light</option>
                <option value="dark" {{ old('style',  $genre['style']) == "dark" ? "selected" : ''}}>dark</option>
            </select>



            @error('style')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group  mt-4">
            <button type="submit" class="btn btn-primary w-100">Edit genre</button>
        </div>

    </form>



@endsection
