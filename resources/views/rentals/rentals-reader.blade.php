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
                        @foreach($pendingBooks as $pendingBook)
                            <li class="list-group-item">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$pendingBook->title}}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">{{$pendingBook->authors}}</h6>
                                        <p class="card-text">Rent date : {{Carbon\Carbon::parse($pendingBook->request_processed_at)->format('Y-m-d')}}</p>
                                        <a href="{{route('rental', ['id' => $pendingBook->id])}}" class="btn btn-info">See details</a>

                                        <div class="card-footer w-100">Deadline : {{Carbon\Carbon::parse(@$pendingBook->deadline)->format('Y-m-d')}}</div>
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
                    @foreach($acceptedAndInTimeRentals as $pendingBook)
                        <li class="list-group-item">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{$pendingBook->title}}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">{{$pendingBook->authors}}</h6>
                                    <p class="card-text">Rent date : {{Carbon\Carbon::parse($pendingBook->request_processed_at)->format('Y-m-d')}}</p>
                                    <a href="{{route('rental', ['id' => $pendingBook->id])}}" class="btn btn-info">See details</a>

                                    <div class="card-footer w-100">Deadline : {{Carbon\Carbon::parse(@$pendingBook->deadline)->format('Y-m-d')}}</div>
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
                        @foreach($acceptedLateRentals as $pendingBook)
                            <li class="list-group-item">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$pendingBook->title}}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">{{$pendingBook->authors}}</h6>
                                        <p class="card-text">Rent date : {{Carbon\Carbon::parse($pendingBook->request_processed_at)->format('Y-m-d')}}</p>
                                        <a href="{{route('rental', ['id' => $pendingBook->id])}}" class="btn btn-info">See details</a>

                                        <div class="card-footer w-100">Deadline : {{Carbon\Carbon::parse(@$pendingBook->deadline)->format('Y-m-d')}}</div>
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
                        @foreach($rejectedRentals as $pendingBook)
                            <li class="list-group-item">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$pendingBook->title}}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">{{$pendingBook->authors}}</h6>
                                        <p class="card-text">Rent date : {{Carbon\Carbon::parse($pendingBook->request_processed_at)->format('Y-m-d')}}</p>
                                        <a href="{{route('rental', ['id' => $pendingBook->id])}}" class="btn btn-info">See details</a>

                                        <div class="card-footer w-100">Deadline : {{Carbon\Carbon::parse(@$pendingBook->deadline)->format('Y-m-d')}}</div>
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
                        @foreach($returnedRentals as $pendingBook)
                            <li class="list-group-item">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$pendingBook->title}}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">{{$pendingBook->authors}}</h6>
                                        <p class="card-text">Rent date : {{Carbon\Carbon::parse($pendingBook->request_processed_at)->format('Y-m-d')}}</p>
                                        <a href="{{route('rental', ['id' => $pendingBook->id])}}" class="btn btn-info">See details</a>

                                        <div class="card-footer w-100">Deadline : {{Carbon\Carbon::parse(@$pendingBook->deadline)->format('Y-m-d')}}</div>
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
