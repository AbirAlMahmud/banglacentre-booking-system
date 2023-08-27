@extends('backend.layouts.master')


@section('main_content')
    @include('backend.layouts2.includes.message')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">





    <!DOCTYPE html>
    <html lang="zxx">

    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Sona Template">
        <meta name="keywords" content="Sona, unica, creative, html">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Sona | Template</title>

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">

        <!-- Css Styles -->
        <link rel="stylesheet" href="{{ asset('ui/halldetails') }}/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="{{ asset('ui/halldetails') }}/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="{{ asset('ui/halldetails') }}/css/elegant-icons.css" type="text/css">
        <link rel="stylesheet" href="{{ asset('ui/halldetails') }}/css/flaticon.css" type="text/css">
        <link rel="stylesheet" href="{{ asset('ui/halldetails') }}/css/owl.carousel.min.css" type="text/css">
        <link rel="stylesheet" href="{{ asset('ui/halldetails') }}/css/nice-select.css" type="text/css">
        <link rel="stylesheet" href="{{ asset('ui/halldetails') }}/css/jquery-ui.min.css" type="text/css">
        <link rel="stylesheet" href="{{ asset('ui/halldetails') }}/css/magnific-popup.css" type="text/css">
        <link rel="stylesheet" href="{{ asset('ui/halldetails') }}/css/slicknav.min.css" type="text/css">
        <link rel="stylesheet" href="{{ asset('ui/halldetails') }}/css/style.css" type="text/css">
    </head>

    <body>


        <!-- Breadcrumb Section Begin -->
        <div class="breadcrumb-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-text">
                            <h2>Our Rooms</h2>
                            <div class="bt-option">
                                <a href="{{ asset('ui/halldetails') }}/./home.html">Home</a>
                                <span>Rooms</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Section End -->

        <!-- Room Details Section Begin -->
        <section class="room-details-section spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="room-details-item">
                            <img src="{{ asset('ui/halldetails') }}/img/room/room-details.jpg" alt="">
                            <div class="rd-text">
                                <div class="rd-title">
                                    <h3>Premium King Room</h3>
                                    <div class="rdt-right">
                                        <div class="rating">
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star-half_alt"></i>
                                        </div>
                                        <a href="{{ asset('ui/halldetails') }}/#">Booking Now</a>
                                    </div>
                                </div>
                                <h2>159$<span>/Pernight</span></h2>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="r-o">Size:</td>
                                            <td>30 ft</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Capacity:</td>
                                            <td>Max persion 5</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Bed:</td>
                                            <td>King Beds</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Services:</td>
                                            <td>Wifi, Television, Bathroom,...</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p class="f-para">Motorhome or Trailer that is the question for you. Here are some of the
                                    advantages and disadvantages of both, so you will be confident when purchasing an RV.
                                    When comparing Rvs, a motorhome or a travel trailer, should you buy a motorhome or fifth
                                    wheeler? The advantages and disadvantages of both are studied so that you can make your
                                    choice wisely when purchasing an RV. Possessing a motorhome or fifth wheel is an
                                    achievement of a lifetime. It can be similar to sojourning with your residence as you
                                    search the various sites of our great land, America.</p>
                                <p>The two commonly known recreational vehicle classes are the motorized and towable.
                                    Towable rvs are the travel trailers and the fifth wheel. The rv travel trailer or fifth
                                    wheel has the attraction of getting towed by a pickup or a car, thus giving the
                                    adaptability of possessing transportation for you when you are parked at your campsite.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="room-booking">
                            <h3>Your Reservation</h3>
                            <form action="#">
                                <div class="check-date">
                                    <label for="date-in">Check In:</label>
                                    <input type="text" class="date-input" id="date-in">
                                    <i class="icon_calendar"></i>
                                </div>
                                <div class="check-date">
                                    <label for="date-out">Check Out:</label>
                                    <input type="text" class="date-input" id="date-out">
                                    <i class="icon_calendar"></i>
                                </div>
                                <div class="select-option">
                                    <label for="guest">Guests:</label>
                                    <select id="guest">
                                        <option value="">3 Adults</option>
                                    </select>
                                </div>
                                <div class="select-option">
                                    <label for="room">Room:</label>
                                    <select id="room">
                                        <option value="">1 Room</option>
                                    </select>
                                </div>
                                <button type="submit">Check Availability</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Room Details Section End -->


        <!-- Search model Begin -->
        <div class="search-model">
            <div class="h-100 d-flex align-items-center justify-content-center">
                <div class="search-close-switch"><i class="icon_close"></i></div>
                <form class="search-model-form">
                    <input type="text" id="search-input" placeholder="Search here.....">
                </form>
            </div>
        </div>
        <!-- Search model end -->

        <!-- Js Plugins -->
        <script src="{{ asset('ui/halldetails') }}/js/jquery-3.3.1.min.js"></script>
        <script src="{{ asset('ui/halldetails') }}/js/bootstrap.min.js"></script>
        <script src="{{ asset('ui/halldetails') }}/js/jquery.magnific-popup.min.js"></script>
        <script src="{{ asset('ui/halldetails') }}/js/jquery.nice-select.min.js"></script>
        <script src="{{ asset('ui/halldetails') }}/js/jquery-ui.min.js"></script>
        <script src="{{ asset('ui/halldetails') }}/js/jquery.slicknav.js"></script>
        <script src="{{ asset('ui/halldetails') }}/js/owl.carousel.min.js"></script>
        <script src="{{ asset('ui/halldetails') }}/js/main.js"></script>
    </body>

    </html>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
@endsection
