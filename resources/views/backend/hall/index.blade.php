@extends('backend.layouts2.master')


@section('main_content')
    @include('backend.layouts2.includes.message')

    <div class="container">
        <div class="card">
            <div class="card-header d-flex">
                Hall Lists
                <a class="btn btn-sm btn-outline-primary ms-5" href="{{ route('hall.create') }}">Add New Hall</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered datatable">
                    <thead>
                        <tr>
                           
                            <th scope="col">Id</th>
                            <th scope="col">Hall</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Discount</th>
                            <th scope="col">Image</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $sl=1;
                        @endphp
                        @foreach ($hall as $hall)
                        <tr>
                            <th scope="row">{{ $sl++ }}</th>
                            <td>{{ $hall->hall_name ?? '' }}</td>
                            <td>{!! $hall->description ?? '' !!}</td>
                            <td>{{ $hall->price ?? '' }}</td>
                            <td>{{ $hall->charity_discount ?? '' }}</td>
                            <td>
                                @if ($hall->image)
                                    <img style="height: 50px;width:50px;" src="{{ asset('uploads/images/' . $hall->image) }}"  alt="">
                                @else
                                    There is no image
                                    <!-- <img src="{{ asset('img/default.png') }}"> -->
                                @endif
                                
                            </td>
                            <td>
                                <a class="btn btn-sm btn-warning" href="{{ route('hall.edit',$hall->id) }}">Edit</a>

                                <form action="{{ route('hall.destroy', $hall->id) }}" method="POST" style="display: inline">
                                    @method('post')
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
