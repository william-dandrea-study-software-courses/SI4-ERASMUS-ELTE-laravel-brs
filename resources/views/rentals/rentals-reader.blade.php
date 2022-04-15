@extends('layouts.app')

@section('content')

<div class="h1 p-4">My Rentals</div>

    <div class="container">
        <div class="row">


            <div class="col">
                <div class="card w-100" style="width: 18rem;">
                    <div class="card-header">
                        Pending requests
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach($pendingRentals as $pendingRental)
                            <li class="list-group-item">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$pendingRental->title}}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">{{$pendingRental->authors}}</h6>
                                        <p class="card-text">Rent date : {{ $pendingRental->request_processed_at }}</p>

                                        <a href="{{route('rental', ['id' => $pendingRental->borrow_id])}}" class="btn btn-info">See details</a>

                                        <div class="card-footer w-100">Deadline : {{ $pendingRental->deadline}}</div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>


            <div class="col">
                <div class="card w-100" style="width: 18rem;">
                    <div class="card-header">
                        Accepted and in-time rentals
                    </div>
                    @foreach($acceptedAndInTimeRentals as $pendingRental)
                        <li class="list-group-item">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{$pendingRental->title}}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">{{$pendingRental->authors}}</h6>
                                    <p class="card-text">Rent date : {{ $pendingRental->request_processed_at }}</p>

                                    <a href="{{route('rental', ['id' => $pendingRental->borrow_id])}}" class="btn btn-info">See details</a>

                                    <div class="card-footer w-100">Deadline : {{ $pendingRental->deadline}}</div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </div>
            </div>



            <div class="col">
                <div class="card w-100" style="width: 18rem;">
                    <div class="card-header">
                        Accepted late rentals
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach($acceptedLateRentals as $pendingRental)
                            <li class="list-group-item">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$pendingRental->title}}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">{{$pendingRental->authors}}</h6>
                                        <p class="card-text">Rent date : {{ $pendingRental->request_processed_at }}</p>

                                        <a href="{{route('rental', ['id' => $pendingRental->borrow_id])}}" class="btn btn-info">See details</a>

                                        <div class="card-footer w-100">Deadline : {{ $pendingRental->deadline}}</div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>


        <div class="row mt-5">

            <div class="col ">
                <div class="card w-100" style="width: 18rem;">
                    <div class="card-header">
                        Rejected rental requests
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach($rejectedRentals as $pendingRental)
                            <li class="list-group-item">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$pendingRental->title}}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">{{$pendingRental->authors}}</h6>
                                        <p class="card-text">Rent date : {{ $pendingRental->request_processed_at }}</p>

                                        <a href="{{route('rental', ['id' => $pendingRental->borrow_id])}}" class="btn btn-info">See details</a>

                                        <div class="card-footer w-100">Deadline : {{ $pendingRental->deadline}}</div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>


            <div class="col ">
                <div class="card w-100" style="width: 18rem;">
                    <div class="card-header">
                        Returned rentals
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach($returnedRentals as $pendingRental)
                            <li class="list-group-item">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$pendingRental->title}}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">{{$pendingRental->authors}}</h6>
                                        <p class="card-text">Rent date : {{ $pendingRental->request_processed_at }}</p>

                                        <a href="{{route('rental', ['id' => $pendingRental->borrow_id])}}" class="btn btn-info">See details</a>

                                        <div class="card-footer w-100">Deadline : {{ $pendingRental->deadline}}</div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>






        </div>
    </div>


@endsection
