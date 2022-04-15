@extends('layouts.app')

@section('content')

<div class="m-5">

    <div class="card">
        <div class="card-header">
            {{ $name }}
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $email }}</h5>
            <p class="card-footer">Status : {{ $status }}</p>
        </div>
    </div>


</div>

@endsection
