@extends('layouts.app')
@section('content')
  @include('shared.userTimeline')
  <section class="multiproduct-sec">
    <div class="container">
      <div class="progressbarprofile">
        <h5>Profile Completed
          <a href="{{ route('user.profile.edit',$user->id) }}" class="float-right">Click here...</a></h5>
        <div class="progress">
          <div class="progress-bar bg-success" style="width:40%">40% Completed</div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3">
          @section('leftSideBar')
            @include('web.users.userSideNavigation')
          @show
        </div>
        <div class="col-md-9">
          <div class="rightsidebox">
            @yield('rightSideBar')
          </div>
        </div>
      </div>
    </div>
  </section>
@stop
