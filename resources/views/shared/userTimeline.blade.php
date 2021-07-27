<section class="cust-banner">
  <div class="cust-bg-ban">
    <img src="{{ asset('images/home-banner.jpg') }}" alt="Wackylicious Banner">
  </div>
  <div class="user-ban-block">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="user-imageblk">
            <img src="{{ asset('images/user-image.png') }}" alt="Wackylicious User"/>
          </div>
          <div class="user-contentblk">
            <h4>{{ Auth::user()->name }}</h4>
            <h5>@Wackylicious Corporate</h5>
          </div>
        </div>
        <div class="col-md-6">
          <a href="{{ route('user.products') }}" class="useredit-btn">Generic Products</a>
          <a href="{{ route('user.products.custom') }}" class="useredit-btn">Custom Products</a>
        </div>
      </div>
    </div>
  </div>
</section>
