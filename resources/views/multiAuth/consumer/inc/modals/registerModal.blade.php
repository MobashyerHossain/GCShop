<div class="modal fade" id="RegisterModalCenter" tabindex="-1" role="dialog" aria-labelledby="RegisterModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content p-3 pt-1">
      <div class="modal-header p-1">
        <h5 class="modal-title" id="exampleModalLongTitle"><legend>Registration</legend></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="fa fa-times"></span>
        </button>
      </div>
      <div class="modal-body">
        <!--Registration form-->
        <form method="POST" action="{{ route('consumer.register.submit') }}" aria-label="{{ __('Register') }}" enctype='multipart/form-data'>
            @csrf
            <div class="row p-0 m-0">
              <div class="col-12 col-md-8 p-0">
                <!--first name-->
                <div class="form-group row p-0">
                    <div class="col-12">
                        <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" placeholder="First Name" required>

                        @if ($errors->has('first_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('first_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <!--last name-->
                <div class="form-group row p-0">
                    <div class="col-12">
                        <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name" required>

                        @if ($errors->has('last_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
              </div>
              <div class="col-4 ml-auto mr-auto col-md-4">
                <!--profile picture-->
                <div class="form-group row">
                    <div class="col-12 p-0 m-0">
                      <a onclick="uploadImage()">
                        <img id="pro_pic" class="float-right m-0 p-0 rounded" src="{{url('storage/images/devil.ico')}}" alt="Profile Picture" style="width:65%; height:90px; object-fit: cover; cursor:pointer;">
                      </a>
                      <input type="file" id="profile_pic" name="profile_pic" value="{{ old('profile_pic') }}" class="d-none"/>
                    </div>
                </div>
              </div>
            </div>

            <!--email-->
            <div class="form-group row">
                <div class="col-12">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <!--birth date-->
            <div class="form-group row">
                <!--birth date-->
                <div class="col-md-6 col-12">
                    <input id="date_of_birth" type="date" class="form-control{{ $errors->has('date_of_birth') ? ' is-invalid' : '' }}" name="date_of_birth" value="{{ old('date_of_birth') }}" placeholder="Date of Birth" required>

                    @if ($errors->has('date_of_birth'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('date_of_birth') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <!--password-->
            <div class="form-group row">
                <div class="col-12">
                    <input id="reg_password" type="password" minlength="6" class="form-control{{ $errors->has('reg_password') ? ' is-invalid' : '' }}" name="reg_password" placeholder="Password" required>

                    @if ($errors->has('reg_password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('reg_password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <!--confirm password-->
            <div class="form-group row">
                <div class="col-12">
                    <input id="reg_password-confirm" type="password" minlength="6" class="form-control" name="reg_password_confirmation" placeholder="Confirm Password" required>
                </div>
            </div>

            <!--submit button-->
            <div class="form-group row mb-0">
                <div class="col-3 mr-auto ml-auto">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
