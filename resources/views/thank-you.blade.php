@extends('layouts.app')
{{-- Extend @section from parent --}}
@section('content')
  <section class="secondry-section">
    <div class="container">
      <div class="singleproduct-block">
        <div class="row justify-content-center">
          @if($for =='registration')
            <div class="col-md-8">
              <div class="whitebgblock">
                <div class="ordersucessblk">
                  <img src="{{ asset('images/rjsucess.png') }}" alt="">
                  <h1>Thank you for Registration</h1>
                  <h3>You have successfully registered with us, but your account is currently inactive.</h3>
                  <p>To activate your account, click on the activation link in the email we've sent you. If you have not recieved an email, check your
                    <b>spam folder</b> or feel free to contact us on
                    <a href="mailto:support@wackylicious.com">support@wackylicious.com</a></p>
                  <a href="#" class="btn btn-proceed">Back to home</a>
                </div>
              </div>
            </div>
          @endif
        </div>
      </div>
    </div>
  </section>
@endsection
