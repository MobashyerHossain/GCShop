<div class="modal fade" id="LoginModalCenter" tabindex="-1" role="dialog" aria-labelledby="LoginModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content p-3 pt-1">
      <div class="modal-header p-1">
        <h5 class="modal-title" id="exampleModalLongTitle">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="fa fa-times"></span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('login.submit') }}" aria-label="{{ __('Login') }}">
            @csrf
            <!--email-->
            <div class="form-group row">
                <div class="col-12">
                    <input id="logemail" type="email" class="no-outline form-control{{ $errors->has('logemail') ? 'is-invalid' : '' }}" name="logemail" value="{{ old('logemail') }}" placeholder="Email" required>

                    @if ($errors->has('logemail'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('logemail') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <!--password-->
            <div class="form-group row">
                <div class="col-12">
                    <input id="logpassword" type="password" class="no-outline form-control{{ $errors->has('logpassword') ? ' is-invalid' : '' }}" name="logpassword" placeholder="Password" required>

                    @if ($errors->has('logpassword'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('logpassword') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <!--remember token-->
            <div class="form-group row">
                <div class="col-12">
                  <div class="row m-0 p-0">
                    <div class="col-12 col-md-6 m-0 p-0">
                      <div class="checkbox">
                          <label>
                              <input class="no-outline" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                          </label>
                      </div>
                    </div>
                    <div class="col-12 col-md-6 m-0 p-0">
                      <a class="btn btn-link nav-link m-0 p-0 text-right no-outline" href="{{ route('consumer.password.request') }}">
                          {{ __('Forgot Your password?') }}
                      </a>
                    </div>
                  </div>
                </div>
            </div>

            <!--submit button-->
            <div class="form-group row mb-0">
                <div class="col-3">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
