@extends('backend.layouts.master')


@section('main_content')
    @include('backend.layouts2.includes.message')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,900" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="{{ asset('ui/searchpage') }}/css/style.css" />

    <div id="booking" class="section">
        <div class="section-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="booking-cta">
                            <h1>Make your reservation</h1>
                            <p>Here are the best hall booking sites, including recommendations for finding low-priced hall rooms.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-md-offset-1">
                        <div class="booking-form">
                            <form>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input name="check_in_date" id="date_picker" type="date" class="form-control"
                                                required>
                                            @error('check_in_date')
                                                <div class="text-danger mt-3">{{ $message }}</div>
                                            @enderror
                                            <span class="form-label">Check In</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input name="check_out_date" id="date_picker2" type="date"
                                                class="form-control" required>
                                            @error('check_out_date')
                                                <div class="text-danger mt-3">{{ $message }}</div>
                                            @enderror
                                            <span class="form-label">Check Out</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="form-label">Hall</span>
                                            <select class="form-control" name="hall">
                                                <option value="Hall 1">Hall 1</option>
                                                <option value="Hall 2">Hall 2</option>
                                                <option value="Hall 3">Hall 3</option>
                                                <option value="Hall 4">Hall 4</option>
                                                <option value="Hall 5">Hall 5</option>
                                            </select>
                                            @error('hall')
                                                <div class="text-danger mt-3">{{ $message }}</div>
                                            @enderror
                                            <span class="select-arrow"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="form-label">Shift</span>
                                            <select class="form-control" name="shift">
                                                <option value="Half Day">8:10 - 11:59</option>
                                                <option value="Full Day">12:00 - 3:00</option>
                                                <option value="Hour 1">3:00 - 6:00</option>
                                                <option value="Hour 2">6:00 - 9:00</option>
                                            </select>
                                            @error('shift')
                                                <div class="text-danger mt-3">{{ $message }}</div>
                                            @enderror
                                            <span class="select-arrow"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h5>Orgainization Type</h5>
                                            <input type="radio" id="Non Charity" name="charity" value="Non Charity"
                                                checked>
                                            <label for="Non Charity"> Non Charity</label>
                                            <input type="radio" id="Charity" name="charity" value="Charity">
                                            <label for="Charity"> Charity</label>
                                            @error('charity')
                                                <div class="text-danger mt-3">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-btn">
                                    <button class="submit-btn">Book Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('ui/searchpage') }}/js/jquery.min.js"></script>
    <script>
        $('.form-control').each(function() {
            floatedLabel($(this));
        });

        $('.form-control').on('input', function() {
            floatedLabel($(this));
        });

        function floatedLabel(input) {
            var $field = input.closest('.form-group');
            if (input.val()) {
                $field.addClass('input-not-empty');
            } else {
                $field.removeClass('input-not-empty');
            }
        }
    </script>

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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
@endsection
