<section class="slider_banner">
    <div class="large-12 columns">
        <div class="main_slider owl-carousel owl-theme">
            <div class='item'>
                <img src="{{ asset('images/slider-1.jpg') }}" alt="{{ config('app.name') }}">
            </div>
            <div class='item'>
                <img src="{{ asset('images/slider-2.jpg') }}" alt="{{ config('app.name') }}">
            </div>
        </div>
    </div>
    <div class="registration-form">
        <h3 class="headingregis">Register Now</h3>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <div class="group-input">
                    <span class="iconsform"><i class="zmdi zmdi-account-o"></i></span>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Person Name *" required autocomplete="name" autofocus>
                </div>
                @error('email')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <div class="form-group">
                <div class="group-input">
                    <span class="iconsform"><i class="fas fa-envelope"></i></span>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Official Email id (username) *" required autocomplete="email">
                </div>
                @error('name')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <div class="form-group">
                <div class="group-input">
                    <span class="iconsform"><i class="zmdi zmdi-phone-in-talk"></i></span>
                    <input type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" placeholder="Contact Number *" required>
                </div>
                @error('phone')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <div class="form-group">
                <div class="group-input">
                    <span class="iconsform"><i class="zmdi zmdi-home"></i></span>
                    <input type="text" name="company" class="form-control @error('company') is-invalid @enderror" value="{{ old('company') }}" placeholder="Company Name *" required>
                </div>
                @error('company')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <button type="submit" class="registration-btn">
                Join Us
            </button>
        </form>
    </div>
</section>
@section('script')
    <script type="text/javascript">
        jQuery('.main_slider').owlCarousel({
            loop: true,
            margin: 0,
            responsiveClass: true,
            autoplay:true,
            autoplayTimeout:5000,
            smartSpeed:1000,
            animateOut: 'fadeOut',
            autoplayHoverPause:true,
            responsive: {
                0: {
                    items:1,
                    nav: false,
                    dots: true
                },
                600: {
                    items:1,
                    nav: false,
                    dots: true
                },
                1000: {
                    items:1,
                    nav: false,
                    dots: true
                }
            }
        })
    </script>
@endsection
