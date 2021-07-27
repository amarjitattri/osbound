@extends('layouts.app')
@include('shared._error_message')
@section('content')
    <section class="accountcreation">
        <div class="container">
            <div class="row">
                <div class="col-md-7 order-sm-2">
                    <div class="registration-form continueform">
                        <form action="{{ route('account-creation',$user) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="headingregis">Register Now</div>
                            <h5>Shipping Address</h5>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="group-input">
                                            <span class="iconsform"><i class="zmdi zmdi-pin"></i></span>
                                            <input type="text" name="entry_street_address" class="form-control" placeholder="Add Address Line 1 *" value="{{ old('entry_street_address',@$userAddress->entry_street_address) }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="group-input">
                                            <span class="iconsform"><i class="zmdi zmdi-pin"></i></span>
                                            <input type="text" name="entry_suburb" class="form-control" value="{{ old('entry_street_address',@$userAddress->entry_street_address) }}" placeholder="Add Address Line 2">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="group-input">
                                            <span class="iconsform"><i class="zmdi zmdi-gps-dot"></i></span>
                                            <input type="text" name="landmarks" class="form-control" value="{{ old('entry_street_address',@$userAddress->entry_street_address) }}"  placeholder="Landmark *" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="group-input">
                                            <span class="iconsform"><i class="fas fa-map-pin"></i></span>
                                            <select class="form-control" id="country_dropdown" name="entry_country_id" required>
                                                <option value="0">Select Country</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}" {{ old('entry_country_id') == @$userAddress->entry_country_id ? 'selected' : '' }}>{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="group-input">
                                            <span class="iconsform"><i class="zmdi zmdi-city-alt"></i></span>
                                            <select class="form-control" id="state_dropdown" name="entry_state" required>
                                                <option value="">Select State</option>
                                                @foreach ($states as $state)
                                                    <option value="{{ $state->id }}" {{ old('entry_states') == @$userAddress->entry_state ? 'selected' : '' }}>{{ $state->state_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="group-input">
                                            <span class="iconsform"><i class="zmdi zmdi-city-alt"></i></span>
                                            <select class="form-control" id="city_dropdown" name="entry_city" required>
                                                <option value="">Select City</option>
                                                @foreach ($cities as $city)
                                                    <option value="{{ $city->id }}" {{ old('entry_city') == @$userAddress->entry_city ? 'selected' : '' }}>{{ $city->city_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="group-input">
                                            <span class="iconsform"><i class="zmdi zmdi-city-alt"></i></span>
                                            <input type="text" name="entry_postcode" class="form-control" placeholder="Zip Code" value="{{ old('entry_postcode',@$userAddress->entry_postcode) }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5>Attachments</h5>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input type="file" name="company_logo" class="custom-file-input" id="company_logo" lang="es">
                                            <label class="custom-file-label" for="company_logo">AI / CDR / PDF of Company Logo</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input type="file" name="business_card" class="custom-file-input" id="business_card" lang="es">
                                            <label class="custom-file-label" for="business_card">Business Card</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input type="file" name="vat_doc" class="custom-file-input" id="vat_doc" lang="es">
                                            <label class="custom-file-label" for="vat_doc">AI / CDR / PDF of Company Logo</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="custom-control custom-checkbox rjtermscheck">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">By filling this form, I agree to
                                            <a href="#">Terms of Use</a></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <a href="account-creation.php" class="Previous-btn">Previous</a>
                                </div>
                                <div class="col-md-6">
                                    <input type="submit" class="registration-btn float-right" value="Register">
                                </div>
                                <div class="col-md-12">
                                    <p class="alreadyhave">Already have a corporate account?
                                        <a href="login.php">Login Here</a></p>
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
