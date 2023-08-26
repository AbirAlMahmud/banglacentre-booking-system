@extends('backend.layouts2.master')


@section('main_content')
    @include('backend.layouts2.includes.message')

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->


    <div class="container">
        <div class="card">
            <div class="card-header d-flex">
                Booking Lists
                <div>
                    <a class="btn btn-sm btn-primary ms-5" href="{{ route('dashboard.pdf') }}" target="_blank">PDF</a>
                    <a class="btn btn-sm btn-success" href="" target="_blank">EXCEL</a>
                </div>
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
                            <th scope="col">Booking Type</th>
                            <th scope="col">Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Total Paid</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $sl = 1;
                        @endphp
                        @foreach ($dashboards as $dashboard)
                            <tr>
                                <th scope="row">{{ $sl++ }}</th>
                                <td>{{ $dashboard->check_in_date ?? '' }}</td>
                                <td>{{ $dashboard->check_out_date ?? '' }}</td>
                                <td>{{ $dashboard->hall ?? '' }}</td>
                                <td>{{ $dashboard->period ?? '' }}</td>
                                <td>{{ $dashboard->booking_type ?? '' }}</td>
                                <td>{{ $dashboard->name ?? '' }}</td>
                                <td>{{ $dashboard->phone ?? '' }}</td>
                                <td>{{ $dashboard->total_paid }}</td>
                                <td>
                                    <a class="btn btn-sm btn-primary"
                                        href="{{ route('dashboard.show', $dashboard->id) }}">Details</a>

                                    <a class="btn btn-sm btn-warning"
                                        href="{{ route('dashboard.edit',$dashboard->id) }}">Edit</a>

                                    <form action="{{ route('dashboard.destroy', $dashboard->id) }}" method="POST"
                                        style="display: inline">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-sm btn-danger" type="submit">Delete</button>
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
