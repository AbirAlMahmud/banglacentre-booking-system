@extends('backend.layouts.master')


@section('main_content')

@include('backend.layouts2.includes.message')



    <div class="container" style="padding-top: 90px; padding-bottom: 90px;">
        <h1 style="padding-bottom: 50px">Search Hall</h1>

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
                        <select style="width: 145px" class="form-control" id="hall" name="hall_name">
                            <option value="">All</option>
                            @foreach ($halls as $hall)
                                 <option value="{{ $hall->hall_name }}">{{ $hall->hall_name }}</option>
                             @endforeach
                        </select>
                        @error('hall')
                            <div class="text-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md">
                        <h5 for="Period">Period</h5>
                        <select style="width: 145px" class="form-control" id="time_period" name="period">
                            <option value="FullDay">Full Day</option>
                            <option value="Custom">Custom</option>
                        </select>

                        <div id="customTimeInputs" style="display: none;">
                            <label for="startTime">Start Time</label>
                            <input type="time" name="start_time" class="form-control">
                            <label for="endTime">End Time</label>
                            <input type="time" name="end_time" class="form-control">
                        </div>
                        @error('period')
                            <div class="text-danger mt-3">{{ $message }}</div>
                        @enderror
                        @error('customTimeInputs')
                            <div class="text-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md">
                        <input type="radio" id="NonCharity" name="charity" value="Non Charity" checked>
                        <label for="NonCharity">Non Charity</label><br>
                        <input type="radio" id="Charity" name="charity" value="Charity">
                        <label for="Charity">Charity</label>
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

    <script>
        const periodSelect = document.getElementById('time_period');
        const customTimeInputs = document.getElementById('customTimeInputs');

        periodSelect.addEventListener('change', function () {
            if (periodSelect.value === 'Custom') {
                customTimeInputs.style.display = 'block';
            } else {
                customTimeInputs.style.display = 'none';
            }
        });
    </script>
@endsection
