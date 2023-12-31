@extends('backend.layouts.master')

@section('main_content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">



    <style>
        .card-top {
            padding: 0.7rem 5rem;
        }

        .card-top a {
            float: left;
            margin-top: 0.7rem;
        }

        #logo {
            font-family: 'Dancing Script';
            font-weight: bold;
            font-size: 1.6rem;
        }

        .card-body {
            padding: 0 5rem 5rem 5rem;
            background-image: url("https://i.imgur.com/4bg1e6u.jpg");
            background-size: cover;
            background-repeat: no-repeat;
        }

        @media(max-width:768px) {
            .card-body {
                padding: 0 1rem 1rem 1rem;
                background-image: url("https://i.imgur.com/4bg1e6u.jpg");
                background-size: cover;
                background-repeat: no-repeat;
            }

            .card-top {
                padding: 0.7rem 1rem;
            }
        }

        .row {
            margin: 0;
        }

        .upper {
            padding: 1rem 0;
            justify-content: space-evenly;
        }

        #three {
            border-radius: 1rem;
            width: 22px;
            height: 22px;
            margin-right: 3px;
            border: 1px solid blue;
            text-align: center;
            display: inline-block;
        }

        #payment {
            margin: 0;
            color: blue;
        }

        .icons {
            margin-left: auto;
        }

        form span {
            color: rgb(179, 179, 179);
        }

        form {
            padding: 2vh 0;
        }

        input {
            border: 1px solid rgba(0, 0, 0, 0.137);
            padding: 1vh;
            margin-bottom: 4vh;
            outline: none;
            width: 100%;
            background-color: rgb(247, 247, 247);
        }

        input:focus::-webkit-input-placeholder {
            color: transparent;
        }

        .header {
            font-size: 1.5rem;
        }

        .left {
            background-color: #ffffff;
            padding: 2vh;
        }

        .left img {
            width: 2rem;
        }

        .left .col-4 {
            padding-left: 0;
        }

        .right .item {
            padding: 0.3rem 0;
        }

        .right {
            background-color: #ffffff;
            padding: 2vh;
        }

        .col-8 {
            padding: 0 1vh;
        }

        .lower {
            line-height: 2;
        }

        a {
            color: black;
        }

        a:hover {
            color: black;
            text-decoration: none;
        }

        input[type=checkbox] {
            width: unset;
            margin-bottom: unset;
        }

        #cvv {
            background-image: linear-gradient(to left, rgba(255, 255, 255, 0.575), rgba(255, 255, 255, 0.541)), url("https://img.icons8.com/material-outlined/24/000000/help.png");
            background-repeat: no-repeat;
            background-position-x: 95%;
            background-position-y: center;
        }

        #cvv:hover {}
    </style>


<div style="background-image: url('{{ asset('ui/searchpage') }}/img/background.jpg'); object-fit: cover;">

    <div class="container p-md-5">
        <div class="card">
            <div class="card-top border-bottom text-center">
                <span id="logo">Payment</span>
            </div>
            <div class="card-body p-5">

                <div class="row">
                    <div class="col-md-7">
                        <div class="left border">
                            <div class="row">
                                <span class="header">Payment</span>
                                <div class="icons">
                                    <img src="https://img.icons8.com/color/48/000000/visa.png" />
                                    <img src="https://img.icons8.com/color/48/000000/mastercard-logo.png" />
                                    <img src="https://img.icons8.com/color/48/000000/maestro.png" />
                                </div>
                            </div>
                            <form>
                                <span>Cardholder's name:</span>
                                <input placeholder="Linda Williams">
                                <span>Card Number:</span>
                                <input placeholder="0125 6780 4567 9909">
                                <div class="row">
                                    <div class="col-4"><span>Expiry date:</span>
                                        <input placeholder="YY/MM">
                                    </div>
                                    <div class="col-4"><span>CVV:</span>
                                        <input id="cvv">
                                    </div>
                                </div>
                                <input type="checkbox" id="save_card" class="align-left">
                                <label for="save_card">Save card details to wallet</label>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="right border">
                            <div class="header">Order Summary</div>
                            <p>2 items</p>
                            <div class="row item">
                                <div class="col-4 align-self-center"><img class="img-fluid"
                                        src="{{ asset('ui/roomlist') }}/img/room/rooms-5.jpg"></div>
                                <div class="col-8">
                                    <div class="row"><b>$ 26.99</b></div>
                                    <div class="row text-muted">Be Legandary Lipstick-Nude rose</div>
                                    <div class="row">Qty:1</div>
                                </div>
                            </div>
                            <div class="row item">
                                <div class="col-4 align-self-center"><img class="img-fluid"
                                        src="{{ asset('ui/roomlist') }}/img/room/rooms-5.jpg"></div>
                                <div class="col-8">
                                    <div class="row"><b>$ 19.99</b></div>
                                    <div class="row text-muted">Be Legandary Lipstick-Sheer Navy Cream</div>
                                    <div class="row">Qty:1</div>
                                </div>
                            </div>
                            <hr>
                            <div class="row lower">
                                <div class="col text-left">Subtotal</div>
                                <div class="col text-right">$ 46.98</div>
                            </div>
                            <div class="row lower">
                                <div class="col text-left">Delivery</div>
                                <div class="col text-right">Free</div>
                            </div>
                            <div class="row lower">
                                <div class="col text-left"><b>Total to pay</b></div>
                                <div class="col text-right"><b>$ 46.98</b></div>
                            </div>


                            <div class="d-flex justify-content-around">
                                <span>
                                    <form action="/stripe" method="post">
                                        @csrf
                                        <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                            data-key="pk_test_51NhzgxDLuce6dgBf3CtpjpzXm4dzIckcObxQn5z2Apgj6AUFOU1mJLMbH7pwSIIRaqNXIYup8MIWNc3DdOIyMA4p00NEywalWh"
                                            data-amount=100 data-name="Your Company Name" data-description="Example Charge"
                                            data-image="https://stripe.com/img/documentation/checkout/marketplace.png" data-locale="auto" data-currency="gbp"
                                            data-panel-label="Pay Now"></script>
                                    </form>


                                    @if (session()->has('success'))
                                        <div class="alert alert-success">
                                            {{ session()->get('success') }}
                                        </div>
                                    @endif

                                    <a href="{{ route('processTransaction') }}" class="btn btn-primary">Pay
                                        with PayPal</a>


                                </span>
                            </div>



                        </div>
                    </div>
                </div>
            </div>

            <div>
            </div>
        </div>
    </div>
</div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
@endsection
