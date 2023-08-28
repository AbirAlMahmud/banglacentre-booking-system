@extends('backend.layouts2.master')


@section('main_content')
    @include('backend.layouts2.includes.message')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex">
               Booking 
                <a class="btn btn-sm btn-outline-primary ms-5" href="{{ route('booking.create') }}">Add New Booking</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered datatable">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">User</th>
                            <th scope="col">Hall</th>
                            <th scope="col">Check In Date</th>
                            <th scope="col">Check Out Date</th>
                            <th scope="col">Booking Time</th>
                            <th scope="col">Organization</th>
                            <th scope="col">Shift</th>
                            <th scope="col">Price</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $sl=1;
                        @endphp
                        @foreach ($bookings as $booking)
                        <tr>
                            <th scope="row">{{ $booking->id }}</th>
                            <td>{{ $booking->user_id ?? '' }}</td>
                            <td>{{ $booking->hall_manage_id ?? '' }}</td>
                            <td>{{ $booking->check_in_date ?? '' }}</td>
                            <td>{{ $booking->check_out_date ?? '' }}</td>
                            <td>{{ $booking->booking_date ?? '' }}</td>
                            <td>{{ $booking->organization_type == 1 ? 'Charity' : 'Non Charity' }}</td>
                            <td>{{ $booking->shifts_model_id ?? '' }}</td>
                            <td>{{ $booking->amount ?? '' }}</td>
                            <td>{{ $booking->status ?? '' }}</td>
                            <td>
                                <a class="btn btn-sm btn-warning" href="{{ route('booking.edit',$booking->id) }}">Edit</a>
                                <form action="{{ route('booking.destroy',$booking->id) }}" method="post" onsubmit="return confirmDelete()">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection