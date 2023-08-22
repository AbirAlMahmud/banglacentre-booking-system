@extends('backend.layouts.master')


@section('main_content')

@include('backend.layouts2.includes.message')


    <div class="container" style="padding-top: 90px; padding-bottom: 90px;">
        <h1 style="padding-bottom: 50px">Book Now</h1>

        <div class="vbdivsearch vbo-search-mainview" style="background-color: #f6f6f6; padding: 10px">
            <form action="{{ route('searchresult.index') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md">
                        <h5 for="checkindate">Check-in Date</h5>
                        <input name="check_in_date" id="date_picker" type="date" class="form-control">
                        @error('check_in_date')
                            <div class="text-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md">
                        <h5 for="checkoutdate">Check-out Date</h5>
                        <input name="check_out_date" id="date_picker2" type="date" class="form-control">
                        @error('check_out_date')
                            <div class="text-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md">
                        <h5 for="Hall">Hall</h5>
                        <select style="width: 145px" class="form-control" id="hall" name="hall">
                            <option value="Hall 1">Hall 1</option>
                            <option value="Hall 2">Hall 2</option>
                            <option value="Hall 3">Hall 3</option>
                            <option value="Hall 4">Hall 4</option>
                            <option value="Hall 5">Hall 5</option>
                        </select>
                        @error('hall')
                            <div class="text-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md">
                        <h5 for="Period">Period</h5>
                        <select style="width: 145px" class="form-control" id="period" name="period">
                            <option value="Half Day">Half Day</option>
                            <option value="Full Day">Full Day</option>
                            <option value="Hour 1">Hour 1</option>
                            <option value="Hour 2">Hour 2</option>
                            <option value="Hour 3">Hour 3</option>
                            <option value="Hour 4">Hour 4</option>
                        </select>
                        @error('period')
                            <div class="text-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md">
                        <h5>Show Checkboxes</h5>
                        <input type="radio" id="Charity" name="charity" value="Charity">
                        <label for="Charity"> Charity</label>
                        <input type="radio" id="Non Charity" name="charity" value="Non Charity">
                        <label for="Non Charity"> Non Charity</label>
                        @error('charity')
                            <div class="text-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md">
                        <button type="submit" class="btn btn btn-primary mt-1" style="padding: 10px 30px">Find</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script language="javascript">
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        $('#date_picker').attr('min', today);
        $('#date_picker2').attr('min', today);
    </script>
@endsection
