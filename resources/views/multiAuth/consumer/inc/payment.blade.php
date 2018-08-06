<form method="POST" action="{{ route('consumer.register.submit') }}" aria-label="{{ __('Register') }}">
    @csrf
    <div class="row m-0 p-0">
      <div class="col-8">
        <h6 class="mt-1 mb-2 font-weight-bold">Parsonal Information</h6>
        <!--first name-->
        <div class="form-group row p-0">
            <div class="col-12">
                <input id="first_name" type="text" class="rounded-0 no-outline form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" placeholder="{{Auth::user()->first_name}}" required disabled>
            </div>
        </div>

        <!--last name-->
        <div class="form-group row p-0">
            <div class="col-12">
                <input id="last_name" type="text" class="rounded-0 no-outline form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" placeholder="{{Auth::user()->last_name}}" required disabled>
            </div>
        </div>

        <!--email-->
        <div class="form-group row">
            <div class="col-12">
                <input id="email" type="email" class="rounded-0 no-outline form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="{{Auth::user()->email}}" required disabled>
            </div>
        </div>

        <h6 class="mt-1 mb-2 font-weight-bold">Car Information</h6>
        <!--car maker-->
        <div class="form-group row p-0">
            <div class="col-12">
                <input id="car_maker" type="text" class="rounded-0 no-outline form-control" name="car_maker" value="{{ old('car_maker') }}" placeholder="{{$car->getModel()->getMaker()->name}}" required disabled>
            </div>
        </div>

        <!--car model-->
        <div class="form-group row p-0">
            <div class="col-12">
                <input id="car_model" type="text" class="rounded-0 no-outline form-control" name="car_model" value="{{ old('car_model') }}" placeholder="{{$car->getModel()->name}}" required disabled>
            </div>
        </div>

        <!--car-->
        <div class="form-group row">
            <div class="col-12">
                <input id="car" type="text" class="rounded-0 no-outline form-control" name="car" value="{{ old('car') }}" placeholder="{{$car->name}}" required disabled>
            </div>
        </div>
      </div>

      <div class="col-4">
        <h6 class="mt-1 mb-2 font-weight-bold">Payment Information</h6>
        <!--card brand-->
        <div class="form-group row">
            <div class="col-12">
              <div class="border row m-0 pl-1" style="padding-top:6px;padding-bottom:6px;">
                <div class="col-1 m-0 p-0 ml-1">
                  <span class="fa fa-credit-card p-0 m-0"></span>
                </div>
                <div class="col m-0">
                  <input id="card_brand" type="text" class="m-0 p-0 rounded-0 border-0 no-outline form-control" name="card_brand" value="{{ old('card_brand') }}" placeholder="Card Brand" required>
                </div>
              </div>
            </div>
        </div>

        <!--card number-->
        <div class="form-group row">
            <div class="col-12">
              <div class="border row m-0 pl-1" style="padding-top:6px;padding-bottom:6px;">
                <div class="col-1 m-0 p-0 ml-1">
                  <span class="fa fa-credit-card p-0 m-0"></span>
                </div>
                <div class="col m-0">
                  <input id="card_number" type="text" class="m-0 p-0 rounded-0 border-0 no-outline form-control" name="card_number" value="{{ old('card_number') }}" placeholder="Card Number" required>
                </div>
              </div>
            </div>
        </div>

        <!--trail ends-->
        <div class="form-group row">
            <div class="col-12">
              <div class="border row m-0 pl-1" style="padding-top:6px;padding-bottom:6px;">
                <div class="col-1 m-0 p-0 ml-1">
                  <span class="fa fa-calendar p-0 m-0"></span>
                </div>
                <div class="col m-0">
                  <input id="trail_ends" type="text" class="m-0 p-0 rounded-0 border-0 no-outline form-control" name="trail_ends" value="{{ old('trail_ends') }}" placeholder="MM/YY" required>
                </div>
              </div>
            </div>
        </div>

        <!--cvv-->
        <div class="form-group row">
            <div class="col-12">
              <div class="border row m-0 pl-1" style="padding-top:6px;padding-bottom:6px;">
                <div class="col-1 m-0 p-0 ml-1">
                  <span class="fa fa-lock p-0 m-0"></span>
                </div>
                <div class="col m-0">
                  <input id="cvv" type="text" class="m-0 p-0 rounded-0 border-0 no-outline form-control" name="cvv" value="{{ old('cvv') }}" placeholder="CVV" required>
                </div>
              </div>
            </div>
        </div>

        <!--condition-->
        <div class="form-group row">
            <div class="col-12 mb-0 pb-0">
              <p style="font-size:10px;font-family: 'Times New Roman', Times, serif;" class="text-justify pb-0 mb-0">To book this vehicle you have to pay 10% of the cars Discounted price given above. This payment will allow us to hold this car for you for a week(7 days) after that the car will again be put up for sale. We will return 50% of the sum you paid (5% of the Discounted price).</p>
            </div>
        </div>

        <!--agree or not-->
        <div class="form-group row">
            <div class="col-12">
              <div class="row">
                <div class="col-12">
                  <div class="checkbox">
                      <label>
                          <input class="rounded-0 no-outline" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}><span class="m-0 p-0 ml-2" style="font-size:12px;font-family: 'Times New Roman', Times, serif;">Agree to our terms and conditions?</span>
                      </label>
                  </div>
                </div>
              </div>
            </div>
        </div>



        <!--submit button-->
        <div class="form-group row m-0 float-right mb-3">
          <button type="submit" style="font-family: 'Times New Roman', Times, serif;" class="btn btn-primary rounded-0 no-outline">
              {{$car->getFractionalPrice(10)}}
          </button>
        </div>
      </div>
    </div>
</form>
