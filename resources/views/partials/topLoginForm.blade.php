<div class="divtopform">{{ __('Login') }}
  @if ($errors->has('username') || $errors->has('password'))
    <span class="rj_error"><strong>Invalid Login Please Try Again.</strong></span>
  @endif
  @if (Route::has('password.request'))
    <span>
            <a class="btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        </span>
  @endif
</div>
<style>
  .form-control.is-invalid ~ .invalid-feedback {
    display: block;
  }
</style>
<form method="POST" action="{{ route('login') }}">
  @csrf
  <div class="row headerformwow">
    <div class="col-md-5">
      <div class="group-input">
        <span class="iconsform"><i class="fas fa-envelope"></i></span>
        <input id="topLoginUsername" placeholder="{{ __('E-Mail Address') }}" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
      </div>
      @if ($errors->has('username'))
        <span class="text-danger" role="alert"><strong>{{ $errors->first('username') }}</strong></span>
      @endif
    </div>
    <div class="col-md-4">
      <div class="group-input">
        <span class="iconsform"><i class="zmdi zmdi-lock-outline"></i></span>
        <input id="password" placeholder="{{ __('Password') }}" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        @if ($errors->has('password'))
          <span class="text-danger" role="alert"><strong>{{ $errors->first('password') }}</strong></span>
        @endif
      </div>
    </div>
    <div class="col-md-3">
      <button type="submit" class="btn btn-submitlogin">
        {{ __('Login') }}
      </button>
    </div>
  </div>
</form>
