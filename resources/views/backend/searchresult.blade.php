@extends('backend.layouts.master')

@section('main_content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


    <div class="container" style="margin-top: 70px;margin-bottom: 90px">
        <h3 class="text-center mb-3" style="text-decoration: underline;">Choose Your Hall</h3>
        <div class="card">
            <div class="card-header d-flex">
                Hall Lists
            </div>
            <div class="card-body">
                <table class="table table-bordered datatable">
                    <thead>
                        <tr>
                            <th scope="col">Ser No.</th>
                            <th scope="col">Check-in Date</th>
                            <th scope="col">Check-out Date</th>
                            <th scope="col">Hall</th>
                            <th scope="col">Period</th>
                            <th scope="col">Start Time</th>
                            <th scope="col">End Time</th>
                            <th scope="col">Booking Type</th>
                            <th scope="col">Price</th>
                            <th scope="col">Description</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $sl = 1;
                        @endphp
                        @foreach ($searchpages as $searchpage)
                            <tr>
                                <th scope="row">{{ $sl++ }}</th>
                                <td>{{ $searchpage->check_in_date ?? '' }}</td>
                                <td>{{ $searchpage->check_out_date ?? '' }}</td>
                                <td>{{ $searchpage->hall ?? '' }}</td>
                                <td>{{ $searchpage->period ?? '' }}</td>
                                <td>{{ $searchpage->start_time ?? '' }}</td>
                                <td>{{ $searchpage->end_time ?? '' }}</td>
                                <td>{{ $searchpage->booking_type ?? '' }}</td>
                                <td>{{ $searchpage->price ?? '' }}</td>
                                <td>{!! $searchpage->description ?? '' !!}</td>
                                <td>
                                    @if (file_exists(storage_path() . '/app/public/searchpage/' . $searchpage->image))
                                        <img src="{{ asset('storage/searchpage/' . $searchpage->image) }}" height="100">
                                    @else
                                        iamge nai
                                        <!-- <img src="{{ asset('img/default.png') }}"> -->
                                    @endif
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-sm btn-primary" style="padding: 5px 15px"
                                        data-bs-toggle="modal" data-bs-target="<?php echo '#exampleModal'.$searchpage->id ?>">
                                        Book Now</button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="<?php echo 'exampleModal'.$searchpage->id ?>" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Price Details
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <table class="table table-bordered datatable">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Ser No.</th>
                                                                <th scope="col">Period</th>
                                                                <th scope="col">Booking Type</th>
                                                                <th scope="col">Price</th>
                                                                <th scope="col">Total Price</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                            $sl=1;
                                                            @endphp
                                                            <tr>
                                                                <th scope="row">{{ $sl++ }}</th>
                                                                <td>{{ $searchpage->period ?? '' }} </td>
                                                                <td>{{ $searchpage->booking_type ?? '' }}</td>
                                                                <td>{{ $searchpage->price ?? '' }}</td>
                                                                <td><?php
                                                                 if($searchpage->booking_type=='Charity'){
                                                                    echo (($searchpage->price)*50)/100;
                                                                }else{
                                                                    echo $searchpage->price;
                                                                }  ?></td>
                                                            </tr>
                                                        </tbody>
                                                        <div>* 50% discount for charity booking</div>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <a href="{{ route('person.create') }}" class="btn btn-primary">Confirm</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
@endsection
