@extends('layouts.app')
@section('content')
    <section class="accountcreation">
        <div class="container">
            <div class="row">
                <div class="col-md-7 order-sm-2">
                    <div class="registration-form continueform">
                        <form action="{{ route('account-creation',$user) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="headingregis">Register Now</div>
                            <h5>Company Info</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="group-input">
                                            <span class="iconsform"><i class="zmdi zmdi-home"></i></span>
                                            <input type="text" name="company_name" class="form-control" value="{{ old('company_name',$user->company_name) }}" placeholder="Company Name *" required>
                                            @error('company_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="group-input">
                                            <span class="iconsform"><i class="zmdi zmdi-globe"></i></span>
                                            <input type="url" name="company_website" class="form-control" value="{{ old('company_website',$user->company_website) }}" placeholder="Company Link" autofocus>
                                            @error('company_website')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="group-input">
                                            <span class="iconsform"><i class="fas fa-envelope"></i></span>
                                            <input type="email" name="email" class="form-control" value="{{ old('email',$user->email) }}" placeholder="Official Email id (username) *" disabled>
                                            @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="group-input">
                                            <span class="iconsform"><i class="zmdi zmdi-phone-in-talk"></i></span>
                                            <input type="text" name="phone" class="form-control" value="{{ old('phone',$user->phone) }}" placeholder="Contact Number *" required>
                                            @error('phone')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5>Personal Info</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="group-input">
                                            <span class="iconsform"><i class="zmdi zmdi-account-o"></i></span>
                                            <input type="text" name="first_name" class="form-control" value="{{ old('first_name',$user->first_name) }}" placeholder="First Name *" required>
                                            @error('first_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="group-input">
                                            <span class="iconsform"><i class="zmdi zmdi-account-o"></i></span>
                                            <input type="text" name="last_name" class="form-control" value="{{ old('last_name',$user->last_name) }}" placeholder="Last Name *" required>
                                            @error('last_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="group-input">
                                            <span class="iconsform"><i class="zmdi zmdi-info-outline"></i></span>
                                            <input type="text" name="job_title" class="form-control" value="{{ old('job_title',$user->job_title) }}" placeholder="Job Title *" required>
                                            @error('job_title')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="group-input">
                                            <span class="iconsform"><i class="fas fa-mobile-alt"></i></span>
                                            <input type="tel" name="mobile" class="form-control" value="{{ old('mobile',$user->mobile) }}" placeholder="Personal Number">
                                            @error('mobile')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="group-input">
                                            <span class="iconsform"><i class="zmdi zmdi-whatsapp"></i></span>
                                            <input type="text" name="whatsapp_number" class="form-control" value="{{ old('whatsapp_number',$user->whatsapp_number) }}" placeholder="Personal Whatsapp">
                                            @error('whatsapp_number')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="group-input">
                                            <span class="iconsform"><i class="zmdi zmdi-email-open"></i></span>
                                            <input type="text" name="alt_email" class="form-control" value="{{ old('alt_email',$user->alt_email) }}" placeholder="Personal Email (if different from the official)">
                                            @error('alt_email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="registration-btn">
                                        <input type="hidden" name="next_step" value="3">
                                        Continue
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-5 order-sm-1">
                    <div class="registration-content">
                        <h1>Sell to thousands of customers on Wackylicious, right from your doorstep!</h1>
                        <h3>Buy in bulk without the stress in Wackylicious Corporate:</h3>
                        <ul>
                            <li>
                                <img src="{{ asset('images/regis-icon-1.png') }}" alt="">
                                <p>lowest price, best service</p>
                            </li>
                            <li>
                                <img src="{{ asset('images/regis-icon-2.png') }}" alt="">
                                <p>for you to customize</p>
                            </li>
                            <li>
                                <img src="{{ asset('images/regis-icon-3.png') }}" alt="">
                                <p>you can customized</p>
                            </li>
                        </ul>
                        <h3>How will this information be used?</h3>
                        <p>You can use your email address as 'Username' to login to your Wackylicious Corporate Account.</p>
                        <p>Please note, the 'Username' and 'Password' used here are only to access your Wackylicious Corporate Account and can’t be used on Wackylicious.com shopping destination.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
