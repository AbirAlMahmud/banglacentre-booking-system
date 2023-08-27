@extends('backend.layouts.master')


@section('main_content')
    @include('backend.layouts2.includes.message')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


        <!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Hotel Template">
    <meta name="keywords" content="Hotel, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hotel | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Taviraj:300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('ui/roomlist') }}/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('ui/roomlist') }}/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('ui/roomlist') }}/css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('ui/roomlist') }}/css/linearicons.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('ui/roomlist') }}/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('ui/roomlist') }}/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('ui/roomlist') }}/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('ui/roomlist') }}/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('ui/roomlist') }}/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('ui/roomlist') }}/css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Rooms Section Begin -->
    <section class="room-section spad">
        <div class="container">
            <div class="rooms-page-item">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="room-pic-slider owl-carousel" style="z-index: 0">
                            <div class="single-room-pic">
                                <img src="{{ asset('ui/roomlist') }}/img/room/rooms-3.jpg" alt="">
                            </div>
                            <div class="single-room-pic">
                                <img src="{{ asset('ui/roomlist') }}/img/room/rooms-2.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="room-text">
                            <div class="room-title">
                                <h2>Double Room</h2>
                                <div class="room-price">
                                    <h2>$179</h2>
                                </div>
                            </div>
                            <div class="room-desc">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mauris, bibendum
                                    eget sapien ac, ultrices rhoncus ipsum.</p>
                            </div>
                            <a href="#" class="primary-btn">Book Now</a>
                            <a href="#" class="primary-btn">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rooms-page-item">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="room-pic-slider owl-carousel" style="z-index: 0">
                            <div class="single-room-pic">
                                <img src="{{ asset('ui/roomlist') }}/img/room/rooms-4.jpg" alt="">
                            </div>
                            <div class="single-room-pic">
                                <img src="{{ asset('ui/roomlist') }}/img/room/rooms-2.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="room-text">
                            <div class="room-title">
                                <h2>Junior Suite</h2>
                                <div class="room-price">

                                    <h2>$252</h2>

                                </div>
                            </div>
                            <div class="room-desc">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mauris, bibendum
                                    eget sapien ac, ultrices rhoncus ipsum.</p>
                            </div>
                            <a href="#" class="primary-btn">Book Now</a>
                            <a href="#" class="primary-btn">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rooms-page-item">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="room-pic-slider owl-carousel" style="z-index: 0">
                            <div class="single-room-pic">
                                <img src="{{ asset('ui/roomlist') }}/img/room/rooms-5.jpg" alt="">
                            </div>
                            <div class="single-room-pic">
                                <img src="{{ asset('ui/roomlist') }}/img/room/rooms-2.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="room-text">
                            <div class="room-title">
                                <h2>Standard Room</h2>
                                <div class="room-price">

                                    <h2>$99</h2>

                                </div>
                            </div>
                            <div class="room-desc">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mauris, bibendum
                                    eget sapien ac, ultrices rhoncus ipsum.</p>
                            </div>
                            <a href="#" class="primary-btn">Book Now</a>
                            <a href="#" class="primary-btn">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Rooms Section End -->

    <!-- Js Plugins -->
    <script src="{{ asset('ui/roomlist') }}/js/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('ui/roomlist') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('ui/roomlist') }}/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('ui/roomlist') }}/js/jquery-ui.min.js"></script>
    <script src="{{ asset('ui/roomlist') }}/js/jquery.nice-select.min.js"></script>
    <script src="{{ asset('ui/roomlist') }}/js/jquery.slicknav.js"></script>
    <script src="{{ asset('ui/roomlist') }}/js/owl.carousel.min.js"></script>
    <script src="{{ asset('ui/roomlist') }}/js/main.js"></script>
</body>

</html>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
@endsection
