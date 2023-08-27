@extends('backend.layouts.master')

@section('main_content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


    <div class="container" style="margin-top: 70px;margin-bottom: 90px">

        <div class="progress mb-5">
            <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0"
                aria-valuemax="100">75%</div>
        </div>


        <h3 class="text-center mb-3" style="text-decoration: underline;">Choose Your Payment</h3>
        <div class="card">
            <div class="card-header d-flex">
                Payment Methods
            </div>
            <div class="card-body">




                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Stripe
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">



                                <center>
                                <form action="/stripe" method="post">
                                    @csrf
                                    <script
                                        src="https://checkout.stripe.com/checkout.js"
                                        class="stripe-button"
                                        data-key="pk_test_51NhzgxDLuce6dgBf3CtpjpzXm4dzIckcObxQn5z2Apgj6AUFOU1mJLMbH7pwSIIRaqNXIYup8MIWNc3DdOIyMA4p00NEywalWh"
                                        data-amount="$_SESSION['total_paid']"
                                        data-name="Your Company Name"
                                        data-description="Example Charge"
                                        data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                        data-locale="auto"
                                        data-currency="gbp"
                                        data-panel-label="Pay Now <?php echo $_SESSION['total_paid']."£"; ?>"
                                    >
                                    </script>
                                </form>
                            </center>





                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Paypal
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">


                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        @if (session()->has('success'))
                                            <div class="alert alert-success">
                                                {{ session()->get('success') }}
                                            </div>
                                        @endif
                                        <center>
                                            <a href="{{ route('processTransaction') }}" class="btn btn-primary">Pay
                                                with PayPal</a>
                                        </center>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>






            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
@endsection
