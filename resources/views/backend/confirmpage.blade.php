@extends('backend.layouts.master')


@section('main_content')
    @include('backend.layouts2.includes.message')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

        @php
            session_start();
        @endphp

    <div class="container" style="margin-top: 70px;margin-bottom: 90px">


        <div class="progress mb-5">
            <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0"
                aria-valuemax="100">100%</div>
        </div>


        <h3 class="alert alert-success text-center mb-3" role="alert" style="text-decoration: underline;">Thanks For
            Purchase !!</h3>
        <div class="card">
            <div class="card-header d-flex">
                Your Booking Information
            </div>
            <div class="card-body">


                <table class="table table-bordered datatable">
                    <thead>
                        <tr>
                            <th scope="col">Check-in Date</th>
                            <th scope="col">Check-out Date</th>
                            <th scope="col">Hall</th>
                            <th scope="col">Period</th>
                            <th scope="col">Start Time</th>
                            <th scope="col">End Time</th>
                            <th scope="col">Booking Type</th>
                            <th scope="col">Price</th>
                            <th scope="col">Discount</th>
                            <th scope="col">Description</th>
                            <th scope="col">Total Paid</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $sl = 1;
                        @endphp
                        <tr>
                            <td>{{ $searchpage->check_in_date ?? '' }}</td>
                            <td>{{ $searchpage->check_out_date ?? '' }}</td>
                            <td>{{ $searchpage->hall ?? '' }}</td>
                            <td>{{ $searchpage->period ?? '' }}</td>
                            <td>{{ $searchpage->start_time ?? '' }}</td>
                            <td>{{ $searchpage->end_time ?? '' }}</td>
                            <td>{{ $searchpage->booking_type ?? '' }}</td>
                            <td>{{ $searchpage->price ?? '' }}</td>
                            <td>{{ $searchpage->discount ?? '' }}</td>
                            <td>{!! $searchpage->description ?? '' !!}</td>
                            <td>{{ $_SESSION['total_paid'] }}</td>
                        </tr>

                    </tbody>
                </table>

                <center>

                    @if (file_exists(storage_path() . '/app/public/searchpage/' . $searchpage->image))
                        <img src="{{ asset('storage/searchpage/' . $searchpage->image) }}" height="200">
                    @else
                        iamge nai
                        <!-- <img src="{{ asset('img/default.png') }}"> -->
                    @endif

                </center>


            </div>
        </div>
    </div>


    <div class="container" style="margin-top: 70px;margin-bottom: 90px">
        <div class="card">
            <div class="card-header d-flex">
                Your Personal Details
            </div>
            <div class="card-body">


                <table class="table table-bordered datatable">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Address</th>
                            <th scope="col">Comment</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $sl = 1;
                        @endphp
                        <tr>
                            <td>{{ $personaldetail->name ?? '' }}</td>
                            <td>{{ $personaldetail->email ?? '' }}</td>
                            <td>{{ $personaldetail->phone ?? '' }}</td>
                            <td>{{ $personaldetail->address ?? '' }}</td>
                            <td>{!! $personaldetail->comment ?? '' !!}</td>
                        </tr>

                    </tbody>
                </table>


            </div>
        </div>

        <h3 class="alert alert-success text-center mt-3" role="alert" style="text-decoration: underline;">Paid !!</h3>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
@endsection
