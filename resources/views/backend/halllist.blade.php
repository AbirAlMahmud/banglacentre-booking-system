
@extends('backend.layouts.master')


@section('main_content')


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


        <style>
            @media (max-width: 767.98px) { .border-sm-start-none { border-left: none !important; } }
        </style>

<section style="background-color: #eee;">
  <div class="container py-5">
    <form action="{{ route('book_now') }}" method="post">
        @csrf
        @method("POST")
        <input type="hidden" name="check_out_date" value="{{ $check_out_date_view }}">
        <input type="hidden" name="check_in_date" value="{{ $check_in_date_view }}">
        <input type="hidden" name="shifts_model_id" value="{{ $shift_view }}">
    @if(isset($allHallInfo))
    @foreach ( $allHallInfo as $hall )
    @php
            session()->put('halllist_id', $hall->id);
    @endphp
    <div class="row justify-content-center mb-3">
      <div class="col-md-12 col-xl-10">
        <div class="card shadow-0 border rounded-3">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                <div class="bg-image hover-zoom ripple rounded ripple-surface">
                    <img  src="{{ asset('uploads/images/' . $hall->image) }}"  alt="">
                    <a href="#!">
                    <div class="hover-overlay">
                      <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-md-6 col-lg-6 col-xl-6">
                <h4>{{ $hall->hall_name }}</h4>
                <input type="hidden" value="{{ $hall->id}}" name="hall_manage_id">
                <div class="d-flex flex-row">

                  <span>{{ $hall->capacity }}</span>
                </div>

                <p class="text-truncate mb-4 mb-md-0">
                  {{ $hall->hall_description }}
                </p>
              </div>
              <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                <div class="d-flex flex-row align-items-center mb-1">
                    @if ($charity == 1 && isset($discount_prices[$hall->id]))
                    <input type="hidden" name="calculated_price" value="{{ $discount_prices[$hall->id] * $numberOfDays }}">

                    <h4 class="mb-1 me-1">${{ $discount_prices[$hall->id] * $numberOfDays }}</h4>
                    @php
                    session()->put('halllist_price', $discount_prices[$hall->id] * $numberOfDays);
                    @endphp

                      @else
                      <input type="hidden" name="calculated_price" value="{{ $hall->price * $numberOfDays }}">

                          <h4 class="mb-1 me-1">${{ $hall->price * $numberOfDays }}</h4>
                          @php
                          session()->put('halllist_price', $hall->price * $numberOfDays);
                          @endphp

                      @endif
                      <input type="hidden" name="charity" value="{{ $charity }}">

                  </div>
                <div class="d-flex flex-column mt-4">
                  <button class="btn btn-success btn-sm" type="submit" style="width: 100px">Book Now</button>
                  <a href="{{ route('halldetails', $hall->id) }}" class="btn btn-success btn-sm mt-2" style="width: 100px">Details</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
    @else
    @php
    session()->put('halllist_id', $hallInfo->id);
    @endphp

    <div class="row justify-content-center mb-3">
        <div class="col-md-12 col-xl-10">
          <div class="card shadow-0 border rounded-3">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                  <div class="bg-image hover-zoom ripple rounded ripple-surface">
                      <img  src="{{ asset('uploads/images/' . $hallInfo->image) }}"  alt="">
                      <a href="#!">
                      <div class="hover-overlay">
                        <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                      </div>
                    </a>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-6">
                  <h4>{{ $hallInfo->hall_name}}</h4>
                  <input type="hidden" value="{{ $hallInfo->id}}" name="hall_manage_id">

                  <div class="d-flex flex-row">

                    <span>{{ $hallInfo->capacity }}</span>
                  </div>

                  <p class="text-truncate mb-4 mb-md-0">
                    {!! $hallInfo->hall_description !!}
                  </p>
                </div>
                <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                  <div class="d-flex flex-row align-items-center mb-1">

                    @if (isset($discount_price))
                    <h4 class="mb-1 me-1">${{ $discount_price * $numberOfDays }}</h4>
                    @php
                    session()->put('halllist_price', $discount_price * $numberOfDays);
                    @endphp
                    @else
                    <h4 class="mb-1 me-1">${{ $hallInfo->price * $numberOfDays }}</h4>
                    @php
                    session()->put('halllist_price', $hallInfo->price * $numberOfDays);
                    @endphp
                    
                  </div>

                  <div class="d-flex flex-column mt-4">
                    @if(auth()->check()) <!-- Check if the user is authenticated -->
                    <button class="btn btn-success btn-sm" type="submit" style="width: 100px">Book Now</button>

                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary btn-sm" style="width: 100px">Login to Book</a>
                    @endif
                    <a href="{{ route('halldetails') }}" class="btn btn-success btn-sm mt-2" style="width: 100px">Details</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      @endif
    </form>
  </div>
</section>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
@endsection
