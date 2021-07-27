@extends('layouts.auth')
@section('content')
    <div class="card-block">
        @include('shared._error_message')
        <form class="md-float-material" action="{{ route('login') }}" method="post">
            @csrf
            <div class="auth-box">
                <div class="row m-b-20 text-center">
                    <div class="col-md-8 m-auto border-bottom-golden">
                        <h3 class="text-center text-white">{{env('APP_NAME')}} - Login</h3>
                    </div>
                </div>
                <div class="input-group">
				
				<select class="form-control" name="email" required>
					<option value="">Select Email</option>
					@foreach ($Alluserdetails as $key => $value)
						<option value="{{ $value['email'] }}" > 
							{{ $value['email'] }} 
						</option>
					@endforeach    
				</select>

                </div>
                <div class="input-group">
                    <input type="password" value="{{ old('password') }}" name="password"
                           class="form-control form-control-bold @error('password') form-bg-danger @enderror"
                           placeholder="Password">
                    <span class="md-line"></span>
                    @error('password')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <div class="row text-right">
                    <div class="col-md-12">
                        <button type="submit" class="btn bg-white font-weight-bold text-center m-b-10 theme-text-color">
                            Login
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 text-left">
                        <div class="checkbox-fade fade-in-primary d-">
{{--                            <label>--}}
{{--                                <input type="checkbox" value="1" name="remember">--}}
{{--                                <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>--}}
{{--                                <span class="text-width">Remember me</span>--}}
{{--                            </label>--}}
                        </div>
                    </div>
                    <div class="col-6 text-right">
                        <button href="#" class="btn bg-white font-weight-bold theme-text-color">Remind Password</button>
                    </div>
                </div>
            </div>
        </form>
        <!-- end of form -->
    </div>
@stop
